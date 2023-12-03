<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AboutGalleryRequest;
use App\Models\AboutGallery;
use App\Models\AboutGumelem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AboutGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = AboutGallery::with(['about_gumelem'])->get();

        return view('pages.admin.about-gallery.index',[
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $about_gumelems = AboutGumelem::all();
        return view('pages.admin.about-gallery.create', [
            'about_gumelems' => $about_gumelems
        ]);
    }

    /*
     * Store a newly created resource in storage.
     */
    public function store(AboutGalleryRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->title);

        $data['image'] = $request->file('image')->store(
            'assets/gallery', 'public'
        );

        AboutGallery::create($data);

        return redirect()->route('about-gallery.index');
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
        $item = AboutGallery::findOrFail($id);
        $about_gumelems = AboutGumelem::all();

        return view('pages.admin.about-gallery.edit', [
            'item' => $item,
            'about_gumelems' => $about_gumelems
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AboutGalleryRequest $request, $id)
    {
        $data = $request ->all();

        $data['slug'] = Str::slug($request->title);

        $data['image'] = $request->file('image')->store(
            'assets/gallery', 'public'
        );

        $item = AboutGallery::findOrFail($id);

        $item->update($data);

        return redirect()->route('about-gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = AboutGallery::findOrFail($id);
        $item->delete();

        return redirect()->route('about-gallery.index');
    }
}
