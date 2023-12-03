<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MerchandiseGalleryRequest;
use App\Models\MerchandiseOrder;
use App\Models\MerchandiseGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MerchandiseGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = MerchandiseGallery::with(['merchandise_order'])->get();

        return view('pages.admin.merchandise-gallery.index',[
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $merchandise_orders = MerchandiseOrder::all();
        return view('pages.admin.merchandise-gallery.create', [
            'merchandise_orders' => $merchandise_orders
        ]);
    }

    /*
     * Store a newly created resource in storage.
     */
    public function store(MerchandiseGalleryRequest $request)
    {
        $data = $request->all();

        $data['image'] = $request->file('image')->store(
            'assets/gallery', 'public'
        );

        MerchandiseGallery::create($data);

        return redirect()->route('merchandise-gallery.index');
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
        $item = MerchandiseGallery::findOrFail($id);
        $merchandise_orders = MerchandiseOrder::all();

        return view('pages.admin.merchandise-gallery.edit', [
            'item' => $item,
            'merchandise_orders' => $merchandise_orders
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MerchandiseGalleryRequest $request, $id)
    {
        $data = $request ->all();

        $data['image'] = $request->file('image')->store(
            'assets/gallery', 'public'
        );

        $item = MerchandiseGallery::findOrFail($id);

        $item->update($data);

        return redirect()->route('merchandise-gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = MerchandiseGallery::findOrFail($id);
        $item->delete();

        return redirect()->route('merchandise-gallery.index');
    }
}
