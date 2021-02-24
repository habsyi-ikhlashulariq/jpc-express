<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Models\StatusPengiriman;
use App\Models\User;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StatusPengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('status_pengiriman.index');
    }

    public function dt()
    {
        $data =  DB::table('status_pengiriman')
        ->groupBy('penjualan_id')
        ->get();
        return DataTables::of($data)
        //button aksi
        ->addColumn('aksi', function($s){
            return '<a href="status_pengiriman/detail/'.$s->penjualan_id.'" class="btn btn-success">Detail</a>
            ';
        })
        ->rawColumns(['aksi'])
        ->toJSon();
    }

    public function detail($penjualan_id){
        $status_pengiriman = DB::table('status_pengiriman')
        ->join('users', 'users.id', 'status_pengiriman.kurir_id')
        ->select('status_pengiriman.*','users.name','users.platNomor')
        ->where('penjualan_id', $penjualan_id)
        ->get();
        return view('status_pengiriman.detail', ['status_pengiriman'=> $status_pengiriman,'penjualan_id' => $penjualan_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $penjualan = DB::table('penjualan')
            ->join('customer', 'customer.id', '=', 'penjualan.customer_id')
            ->select('penjualan.*', 'customer.namaCustomer')
            ->get();
        $kurir = DB::table('users')->where('jabatan', 0)->get();
        return view('status_pengiriman.add', [
            'penjualan' => $penjualan,
            'kurir' => $kurir
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
            'kurir_id' => 'required',
            'tanggal' => 'required',
            'noResi' => 'required',
            'keterangan' => 'required',
        ]);

        StatusPengiriman::create([
            'penjualan_id' => $request->noResi,
            'kurir_id' => $request->kurir_id,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'status' => false
        ]);
        return redirect('admin/status_pengiriman')->with('message','Data Berhasil Disimpan');
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
        //
        $status_pengiriman = StatusPengiriman::find($id);
        return view('status_pengiriman.edit', ['status_pengiriman'=> $status_pengiriman]);
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
            'platNomor' => 'required',
            'namaSupir' => 'required',
            'keterangan' => 'required',
            'tanggal' => 'required',
        ]);

        $status_pengiriman = StatusPengiriman::find($id);
        $status_pengiriman->platNomor = $request->platNomor;
        $status_pengiriman->namaSupir = $request->namaSupir;
        $status_pengiriman->keterangan = $request->keterangan;
        $status_pengiriman->tanggal = $request->tanggal;

        $status_pengiriman->save();

        return redirect('admin/status_pengiriman')->with('message', 'Data Berhasil Diupdate');
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
        $status_pengiriman = StatusPengiriman::find($id);

        $status_pengiriman->delete();
        return redirect('admin/status_pengiriman')->with('message', 'Data Berhasil DiHapus');
    }

    public function index_kurir()
    {
        return view('status_pengiriman.index_kurir');
    }

    public function dt_kurir()
    {
        $data =  DB::table('status_pengiriman')
        ->join('users', 'users.id', '=', 'status_pengiriman.kurir_id')
        ->select('status_pengiriman.id', 'status_pengiriman.tanggal','status_pengiriman.penjualan_id', 'users.id as kurir_id', 'users.name', 'status_pengiriman.status', 'status_pengiriman.keterangan')
        ->where('status_pengiriman.kurir_id', Auth::user()->id)
        ->get();
        return DataTables::of($data)
        //button aksi
        ->addColumn('aksi', function($s){
            return '<a href="status_pengiriman/edit/'.$s->penjualan_id.'" class="btn btn-success">Detail</a>
            ';
        })
        ->rawColumns(['aksi'])
        ->toJSon();
    }
}
