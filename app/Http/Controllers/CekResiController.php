<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;

class CekResiController extends Controller
{
    //
    public function cek(Request $request)
    {
        if ($request->has('cari')) {
            $data = Penjualan::where('id', 'LIKE', '%'.$request->cari.'%')->get();
        }else{
            $data = "Not FOund";
        }
        return view('cekresi.index', compact('data'));
    }
}
