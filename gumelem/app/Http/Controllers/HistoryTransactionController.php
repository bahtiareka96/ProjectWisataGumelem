<?php

namespace App\Http\Controllers;

use App\Models\MerchandiseTransaction;
use App\Models\MerchandiseOrder;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryTransactionController extends Controller
{
    public function index($users_id)
    {
        $item = MerchandiseTransaction::with(['merchandise_order','merchandise_galleries', 'user'])
        ->where('users_id',$users_id)
        ->get();



        return view('pages.history',[
            'item' => $item
        ]);

    }

    // public function order(Request $request,$id)
    // {
    //     dd($request);
    //     $merchandise_order = MerchandiseOrder::findOrFail($id);

    //     $merchandise_transaction = MerchandiseTransaction::findOrFail($id);

    //     $transaction = MerchandiseTransaction::create([
    //         'merchandise_orders_id' => $id,
    //         'users_id' => Auth::user()->id,
    //         'users_email' => Auth::user()->email,
    //         'address' => $merchandise_transaction->address,
    //         'expedition' => $merchandise_transaction->expedition,
    //         'quantity_order' => $merchandise_transaction->quantity_order,
    //         'expedition_price' => 5000,
    //         'total_price' => $merchandise_order->price,
    //         'status' => 'PENDING'
    //     ]);



    //     // $transaction->total_price += $transaction->merchandise_order->price;

    //     return redirect()->route('detailmerch', $transaction->id);

    // }

    public function process(Request $request, $id)
    {
        // dd($request->all());
        $merchandise_order = MerchandiseOrder::findOrFail($id);
        // $merchandise_transaction = MerchandiseTransaction::findOrFail($id);

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



        $merchandise_order->decrement('quantity', $transaction->quantity_order);

        $transaction->save();

        // return redirect()->route('detailmerch', $transaction->id);

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
