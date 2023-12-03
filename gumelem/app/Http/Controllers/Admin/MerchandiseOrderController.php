<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MerchandiseOrderRequest;
use App\Models\MerchandiseOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MerchandiseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = MerchandiseOrder::all();

        return view('pages.admin.merchandise-order.index',[
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.merchandise-order.create');
    }

    /*
     * Store a newly created resource in storage.
     */
    public function store(MerchandiseOrderRequest $request)
    {
        $data = $request ->all();
        $data['slug'] = Str::slug($request->title);

        MerchandiseOrder::create($data);
        return redirect()->route('merchandise-order.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = MerchandiseOrder::findOrFail($id);

        return view('pages.admin.merchandise-order.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MerchandiseOrderRequest $request, $id)
    {
        $data = $request ->all();
        $data['slug'] = Str::slug($request->title);

        $item = MerchandiseOrder::findOrFail($id);

        $item->update($data);

        return redirect()->route('merchandise-order.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = MerchandiseOrder::findOrFail($id);
        $item->delete();

        return redirect()->route('merchandise-order.index');
    }
}
