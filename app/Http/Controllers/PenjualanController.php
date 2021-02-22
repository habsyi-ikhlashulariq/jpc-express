<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Barang;
use App\Models\Vendor;
use App\Models\Customer;
use App\Models\Penjualan;
use App\Models\Destination;
use Illuminate\Http\Request;
use App\Models\MetodePembayaran;
use App\Models\StatusPengiriman;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('order.index');
    }

    public function dt()
    {
        $data = Penjualan::select('penjualan.noResi', 'penjualan.tanggal', 'penjualan.hargaKg', 'penjualan.kuli', 'penjualan.penerima','penjualan.alamatPenerima','penjualan.noTelpPenerima', 'customer.namaCustomer', 'barang.berat','vendor.vendor', 'metode_pembayaran.jenisPembayaran', 'status_pengiriman.platNomor')
        ->join('customer', 'customer.id', 'penjualan.customer_id')
        ->join('barang', 'barang.id', 'penjualan.barang_id')
        ->join('vendor', 'vendor.id', 'penjualan.vendor_id')
        ->join('metode_pembayaran', 'metode_pembayaran.id', 'penjualan.metodePembayaran_id')
        ->join('status_pengiriman', 'status_pengiriman.id', 'penjualan.statusPengiriman_id')
        ->get();
        return DataTables::of($data)
        //button aksi
        ->addColumn('aksi', function($s){
            return '<a href="order/edit/'.$s->noResi.'" class="btn btn-warning">Edit</a>
            <a href="order/destroy/'.$s->noResi.'" class="btn btn-danger">Hapus</a>
            <a href="order/notif/'.$s->noResi.'" class="btn btn-success">Kirim Notif</a>
            ';
        })
        ->rawColumns(['aksi'])
        ->toJSon();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $vendor = Vendor::all();
        $customer = Customer::all();
        $statusPengiriman = StatusPengiriman::all();
        $metodePembayaran = MetodePembayaran::all();
        $destinasi = Destination::all();

       
        return view('order.add', [
            'vendor' => $vendor,
            'customer' => $customer,
            'metodePembayaran' => $metodePembayaran,
            'destinasi' => $destinasi
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'tanggal' => 'required',
            'hargaKg' => 'required',
            'kuli' => 'required',
            'penerima' => 'required',
            'alamatPenerima' => 'required',
            'noTelpPenerima' => 'required',
            'vendor_id' => 'required',
            'metodePembayaran_id' => 'required',
            'customer_id' => 'required',
            'destinasi_id' => 'required',
            'berat' => 'required',
            'panjang' => 'required',
            'lebar' => 'required',
            'tinggi' => 'required',
            'beratVol' => 'required'
        ]);

        $dataBarang = Barang::create([
            'berat' => $request->berat,
            'panjang' => $request->panjang,
            'lebar' => $request->lebar,
            'tinggi' => $request->tinggi,
            'beratVol' => $request->beratVol,
        ]);


        $dataID = \DB::table('penjualan')
        ->select(\DB::raw('max(RIGHT(noResi, 6)) as lastID'))
        ->get();
        if($dataID == null){
            $kode = 1;
        }else{
            $kode = $dataID[0]->lastID + 1;
        }
        $yearDigit1 = str_replace('-', '', $request->tanggal[2]);
        $yearDigit2 = str_replace('-', '', $request->tanggal[3]);
        $dateDigit1 = str_replace('-', '', $request->tanggal[8]);
        $dateDigit2 = str_replace('-', '', $request->tanggal[9]);
        $telpDigit = strlen($request->noTelpPenerima) == 12 ? substr($request->noTelpPenerima, 8, 4) : substr($request->noTelpPenerima, 9, 4);
        $dataDate = $dateDigit1.''.$dateDigit2;
        $datayear = $yearDigit1.''.$yearDigit2;
        $newID = $dataDate.''.$datayear.''.$telpDigit.'JPC'.str_pad($kode, 6, 0,STR_PAD_LEFT);


        $penjualan = Penjualan::create([
            'noResi' => $newID,
            'tanggal' => $request->tanggal,
            'hargaKg' => $request->hargaKg,
            'kuli' => $request->kuli,
            'penerima' => $request->penerima,
            'alamatPenerima' => $request->alamatPenerima,
            'noTelpPenerima' => $request->noTelpPenerima,
            'vendor_id' => $request->vendor_id,
            'barang_id' => $dataBarang->id,
            'metodePembayaran_id' => $request->metodePembayaran_id,
            'customer_id' => $request->customer_id,
            'destinasi_id' => $request->destinasi_id,
        ]);
        return redirect('order')->with('message','Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Penjualan::find($id);
        $vendor = Vendor::get();
        $customer = Customer::get();
        $statusPengiriman = StatusPengiriman::get();
        $metodePembayaran = MetodePembayaran::get();
        $barang = Barang::get();
        $destinasi = Destination::get();
        
        
        return view('order.edit', [
            'order' => $order,
            'vendor' => $vendor,
            'customer' => $customer,
            'statusPengiriman' => $statusPengiriman,
            'metodePembayaran' => $metodePembayaran,
            'barang' => $barang,
            'destinasi' => $destinasi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'tanggal' => 'required',
            'hargaKg' => 'required',
            'kuli' => 'required',
            'penerima' => 'required',
            'alamatPenerima' => 'required',
            'noTelpPenerima' => 'required',
            'vendor_id' => 'required',
            'barang_id' => 'required',
            'metodePembayaran_id' => 'required',
            'statusPengiriman_id' => 'required',
            'customer_id' => 'required',
            'destinasi_id' => 'required',
        ]);

        $penjualan = Penjualan::find($id);
        $penjualan->tanggal = $request->tanggal;
        $penjualan->hargaKg = $request->hargaKg;
        $penjualan->kuli = $request->kuli;
        $penjualan->penerima = $request->penerima;
        $penjualan->alamatPenerima = $request->alamatPenerima;
        $penjualan->noTelpPenerima = $request->noTelpPenerima;
        $penjualan->vendor_id = $request->vendor_id;
        $penjualan->barang_id = $request->barang_id;
        $penjualan->metodePembayaran_id = $request->metodePembayaran_id;
        $penjualan->statusPengiriman_id = $request->statusPengiriman_id;
        $penjualan->customer_id = $request->customer_id;
        $penjualan->destinasi_id = $request->destinasi_id;

        $penjualan->save();

        return redirect('/order')->with('message', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $order = Penjualan::find($id);

        $order->delete();
        return redirect('/order')->with('message', 'Data Berhasil DiHapus');
    }
    public function form_cetak_laporan()
    {
        return view('order.cetak_laporan');
    }
    public function cetak_laporan($tglAwal, $tglAkhir)
    {
    //    dd(['tanggal awal'. $tglAwal. 'tanggal AKhir'. $tglAkhir]);
    $data = Penjualan::select('penjualan.noResi', 'penjualan.tanggal', 'penjualan.hargaKg', 'penjualan.kuli', 'penjualan.penerima','penjualan.alamatPenerima','penjualan.noTelpPenerima', 'customer.namaCustomer', 'barang.berat','vendor.vendor', 'metode_pembayaran.jenisPembayaran', 'status_pengiriman.platNomor')
    ->join('customer', 'customer.id', 'penjualan.customer_id')
    ->join('barang', 'barang.id', 'penjualan.barang_id')
    ->join('vendor', 'vendor.id', 'penjualan.vendor_id')
    ->join('metode_pembayaran', 'metode_pembayaran.id', 'penjualan.metodePembayaran_id')
    ->join('status_pengiriman', 'status_pengiriman.id', 'penjualan.statusPengiriman_id')
    ->whereBetween('penjualan.tanggal', [$tglAwal, $tglAkhir])
    ->get();

    return view('order.data_laporan', compact('data'));        
    }
    public function notif($id)
    {
        $user = DB::table('penjualan')
        ->join('customer', 'penjualan.customer_id', '=', 'customer.id')
        ->join('status_pengiriman', 'status_pengiriman.id', '=', 'penjualan.statusPengiriman_id')
        ->join('metode_pembayaran', 'metode_pembayaran.id', '=', 'penjualan.metodePembayaran_id')
        ->select('penjualan.id','penjualan.tanggal', 'penjualan.penerima', 'penjualan.alamatPenerima', 'customer.namaCustomer', 'customer.emailCustomer', 'customer.noTelpCustomer', 'metode_pembayaran.jenisPembayaran')
        ->where('penjualan.id', $id)
        ->first();


        \Mail::raw('Halo '.$user->namaCustomer.' terima kasih telah memepercayakan kami sebagai pengiriman paket anda, paket anda akan diterima oleh '.$user->penerima.', di'.$user->alamatPenerima.'silahkan bisa cek lokasi paket barang anda dengan memasukan nomor pengiriman '. $id, function($message) use($user){
            $message->to($user->emailCustomer, $user->namaCustomer);
            $message->subject('Pengiriman diproses');
            $message->setBody('<h1> Terima kasih,', 'text/html');
        });
        return redirect('/order')->with('message', 'Berhasil Kirim Notifikasi');
    }
}