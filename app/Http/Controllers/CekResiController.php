<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CekResiController extends Controller
{
    //
    public function cek(Request $request)
    {
        $data = DB::table('penjualan')
        ->where('noResi',$request->cari)->get();
        return view('cekresi.index', compact('data'));
    }
}
