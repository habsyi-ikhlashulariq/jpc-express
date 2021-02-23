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
        // $cari = $request->cari;
        // $kotaAsal = DB::table('destinations')->select('id','kotaAsal')->get();
        // $kotaTujuan = DB::table('destinations')->select('id','kotaTujuan')->get();
        // $data = Penjualan::select('penjualan.noResi', 'penjualan.tanggal', 'penjualan.hargaKg', 'penjualan.kuli', 'penjualan.penerima','penjualan.alamatPenerima','penjualan.noTelpPenerima', 'customer.namaCustomer', 'barang.berat','vendor.vendor', 'metode_pembayaran.jenisPembayaran', 'status_pengiriman.platNomor')
        // ->join('customer', 'customer.id', 'penjualan.customer_id')
        // ->join('barang', 'barang.id', 'penjualan.barang_id')
        // ->join('vendor', 'vendor.id', 'penjualan.vendor_id')
        // ->join('metode_pembayaran', 'metode_pembayaran.id', 'penjualan.metodePembayaran_id')
        // ->join('status_pengiriman', 'status_pengiriman.id', 'penjualan.statusPengiriman_id')
        // ->where('penjualan.noResi', $cari)
        // ->first();

        // if ($cari) {
        // }else {
        //     $data = "Masukan Nomor Resi Dengan Benar";
        // }
        // return view('frontend.cekresi', [
        //     'data' => $data,
        //     'kotaTujuan' => $kotaTujuan,
        //     'kotaAsal' => $kotaAsal,
        // ]);
        echo "OK";
    }
    public function cekestimasi(Request $request)
    {
        $CarikotaAsal = $request->kotaAsal;
        $CarikotaTujuan = $request->kotaTujuan;

        $kotaAsal = DB::table('destinations')->select('id','kotaAsal')->get();
        $kotaTujuan = DB::table('destinations')->select('id','kotaTujuan')->get();

        $destinasi = DB::table('destinations')
        ->where('kotaAsal', $CarikotaAsal)
        ->where('kotaTujuan', $CarikotaTujuan)
        ->first();
        if (!$destinasi) {
            return $destinasi = "Data Tidak Ditemukan";
        }

        return view('frontend.cekestimasi', [
            'destinasi' => $destinasi,
            'kotaAsal' => $kotaAsal,
            'kotaTujuan' => $kotaTujuan,
        ]);
    }
}
