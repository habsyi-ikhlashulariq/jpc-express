<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CekResiController extends Controller
{
    //
    public function cekresi(Request $request)
    {
        $cari = $request->cari;
        $data = Penjualan::select('penjualan.noResi', 'penjualan.tanggal', 'penjualan.hargaKg', 'penjualan.kuli', 'penjualan.penerima','penjualan.alamatPenerima','penjualan.noTelpPenerima', 'customer.namaCustomer', 'barang.berat','vendor.vendor', 'metode_pembayaran.jenisPembayaran', 'status_pengiriman.platNomor')
        ->join('customer', 'customer.id', 'penjualan.customer_id')
        ->join('barang', 'barang.id', 'penjualan.barang_id')
        ->join('vendor', 'vendor.id', 'penjualan.vendor_id')
        ->join('metode_pembayaran', 'metode_pembayaran.id', 'penjualan.metodePembayaran_id')
        ->join('status_pengiriman', 'status_pengiriman.id', 'penjualan.statusPengiriman_id')
        ->where('penjualan.noResi', $cari)
        ->first();

        if ($cari) {
        }else {
            $data = "Masukan Nomor Resi Dengan Benar";
        }
        return view('frontend.cekresi', compact('data'));
    }
    public function cekestimasi(Request $request)
    {
        $cari = $request->cari;
        $data = Penjualan::select('penjualan.noResi', 'penjualan.tanggal', 'penjualan.hargaKg', 'penjualan.kuli', 'penjualan.penerima','penjualan.alamatPenerima','penjualan.noTelpPenerima', 'customer.namaCustomer', 'barang.berat','vendor.vendor', 'metode_pembayaran.jenisPembayaran', 'status_pengiriman.platNomor')
        ->join('customer', 'customer.id', 'penjualan.customer_id')
        ->join('barang', 'barang.id', 'penjualan.barang_id')
        ->join('vendor', 'vendor.id', 'penjualan.vendor_id')
        ->join('metode_pembayaran', 'metode_pembayaran.id', 'penjualan.metodePembayaran_id')
        ->join('status_pengiriman', 'status_pengiriman.id', 'penjualan.statusPengiriman_id')
        ->where('penjualan.noResi', $cari)
        ->first();

        if ($cari) {
        }else {
            $data = "Masukan Nomor Resi Dengan Benar";
        }
        return view('frontend.cekresi', compact('data'));
    }
}
