<?php

namespace App\Http\Controllers;

use App\Models\AboutGumelem;
use App\Models\MerchandiseOrder;
use App\Models\ObjekWisata;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index(Request $request)
    {
        $dataAbout = AboutGumelem::with(['about_galleries'])->first();

        $dataGalleries = ObjekWisata::with(['wisata_galleries'])->get();

        $dataMarchandises= MerchandiseOrder::with(['merchandise_galleries'])->get();
        return view('pages.home')
                ->with('dataGalleries',$dataGalleries)
                ->with('dataMerchandises',$dataMarchandises)
                ->with('dataAbout',$dataAbout);
    }
}
