<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Destination;
use App\Models\StatusPengiriman;
use App\Models\DetailVendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class FrontEndController extends Controller
{
    //
    public function index()
    {
        $darat = DB::table('destinations')->where('statusTransport',0)->get();
        $udara = DB::table('destinations')->where('statusTransport',1)->get();
        $riauDaratan = DB::table('destinations')->where('statusTransport',2)->get();
        $motor= DB::table('destinations')->where('statusTransport',3)->get();
        $kotaAsal = DB::table('destinations')->select('id','kotaAsal')->get();
        $kotaTujuan = DB::table('destinations')->select('id','kotaTujuan')->get();
        return view('frontend.index',[
            'kotaAsal' => $kotaAsal,
            'kotaTujuan' => $kotaTujuan,
            'darat' => $darat,
            'udara' => $udara,
            'riauDaratan' => $riauDaratan,
            'motor' => $motor
        ]);
    }

    public function cekresi(Request $request)
    {
        $cari = $request->cari;
        $data = penjualan::select(
            'penjualan.*',
            'customer.*',
            'metode_pembayaran.*',
            'destinations.*',
            'barang.*',
            'status_pengiriman.*',
            'status_pengiriman.status as statusPengiriman',
            'vendor.*',
            'detail_penjualan.*',
                DB::raw('barang.beratVol * penjualan.hargaKg as total_harga')
            )
        ->join('customer', 'customer.id', 'penjualan.customer_id')
        ->join('barang', 'barang.id', 'penjualan.barang_id')
        ->join('metode_pembayaran', 'metode_pembayaran.id', 'penjualan.metodePembayaran_id')
        ->join('destinations', 'destinations.id', 'penjualan.destinasi_id')
        ->join('detail_penjualan','detail_penjualan.penjualan_id','penjualan.noResi')
        ->leftJoin('status_pengiriman', 'status_pengiriman.penjualan_id', 'penjualan.noResi')
        ->leftJoin('vendor', 'vendor.id', 'penjualan.vendor_id')
        ->orderBy('status_pengiriman.id','DESC')
        ->where('penjualan.noResi', $cari)
        ->first();

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
    public function cetak_order(Request $request)
    {
        // $cetak_order = Penjualan::where('noResi', $request->input('penjualan_id'))->first();
        $data = penjualan::select(
            'penjualan.noResi',
            'penjualan.tanggal', 
            'penjualan.hargaKg',
            'penjualan.kuli', 
            'penjualan.penerima',
            'penjualan.alamatPenerima',
            'penjualan.noTelpPenerima',
            'customer.id as customer_id',
            'customer.namaCustomer',
            'customer.alamatCustomer',
            'vendor.id as resi_vendor', 
            'vendor.vendor', 
            'metode_pembayaran.jenisPembayaran', 
            'status_pengiriman.penjualan_id', 
            'destinations.kotaAsal', 
            'destinations.kotaTujuan', 
            'barang.berat',
            'barang.panjang', 
            'barang.tinggi', 
            'barang.beratVol', 
            DB::raw('barang.beratVol * penjualan.hargaKg as total_harga')
            
            )
        ->join('customer', 'customer.id', 'penjualan.customer_id')
        ->join('barang', 'barang.id', 'penjualan.barang_id')
        ->leftjoin('vendor', 'vendor.id', 'penjualan.vendor_id')
        ->join('metode_pembayaran', 'metode_pembayaran.id', 'penjualan.metodePembayaran_id')
        ->leftjoin('status_pengiriman', 'status_pengiriman.penjualan_id', 'penjualan.noResi')
        ->join('destinations', 'destinations.id', 'penjualan.destinasi_id')
        ->where('penjualan.noResi', $request->input('noResi'))
        ->first();

        // echo $data;

        $pdf = PDF::loadview('frontend.cetak_order', [
            'title' => "Data",
            'data' => $data
            ]);
        // return $pdf->stream('Cetak Resi.pdf');
        return $pdf->download('Cetak Resi.pdf');
    }
}
