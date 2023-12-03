<?php

namespace App\Http\Controllers;

use App\Models\AboutGumelem;
use Illuminate\Http\Request;

class AboutController extends Controller
{

    public function index(Request $request, $slug)
    {

        // $dataAbout = AboutGumelem::with(['about_galleries'])->first();
        $dataAbout = AboutGumelem::with(['about_galleries'])->where('slug',$slug)->firstOrFail();
        return view('pages.aboutGumelem', [
            'dataAbout' => $dataAbout
        ]);

    }
}
