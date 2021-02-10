<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StatusPengiriman;
use Yajra\Datatables\Datatables;

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
        $data =  StatusPengiriman::all();
        return DataTables::of($data)
        //button aksi
        ->addColumn('aksi', function($s){
            return '<a href="status_pengiriman/edit/'.$s->id.'" class="btn btn-warning">Edit</a>
            <a href="status_pengiriman/destroy/'.$s->id.'" class="btn btn-danger">Hapus</a>
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
        return view('status_pengiriman.add');
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
            'platNomor' => 'required',
            'namaSupir' => 'required',
            'keterangan' => 'required',
            'tanggal' => 'required',
        ]);

        StatusPengiriman::create([
            'platNomor' => $request->platNomor,
            'namaSupir' => $request->namaSupir,
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tanggal,
        ]);
        return redirect('status_pengiriman')->with('message','Data Berhasil Disimpan');
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

        return redirect('/status_pengiriman')->with('message', 'Data Berhasil Diupdate');
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
        return redirect('/status_pengiriman')->with('message', 'Data Berhasil DiHapus');
    }
}
