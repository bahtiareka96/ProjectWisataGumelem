<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WisataGalleryRequest;
use App\Models\ObjekWisata;
use App\Models\WisataGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WisataGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = WisataGallery::with(['objek_wisata'])->get();

        return view('pages.admin.wisata-gallery.index',[
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $objek_wisatas = ObjekWisata::all();
        return view('pages.admin.wisata-gallery.create', [
            'objek_wisatas' => $objek_wisatas
        ]);
    }

    /*
     * Store a newly created resource in storage.
     */
    public function store(WisataGalleryRequest $request)
    {
        $data = $request->all();

        $data['image'] = $request->file('image')->store(
            'assets/gallery', 'public'
        );

        WisataGallery::create($data);

        return redirect()->route('wisata-gallery.index');
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
        $item = WisataGallery::findOrFail($id);
        $objek_wisatas = ObjekWisata::all();

        return view('pages.admin.wisata-gallery.edit', [
            'item' => $item,
            'objek_wisatas' => $objek_wisatas
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WisataGalleryRequest $request, $id)
    {
        $data = $request ->all();

        $data['image'] = $request->file('image')->store(
            'assets/gallery', 'public'
        );

        $item = WisataGallery::findOrFail($id);

        $item->update($data);

        return redirect()->route('wisata-gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = WisataGallery::findOrFail($id);
        $item->delete();

        return redirect()->route('wisata-gallery.index');
    }
}
