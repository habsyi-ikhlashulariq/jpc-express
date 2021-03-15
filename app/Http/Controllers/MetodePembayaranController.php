<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetodePembayaran;
use Yajra\Datatables\Datatables;

class MetodePembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('metode_pembayaran.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dt()
    {
        $data =  MetodePembayaran::all();
        return DataTables::of($data)
        //button aksi
        ->addColumn('aksi', function($s){
            return '<a href="metode_pembayaran/edit/'.$s->id.'" class="btn btn-warning"><i class="fa fa-pencil"></i>Edit</a>
            <button type="button" name="delete" id="'.$s->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-close"></i>Delete</button>
            ';
        })
        ->rawColumns(['aksi'])
        ->toJSon();
    }
    public function create()
    {
        //
        return view('metode_pembayaran.add');
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
            'jenisPembayaran' => 'required',
        ]);

        MetodePembayaran::create([
            'jenisPembayaran' => $request->jenisPembayaran,
        ]);
        return redirect('admin/metode_pembayaran')->with('message','Data Berhasil Disimpan');
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
        $metode_pembayaran = MetodePembayaran::find($id);
        return view('metode_pembayaran.edit', ['metode_pembayaran'=> $metode_pembayaran]);
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
            'jenisPembayaran' => 'required',
        ]);
        $metode_pembayaran = MetodePembayaran::find($id);
        $metode_pembayaran->jenisPembayaran = $request->jenisPembayaran;

        $metode_pembayaran->save();
        return redirect('admin/metode_pembayaran')->with('message', 'Data Berhasil Diupdate');
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
        $metode_pembayaran = MetodePembayaran::find($id);

        $metode_pembayaran->delete();
        // return redirect('admin/metode_pembayaran')->with('message', 'Data Berhasil DiHapus');
    }
}
