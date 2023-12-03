<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MerchandiseOrder;
use App\Models\MerchandiseTransaction;
use App\Models\ObjekWisata;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.admin.dashboard', [
            'objek_wisata' => ObjekWisata::count(),
            'about_gumelem' => ObjekWisata::count(),
            'merchandise_order' => MerchandiseOrder::count(),
            'merchandise_pending' => MerchandiseTransaction::where('status', 'PENDING')->count(),
            'merchandise_success' => MerchandiseTransaction::where('status', 'SUCCESS')->count(),
            'merchandise_cancel' => MerchandiseTransaction::where('status', 'CANCEL')->count(),
            'merchandise_failed' => MerchandiseTransaction::where('status', 'FAILED')->count(),
        ]);
    }
}
