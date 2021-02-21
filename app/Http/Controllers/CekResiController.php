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
        $cari = $request->cari;
        
        if ($cari) {
            $data = DB::table('penjualan')
            ->where('id','like',"%".$cari."%")->first();
        }else {
            $data = "Masukan Nomor Resi Dengan Benar";
        }
        return view('cekresi.index', compact('data'));
    }
}
