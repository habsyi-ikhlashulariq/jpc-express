<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Mail\SendMail;
use App\Models\Barang;
use App\Models\Vendor;
use App\Mail\JpcExpress;
use App\Models\Customer;
use App\Models\Penjualan;
use App\Models\Destination;
use App\Models\DetailVendor;
use Illuminate\Http\Request;
use App\Models\DetailPenjualan;
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
        $data = Penjualan::select('penjualan.*', 'customer.namaCustomer', 'barang.berat','metode_pembayaran.jenisPembayaran')
        ->join('customer', 'customer.id', 'penjualan.customer_id')
        ->join('barang', 'barang.id', 'penjualan.barang_id')
        // ->join('vendor', 'vendor.id', 'penjualan.vendor_id')
        ->join('metode_pembayaran', 'metode_pembayaran.id', 'penjualan.metodePembayaran_id')
        // ->join('status_pengiriman','status_pengiriman.penjualan_id','penjualan.noResi')
        ->groupBy('penjualan.noResi')
        ->get();
        return DataTables::of($data)
        //button aksi
        ->addColumn('aksi', function($s){
            return '
            <a href="order/detail/'.$s->noResi.'" class="btn btn-primary"><i class="fa fa-info"></i>Detail</a>

            <a href="order/resi/'.$s->noResi.'"  target="_blank" class="btn btn-success"><i class="fa fa-print"></i>Cetak Resi</a>

            <a href="order/notif/'.$s->noResi.'" class="btn btn-warning"><i class="fa fa-send"></i>Kirim Notif</a>

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
        $metodePembayaran = MetodePembayaran::all();
        $destinasi = Destination::all();
        $user = User::where('jabatan',0)->get();
       
        return view('order.add', [
            'vendor' => $vendor,
            'customer' => $customer,
            'metodePembayaran' => $metodePembayaran,
            'destinasi' => $destinasi,
            'user' => $user,
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
            'metodePembayaran_id' => 'required',
            // 'customer_id' => 'required',
            'destinasi_id' => 'required',
            'berat' => 'required',
            'panjang' => 'required',
            'lebar' => 'required',
            'tinggi' => 'required',
            'beratVol' => 'required',
            'pilihan' => 'required',
            'totalBiaya' => 'required',  

            'namaCustomer' => 'required',
            'emailCustomer' => 'required|email',
            'noTelpCustomer' => 'required',
            'genderCustomer' => 'required',
            'alamatCustomer' => 'required'

            
        ]);

        $dataBarang = Barang::create([
            'berat' => $request->berat,
            'panjang' => $request->panjang,
            'lebar' => $request->lebar,
            'tinggi' => $request->tinggi,
            'beratVol' => $request->beratVol,
        ]);

        $dataCustomer = Customer::create([
            'namaCustomer' => $request->namaCustomer,
            'emailCustomer' => $request->emailCustomer,
            'noTelpCustomer' => $request->noTelpCustomer,
            'genderCustomer' => $request->genderCustomer,
            'alamatCustomer' => $request->alamatCustomer,
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
            'vendor_id' => $request->vendor_id ? $request->vendor_id : null,
            'barang_id' => $dataBarang->id,
            'metodePembayaran_id' => $request->metodePembayaran_id,
            'customer_id' => $dataCustomer->id,
            'destinasi_id' => $request->destinasi_id,
        ]);
        if($request->vendor_id != null){
            if($request->pilihan == 0){
                StatusPengiriman::create([
                    'penjualan_id' => $newID,
                    'kurir_id' => $request->kurir_id,
                    'keterangan' => "Barang Sedang Dijemput",
                    'tanggal' => date('Y-m-d'),
                    'status' => 0
                ]);
            }else if($request->pilihan == 1){
                StatusPengiriman::create([
                    'penjualan_id' => $newID,
                    'kurir_id' => $request->kurir_id,
                    'keterangan' => "Sedang Menunggu Barang Di Antar",
                    'tanggal' => date('Y-m-d'),
                    'status' => 0
                ]);
            }
        }

        DetailPenjualan::create([
            'penjualan_id' => $newID,
            'totalBiaya' => $request->totalBiaya,            
            'statusFinish' => 0
        ]);
        
        if($request->vendor_id != null){
            DetailVendor::Create([
                'vendor_id' => $request->vendor_id,
                'penjualan_id' => $newID,
                'totalBiaya' => $request->totalBiayaVendor,
            ]);
        }
        return redirect('admin/order')->with('message','Data Berhasil Disimpan');
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
        $order = Penjualan::select('penjualan.*',
        'barang.berat',
        'barang.tinggi',
        'barang.panjang',
        'barang.lebar',
        'barang.beratVol',
        'customer.namaCustomer',
        'customer.emailCustomer',
        'customer.noTelpCustomer',
        'customer.genderCustomer',
        'customer.alamatCustomer',
        )
        ->join('barang','barang.id','penjualan.barang_id')
        ->join('customer','customer.id','penjualan.customer_id')
        ->where('penjualan.noResi',$id)
        ->first();


        $detail_vendor = DetailVendor::select('detail_vendor.*')
        ->where('detail_vendor.penjualan_id', $id)
        ->first();

        $detail_penjualan = DetailPenjualan::where('penjualan_id', $id)->first();

        $status_pengiriman = StatusPengiriman::where('penjualan_id', $id)
        ->first();
        // dd($status_pengiriman);


        $vendor = Vendor::get();
        $customer = Customer::get();
        $metodePembayaran = MetodePembayaran::get();
        $destinasi = Destination::get();
        $user = User::where('jabatan',0)->get();
        
        return view('order.edit', [
            'order' => $order,
            'vendor' => $vendor,
            'metodePembayaran' => $metodePembayaran,
            'destinasi' => $destinasi,
            'user' => $user,
            'customer' => $customer,
            'detail_vendor' => $detail_vendor,
            'detail_penjualan' => $detail_penjualan,
            'status_pengiriman' => $status_pengiriman,
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
        // dd($request->all());
        $this->validate($request, [
            'tanggal' => 'required',
            'hargaKg' => 'required',
            'kuli' => 'required',
            'penerima' => 'required',
            'alamatPenerima' => 'required',
            'noTelpPenerima' => 'required',
            'vendor_id' => 'required',
            'metodePembayaran_id' => 'required',
            'destinasi_id' => 'required',
            'berat' => 'required',
            'panjang' => 'required',
            'lebar' => 'required',
            'tinggi' => 'required',
            'beratVol' => 'required',

            'namaCustomer' => 'required',
            'emailCustomer' => 'required|email',
            'noTelpCustomer' => 'required',
            'genderCustomer' => 'required',
            'alamatCustomer' => 'required'
            
        ]);

        $penjualan = Penjualan::find($id);
        $penjualan->tanggal = $request->tanggal;
        $penjualan->hargaKg = $request->hargaKg;
        $penjualan->kuli = $request->kuli;
        $penjualan->penerima = $request->penerima;
        $penjualan->alamatPenerima = $request->alamatPenerima;
        $penjualan->noTelpPenerima = $request->noTelpPenerima;
        $penjualan->vendor_id = $request->vendor_id;
        $penjualan->metodePembayaran_id = $request->metodePembayaran_id;
        $penjualan->destinasi_id = $request->destinasi_id;
        $penjualan->save();
        
        $barang = Barang::where('id', $penjualan->barang_id)->first();
        $barang->berat = $request->berat;
        $barang->panjang = $request->panjang;
        $barang->lebar = $request->lebar;
        $barang->tinggi = $request->tinggi;
        $barang->beratVol = $request->beratVol;
        $barang->save();

        $customer = Customer::where('id', $penjualan->customer_id)->first();
        $customer->namaCustomer = $request->namaCustomer;
        $customer->emailCustomer = $request->emailCustomer;
        $customer->noTelpCustomer = $request->noTelpCustomer;
        $customer->genderCustomer = $request->genderCustomer;
        $customer->alamatCustomer = $request->alamatCustomer;
        $customer->save();

        if ($request->vendor_id != null) {
            if($request->pilihan == 0){
                $status_pengiriman = StatusPengiriman::where('penjualan_id', $id)->first();
                $status_pengiriman->kurir_id = $request->kurir_id;
                $status_pengiriman->keterangan = "Barang Sedang Dijemput";
                $status_pengiriman->tanggal = date('Y-m-d');
                $status_pengiriman->status = 0;
                $status_pengiriman->save();
                
            }elseif ($request->pilihan == 1) {
                $status_pengiriman = StatusPengiriman::where('penjualan_id', $id)->first();
                $status_pengiriman->kurir_id = $request->kurir_id;
                $status_pengiriman->keterangan = "Sedang Menunggu Barang Di Antar";
                $status_pengiriman->tanggal = date('Y-m-d');
                $status_pengiriman->status = 0;
                $status_pengiriman->save();
            }
            
        }
        
        if($request->vendor_id != null){
            $detail_vendor = DetailVendor::where('penjualan_id', $id)->first();
            $detail_vendor->vendor_id = $request->vendor_id;
            $detail_vendor->totalBiaya = $request->totalBiayaVendor;
            $detail_vendor->save();
        }
        
        $detail_penjualan = DetailPenjualan::where('penjualan_id', $id)->first();
        $detail_vendor->totalBiaya = $request->totalBiaya;
        $detail_vendor->save();

        return redirect('admin/order')->with('message', 'Data Berhasil Diupdate');
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
        // return redirect('admin/order')->with('message', 'Data Berhasil DiHapus');
    }
    public function form_cetak_laporan()
    {
        return view('order.cetak_laporan');
    }
    public function cetak_laporan(Request $request)
    {


 
    // $this->validate($request,[
    //     'tglAwal' => 'required|date',
    //     'tglAkhir' => 'required|date|before_or_equal:tglAwal',
    //    ]);
     
    $tglAwal = date($request->tglAwal);
    $tglAkhir = date($request->tglAkhir);

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
     
     )
    ->join('customer', 'customer.id', 'penjualan.customer_id')
    ->join('barang', 'barang.id', 'penjualan.barang_id')
    ->join('vendor', 'vendor.id', 'penjualan.vendor_id')
    ->join('metode_pembayaran', 'metode_pembayaran.id', 'penjualan.metodePembayaran_id')
    ->join('status_pengiriman', 'status_pengiriman.penjualan_id', 'penjualan.noResi')
    ->join('destinations', 'destinations.id', 'penjualan.destinasi_id')
    ->whereBetween('penjualan.tanggal', [$tglAwal, $tglAkhir])
    ->get();

    return view('order.data_laporan', compact('data'));

    }
    public function notif($id)
    {
        $data = Penjualan::select('penjualan.noResi', 
        'penjualan.tanggal', 
        'penjualan.hargaKg', 
        'penjualan.kuli', 
        'penjualan.penerima',
        'penjualan.alamatPenerima',
        'penjualan.noTelpPenerima',
        'customer.namaCustomer',
        'customer.noTelpCustomer',
        'customer.emailCustomer', 
        'barang.berat',
        'barang.panjang',
        'vendor.vendor', 
        'status_pengiriman.keterangan',
        'metode_pembayaran.jenisPembayaran')
        ->join('customer', 'customer.id', 'penjualan.customer_id')
        ->join('barang', 'barang.id', 'penjualan.barang_id')
        ->join('vendor', 'vendor.id', 'penjualan.vendor_id')
        ->join('metode_pembayaran', 'metode_pembayaran.id', 'penjualan.metodePembayaran_id')
        ->join('status_pengiriman','status_pengiriman.penjualan_id','penjualan.noResi')
        ->join('destinations','destinations.id','penjualan.destinasi_id')
        ->where('penjualan.noResi', $id)
        ->first();
        $kirim = Mail::to( $data->emailCustomer)->send(new JpcExpress($data->namaCustomer, $data->noTelpCustomer, $data->noResi, $data->penerima, $data->alamatPenerima, $data->noTelpPenerima, $data->berat, $data->panjang, $data->keterangan,  $data->tanggal,  $data->kotaAsal,  $data->kotaTujuan ));
    
        return redirect('admin/order')->with('message', 'Berhasil Kirim Notifikasi');

    }
    public function detail($penjualan_id){
        $penjualan = penjualan::select(
            'penjualan.noResi',
            'penjualan.tanggal', 
            'penjualan.hargaKg',
            'penjualan.kuli', 
            'penjualan.penerima',
            'penjualan.alamatPenerima',
            'penjualan.noTelpPenerima',
            'customer.namaCustomer',
            'customer.alamatCustomer',
            'vendor.id as resi_vendor', 
            'vendor.vendor', 
            'metode_pembayaran.jenisPembayaran', 
            'status_pengiriman.status as statusPengiriman', 
            'status_pengiriman.keterangan', 
            'status_pengiriman.id as statusPengirimanID',
            'destinations.kotaAsal', 
            'destinations.kotaTujuan', 
            'barang.berat',
            'barang.panjang', 
            'barang.tinggi', 
            'barang.beratVol', 
            'detail_penjualan.totalBiaya',
            'detail_vendor.totalBiaya as totalBiayaVendor',
            DB::raw('barang.beratVol * penjualan.hargaKg as total_harga')
            
            )
        ->join('customer', 'customer.id', 'penjualan.customer_id')
        ->join('barang', 'barang.id', 'penjualan.barang_id')
        ->leftjoin('vendor', 'vendor.id', 'penjualan.vendor_id')
        ->join('detail_penjualan','detail_penjualan.penjualan_id','penjualan.noResi')
        ->leftjoin('detail_vendor','detail_vendor.penjualan_id','penjualan.noResi')
        ->join('metode_pembayaran', 'metode_pembayaran.id', 'penjualan.metodePembayaran_id')
        ->leftjoin('status_pengiriman', 'status_pengiriman.penjualan_id', 'penjualan.noResi')
        ->join('destinations', 'destinations.id', 'penjualan.destinasi_id')        
        ->orderBy('statusPengirimanID','DESC')
        ->first();

        
        return view('order.detail', ['penjualan'=> $penjualan, 'penjualan_id' => $penjualan_id]);
    }
}