<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $order = DB::table('penjualan')->count();
        $customer = DB::table('customer')->count();
        $kurir = DB::table('status_pengiriman')->where('kurir_id', Auth::user()->id)->count();
        return view('master.dashboard', [
            'order' => $order,
            'customer' => $customer,
            'kurir' => $kurir
        ]);
    }
}
