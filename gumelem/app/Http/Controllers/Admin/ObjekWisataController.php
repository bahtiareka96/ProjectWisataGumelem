<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ObjekWisataRequest;
use App\Models\ObjekWisata;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ObjekWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = ObjekWisata::all();

        return view('pages.admin.objek-wisata.index',[
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.objek-wisata.create');
    }

    /*
     * Store a newly created resource in storage.
     */
    public function store(ObjekWisataRequest $request)
    {
        $data = $request ->all();
        $data['slug'] = Str::slug($request->title);

        ObjekWisata::create($data);
        return redirect()->route('objek-wisata.index');
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
        $item = ObjekWisata::findOrFail($id);

        return view('pages.admin.objek-wisata.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ObjekWisataRequest $request, $id)
    {
        $data = $request ->all();
        $data['slug'] = Str::slug($request->title);

        $item = ObjekWisata::findOrFail($id);

        $item->update($data);

        return redirect()->route('objek-wisata.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = ObjekWisata::findOrFail($id);
        $item->delete();

        return redirect()->route('objek-wisata.index');
    }
}
