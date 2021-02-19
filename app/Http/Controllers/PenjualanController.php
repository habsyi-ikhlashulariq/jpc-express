<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Barang;
use App\Models\Vendor;
use App\Models\Customer;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Models\MetodePembayaran;
use App\Models\StatusPengiriman;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
        $data = DB::select( DB::raw("

        select a.id, a.tanggal, a.hargaKg, a.kuli, a.penerima, a.alamatPenerima, a.noTelpPenerima,
        b.namaCustomer , c.berat, d.vendor, e.jenisPembayaran, f.platNomor 
        from penjualan a
        inner join customer b on a.customer_id = b.id
        inner join barang c on a.barang_id = c.id
        inner join vendor d on a.vendor_id = d.id
        inner join metode_pembayaran e on a.metodePembayaran_id = e.id
        inner join status_pengiriman f on a.statusPengiriman_id = f.id

        "));
        return DataTables::of($data)
        //button aksi
        ->addColumn('aksi', function($s){
            return '<a href="order/edit/'.$s->id.'" class="btn btn-warning">Edit</a>
            <a href="order/destroy/'.$s->id.'" class="btn btn-danger">Hapus</a>
            <a href="order/notif/'.$s->id.'" class="btn btn-success">Kirim Notif</a>
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
        $barang = Barang::all();
        
        return view('order.add', [
            'vendor' => $vendor,
            'customer' => $customer,
            'statusPengiriman' => $statusPengiriman,
            'metodePembayaran' => $metodePembayaran,
            'barang' => $barang
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
            'barang_id' => 'required',
            'metodePembayaran_id' => 'required',
            'statusPengiriman_id' => 'required',
            'customer_id' => 'required',
        ]);

        Penjualan::create([
            'tanggal' => $request->tanggal,
            'hargaKg' => $request->hargaKg,
            'kuli' => $request->kuli,
            'penerima' => $request->penerima,
            'alamatPenerima' => $request->alamatPenerima,
            'noTelpPenerima' => $request->noTelpPenerima,
            'vendor_id' => $request->vendor_id,
            'barang_id' => $request->barang_id,
            'metodePembayaran_id' => $request->metodePembayaran_id,
            'statusPengiriman_id' => $request->statusPengiriman_id,
            'customer_id' => $request->customer_id,
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
        
        return view('order.edit', [
            'order' => $order,
            'vendor' => $vendor,
            'customer' => $customer,
            'statusPengiriman' => $statusPengiriman,
            'metodePembayaran' => $metodePembayaran,
            'barang' => $barang
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