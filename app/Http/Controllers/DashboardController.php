<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $order = DB::table('penjualan')->count();
        $customer = DB::table('customer')->count();
        return view('master.dashboard', [
            'order' => $order,
            'customer' => $customer
        ]);
    }
}
