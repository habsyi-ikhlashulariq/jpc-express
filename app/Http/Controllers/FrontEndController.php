<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontEndController extends Controller
{
    //
    public function index()
    {
        $kotaAsal = DB::table('destinations')->select('id','kotaAsal')->get();
        $kotaTujuan = DB::table('destinations')->select('id','kotaTujuan')->get();
        return view('frontend.index',[
            'kotaAsal' => $kotaAsal,
            'kotaTujuan' => $kotaTujuan,
        ]);
    }

    public function cekresi(Request $request)
    {
        $cari = $request->cari;
        $kotaAsal = DB::table('destinations')->select('id','kotaAsal')->get();
        $kotaTujuan = DB::table('destinations')->select('id','kotaTujuan')->get();
        $data = Penjualan::select('penjualan.noResi', 'penjualan.tanggal', 'penjualan.hargaKg', 'penjualan.kuli', 'penjualan.penerima','penjualan.alamatPenerima','penjualan.noTelpPenerima', 'customer.namaCustomer', 'barang.berat','vendor.vendor', 'metode_pembayaran.jenisPembayaran', 'status_pengiriman.platNomor')
        ->join('customer', 'customer.id', 'penjualan.customer_id')
        ->join('barang', 'barang.id', 'penjualan.barang_id')
        ->join('vendor', 'vendor.id', 'penjualan.vendor_id')
        ->join('metode_pembayaran', 'metode_pembayaran.id', 'penjualan.metodePembayaran_id')
        ->join('status_pengiriman', 'status_pengiriman.penjualan_id', 'penjualan.noResi')
        ->where('penjualan.noResi', $cari)
        ->first();
        

        if (!$cari) {
            $data  = "Masukan Nomor Resi Dengan Benar";
        }

        return $data;
        return response()->json($data);
        
    }
    public function cekestimasi(Request $request)
    {
        
        // $kotaAsal = DB::table('destinations')->select('id','kotaAsal')->get();
        // $kotaTujuan = DB::table('destinations')->select('id','kotaTujuan')->get();

        $destinasi = DB::table('destinations')
        ->where('kotaAsal', $request->kota1)
        ->where('kotaTujuan', $request->kota2)
        ->first();
        

        if (!$destinasi) {
            return $destinasi = "Data Tidak Ditemukan";
        }

         return response()->json($destinasi);

    }
}
