<?php

namespace App\Http\Controllers;

use App\Models\MerchandiseOrder;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request, $slug)
    {
        $item = MerchandiseOrder::with(['merchandise_galleries'])->where('slug', $slug)->firstOrFail();
        return view('pages.order', [
            'item' => $item
        ]);
    }
}
