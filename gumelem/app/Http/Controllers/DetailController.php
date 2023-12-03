<?php

namespace App\Http\Controllers;

use App\Models\ObjekWisata;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index(Request $request, $slug)
    {
        $item = ObjekWisata::with(['wisata_galleries'])->where('slug',$slug)->firstOrFail();
        return view('pages.detail', [
            'item' => $item
        ]);
    }
}
