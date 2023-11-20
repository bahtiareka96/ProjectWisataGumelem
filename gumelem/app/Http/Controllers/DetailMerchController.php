<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailMerchController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.detailmerch');
    }
}
