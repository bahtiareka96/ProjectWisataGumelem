<?php

namespace App\Http\Controllers;

use App\Models\MerchandiseTransaction;
use App\Models\MerchandiseOrder;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class DetailMerchController extends Controller
{
    public function index($id)
    {
        $item = MerchandiseOrder::with(['merchandise_galleries','user'])->findOrFail($id);
        $daftarProvinsi = RajaOngkir::provinsi()->all();


        return view('pages.detailmerch',[
            'item' => $item,
            'daftarProvinsi' => $daftarProvinsi
        ]);
    }

    public function getKota($id){
        $listKota = RajaOngkir::kota()->dariProvinsi($id)->get();

        return $listKota;
    }

    public function biayaPengiriman(Request $request){
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

        $merchandise_order = MerchandiseOrder::findOrFail($id);
        // $merchandise_transaction = MerchandiseTransaction::findOrFail($id);

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

        $merchandise_order->decrement('quantity', $transaction->quantity_order);

        $transaction->save();

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
