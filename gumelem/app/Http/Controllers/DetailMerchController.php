<?php

namespace App\Http\Controllers;

use App\Mail\InvoiceMail;
use App\Models\MerchandiseTransaction;
use App\Models\MerchandiseOrder;
use App\Models\Invoice;
use Exception;
use Midtrans\Config;
use Midtrans\Snap;
use Validator;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class DetailMerchController extends Controller
{
    public function index($id)
    {
        $item = MerchandiseOrder::with(['merchandise_galleries', 'user'])->findOrFail($id);
        $daftarProvinsi = RajaOngkir::provinsi()->all();


        return view('pages.detailmerch', [
            'item' => $item,
            'daftarProvinsi' => $daftarProvinsi
        ]);
    }

    public function getKota($id)
    {
        $listKota = RajaOngkir::kota()->dariProvinsi($id)->get();

        return $listKota;
    }

    public function biayaPengiriman(Request $request)
    {
        // return $request->courier;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",

            CURLOPT_POSTFIELDS => "origin=37&destination=$request->kota&weight=$request->weight&courier=$request->courier",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key:" . env('RAJAONGKIR_API_KEY')
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            // Handle cURL error
            return response()->json(['error' => "cURL Error #:" . $err], 500);
        } else {
            // Decode the JSON response
            $responseData = json_decode($response, true);

            // Check if the response indicates an error
            if (isset($responseData['error'])) {
                // Set the appropriate HTTP status code for an error
                return response()->json($responseData, 500);
            }

            // Return the successful response
            return response()->json($responseData);
        }

        $responseData = json_decode($response, true);

        return response()->json($responseData);
    }

    public function process(Request $request, $id)
    {
        try {
            // Validasi data
            $validator = FacadesValidator::make($request->all(), [
                'address' => 'required|string',
            ], [
                // Pesan error validasi
                'address.required' => 'Alamat harus diisi!',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'galat' => 'Terjadi kesalahan saat memproses data.',
                    'errors' => $validator->errors()
                ], 422);
            }

            $merchandise_order = MerchandiseOrder::findOrFail($id);

            // Membuat transaksi baru
            $transaction = MerchandiseTransaction::create([
                'merchandise_orders_id' => $id,
                'users_id' => Auth::user()->id,
                'email' => $request->email,
                'address' => $request->address,
                'province_id' => $request->province,
                'city_id' => $request->kota,
                'expedition' => $request->courier,
                'quantity_order' => $request->quantity_order,
                'price' => $request->price,
                'expedition_price' => $request->expedition_price,
                'total_price' => $request->total_price,
                'weight' => $request->weight,
                'status' => 'PENDING'
            ]);




            // return response()->json([
            //     'success' => 'Pesanan berhasil diproses',
            // ]);

            $invoice = new Invoice;
            $invoice->user_id = Auth::user()->id;
            $invoice->merchandise_transaction_id = $transaction->id;
            $invoice->item_name = $merchandise_order->title; // Judul sebagai nama item
            $invoice->quantity = $request->quantity_order;
            $invoice->total_price = $transaction->total_price;
            $invoice->status = $transaction->status;
            $invoice->save();


            $snapToken = null;
            if ($transaction->status == 'PENDING') {
                // Parameter transaksi Midtrans
                $transactionDetails = [
                    'order_id' => $transaction->id,
                    'gross_amount' => $transaction->total_price,
                ];

                $customerDetails = [
                    'first_name' => Auth::user()->name,
                    'email' => Auth::user()->email,
                ];

                $item_details = [
                    [
                        'id' => $merchandise_order->id,
                        'price' => $request->price, // harga per item
                        'quantity' => $request->quantity_order, // kuantitas item
                        'name' => $merchandise_order->title, // nama item
                    ],
                ];

                $midtransPayload = [
                    'transaction_details' => $transactionDetails,
                    'item_details' => $item_details,
                    'customer_details' => $customerDetails,
                ];

                // Konfigurasi Midtrans
                Config::$serverKey = config('midtrans.server_key');
                Config::$isProduction = config('midtrans.is_production');
                Config::$isSanitized = config('midtrans.sanitized');
                Config::$is3ds = config('midtrans.3ds');

                try {
                    $snapResponse = Snap::createTransaction($midtransPayload);
                    $snapToken = $snapResponse->token;
                    $transaction->snap_token = $snapToken;
                    $transaction->save();

                    $merchandise_order->decrement('quantity', $request->quantity_order);
                } catch (\Throwable $e) {
                    return response()->json([
                        'galat' => 'Terjadi kesalahan saat memproses transaksi.',
                        'error_message' => $e->getMessage(),
                        'error_file' => $e->getFile(),
                        'error_line' => $e->getLine()
                    ], 500);
                }
            }

            return response()->json([
                'success' => 'Pesanan berhasil diproses',
                'snapToken' => $snapToken
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'galat' => 'Terjadi kesalahan saat memproses data.',
                'error_message' => $th->getMessage(),
                'error_file' => $th->getFile(),
                'error_line' => $th->getLine()
            ]);
        }
    }

    public function midtransCallback(Request $request)
    {
        $data = $request->all();

        $order_id = $data['order_id'] ?? null;
        $transaction_status = $data['transaction_status'] ?? null;

        $transaction = MerchandiseTransaction::where('id', $order_id)->first();

        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        $invoice = Invoice::updateOrCreate(
            ['merchandise_transaction_id' => $transaction->id],
            [
                'status' => $this->mapTransactionStatus($transaction_status)
            ]
        );

        $userEmail = $transaction->user_email;

        if (filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
            Mail::to($userEmail)->send(new InvoiceMail($invoice, $transaction));
        } else {
            Log::error("Invalid or missing email for the transaction {$transaction->id}");
        }

        // Update status transaksi
        $transaction->status = $this->mapTransactionStatus($transaction_status);
        $transaction->save();

        return response()->json(['message' => 'Callback processed successfully']);
    }




    protected function mapTransactionStatus($status)
    {
        switch ($status) {
            case 'capture':
                return 'PAYMENT SUCCESS';
            case 'settlement':
                return 'PAYMENT SUCCESS';
            case 'cancel':
            case 'deny':
            case 'expire':
                return 'FAILED';
            case 'pending':
                return 'PENDING';
            case 'challenge':
                return 'CHALLENGE';
            default:
                return 'UNKNOWN';
        }
    }



    public function remove(Request $request, $merchandise_orders_id)
    {
        return view('pages.detailmerch');
    }

    public function success(Request $request, $id)
    {
        $transactionSuccess = MerchandiseTransaction::findOrFail($id);
        $transactionSuccess->status = 'PENDING';

        $transactionSuccess->save();
        return view('pages.detailmerch');
    }
}
