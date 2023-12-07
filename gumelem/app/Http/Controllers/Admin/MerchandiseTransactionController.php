<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MerchandiseTransactionRequest;
use App\Models\MerchandiseTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MerchandiseTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $items = MerchandiseTransaction::with(['merchandise_order', 'user'])->get();

        return view('pages.admin.merchandise-transaction.index',[
            'items' => $items
        ]);
    }

    public function order(Request $request, $id)
    {
        // dd($id);
        $items = MerchandiseTransaction::with(['merchandise_order', 'user'])->get();

        return view('pages.admin.merchandise-transaction.index',[
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /*
     * Store a newly created resource in storage.
     */
    public function store(MerchandiseTransactionRequest $request)
    {
        $data = $request ->all();
        $data['slug'] = Str::slug($request->title);

        MerchandiseTransaction::create($data);
        return redirect()->route('merchandise-transaction.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = MerchandiseTransaction::with(['merchandise_order', 'user'])->findOrFail($id);

        return view('pages.admin.merchandise-transaction.detail', [
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = MerchandiseTransaction::findOrFail($id);

        return view('pages.admin.merchandise-transaction.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MerchandiseTransactionRequest $request, $id)
    {
        $data = $request ->all();
        $data['slug'] = Str::slug($request->title);

        $item = MerchandiseTransaction::findOrFail($id);

        $item->update($data);

        return redirect()->route('merchandise-transaction.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = MerchandiseTransaction::findOrFail($id);
        $item->delete();

        return redirect()->route('merchandise-transaction.index');
    }
}
