<?php

namespace App\Http\Controllers;

use App\Models\MerchandiseTransaction;
use App\Models\MerchandiseOrder;
use App\Models\Invoice;
use Exception;
use Midtrans\Config;
use Midtrans\Snap;
use Validator;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailMerchController extends Controller
{
    public function index($id)
    {
        $item = MerchandiseOrder::with(['merchandise_galleries','user'])->findOrFail($id);
        return view('pages.detailmerch',[
            'item' => $item
        ]);



    }

    public function process(Request $request, $id)
    {
        try {
            // Validasi data
            $validator = Validator::make($request->all(), [
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
                'expedition' => $request->expedition,
                'quantity_order' => $request->quantity_order,
                'price' => $request->price,
                'expedition_price' => $request->expedition_price,
                'total_price' => $request->total_price,
                'status' => 'PENDING'
            ]);

            // return response()->json([
            //     'success' => 'Pesanan berhasil diproses', 
            // ]);

            $invoice = new Invoice;
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

                $midtransPayload = [
                    'transaction_details' => $transactionDetails,
                ];

                // Konfigurasi Midtrans
                Config::$serverKey = config('midtrans.server_key');
                Config::$isProduction = config('midtrans.is_production');
                Config::$isSanitized = config('midtrans.sanitized');
                Config::$is3ds = config('midtrans.3ds');

                // Lakukan pemanggilan ke Midtrans dan dapatkan snap token.
                try {
                    $snapResponse = Snap::createTransaction($midtransPayload);
                    $snapToken = $snapResponse->token;
                    $transaction->snap_token = $snapToken; // Simpan snap token ke objek transaksi.
                    $transaction->save(); // Jangan lupa untuk menyimpan objek transaksi setelah assignment.

                    $merchandise_order->decrement('quantity', $request->quantity_order); // Kurangi jumlah stok barang.
                } catch (\Throwable $e) {
                    // Tangani exception yang mungkin terjadi.
                    // Log error atau tangani sesuai kebutuhan.
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


    // public function process(Request $request, $id)
    // {
    //     // Mencari merchandise order berdasarkan ID
    //     $merchandise_order = MerchandiseOrder::findOrFail($id);

    //     // Membuat transaksi baru
    //     $transaction = MerchandiseTransaction::create([
    //         'merchandise_orders_id' => $id,
    //         'users_id' => Auth::user()->id,
    //         'email' => $request->email,
    //         'address' => $request->address,
    //         'expedition' => $request->expedition,
    //         'quantity_order' => $request->quantity_order,
    //         'price' => $request->price,
    //         'expedition_price' => $request->expedition_price,
    //         'total_price' => $request->total_price,
    //         'status' => 'PENDING'
    //     ]);

    //     // Mengurangi jumlah stok merchandise
    //     $merchandise_order->decrement('quantity', $transaction->quantity_order);

    //     // Konfigurasi Midtrans
    //     Config::$serverKey = config('midtrans.server_key');
    //     Config::$isProduction = config('midtrans.is_production');
    //     Config::$isSanitized = config('midtrans.sanitized');
    //     Config::$is3ds = config('midtrans.3ds');

    //     // Menyiapkan parameter transaksi untuk dikirim ke Midtrans
    //     $params = [
    //         'transaction_details' => [
    //             'order_id' => $transaction->id,
    //             'gross_amount' => $transaction->total_price,
    //         ],
    //         // Tambahkan parameter lainnya sesuai kebutuhan
    //     ];

    //     try {
    //         // Mendapatkan snap token
    //         $paymentUrl = Snap::createTransaction($params)->token;

    //         return view('pages.detailmerch', [
    //             'item' => $merchandise_order,
    //             'snapToken' => $snapToken
    //         ]);
    //     } catch (Exception $e) {
    //         // Handle error, misalnya tampilkan pesan error
    //         return back()->withErrors(['message' => 'Error: ' . $e->getMessage()]);
    //     }
    // }

    public function midtransCallback(Request $request)
    {
        // Mendapatkan data dari request
        $data = $request->all();
    
        // Contoh: Ambil order_id, status transaksi, dan data lainnya dari data request
        $order_id = $data['order_id'] ?? null; // Gunakan null coalescing operator
        $transaction_status = $data['transaction_status'] ?? null;
    
        // // Contoh: Ambil informasi tambahan untuk invoice
        // $item_name = $data['item_name'] ?? 'Default Item Name'; // Ganti 'Default Item Name' sesuai kebutuhan
        // $quantity = $data['quantity'] ?? 0; // Gunakan default value jika key tidak ada
        // $total_price = $data['total_price'] ?? 0;
    
        // Ambil transaksi berdasarkan order_id
        $transaction = MerchandiseTransaction::where('id', $order_id)->first();
    
        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }
    
        // Membuat atau memperbarui invoice berdasarkan data transaksi
        $invoice = Invoice::updateOrCreate(
            ['merchandise_transaction_id' => $transaction->id],
            [
                // 'item_name' => $item_name,
                // 'quantity' => $quantity,
                // 'total_price' => $total_price,
                'status' => $this->mapTransactionStatus($transaction_status)
            ]
        );
    
        // Simpan perubahan status transaksi
        $transaction->status = $this->mapTransactionStatus($transaction_status);
        $transaction->save();

        
    
        // Return response
        return response()->json(['message' => 'Callback processed successfully']);
    }
    
    // Fungsi bantuan untuk memetakan status transaksi Midtrans ke status aplikasi Anda
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

    // public function create(Request $request, $id)
    // {
    //     return view('pages.detailmerch');
    // }

    public function success(Request $request, $id)
    {
        $transactionSuccess = MerchandiseTransaction::findOrFail($id);
        $transactionSuccess->status = 'PENDING';

        $transactionSuccess->save();
        return view('pages.detailmerch');
    }


}
