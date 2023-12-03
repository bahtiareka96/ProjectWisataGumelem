<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AboutGumelemRequest;
use App\Models\AboutGumelem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AboutGumelemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = AboutGumelem::all();

        return view('pages.admin.about-gumelem.index',[
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.about-gumelem.create');
    }

    /*
     * Store a newly created resource in storage.
     */
    public function store(AboutGumelemRequest $request)
    {
        $data = $request ->all();

        $data['slug'] = Str::slug($request->title);

        AboutGumelem::create($data);
        return redirect()->route('about-gumelem.index');
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
        $item = AboutGumelem::findOrFail($id);

        return view('pages.admin.about-gumelem.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AboutGumelemRequest $request, $id)
    {
        $data = $request ->all();
        $data['slug'] = Str::slug($request->title);

        $item = AboutGumelem::findOrFail($id);

        $item->update($data);

        return redirect()->route('about-gumelem.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = AboutGumelem::findOrFail($id);
        $item->delete();

        return redirect()->route('about-gumelem.index');
    }
}
