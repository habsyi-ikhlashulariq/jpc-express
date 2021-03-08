<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('destination.index');
    }

    public function dt()
    {
        $data =  Destination::all();
        return DataTables::of($data)
        //button aksi
        ->addColumn('aksi', function($s){
            return '<a href="destinasi/edit/'.$s->id.'" class="btn btn-warning"><i class="fa fa-pencil"></i>Edit</a>
            <a href="destinasi/destroy/'.$s->id.'" class="btn btn-danger"><i class="fa fa-close"></i>Hapus</a>
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
        return view('destination.add');
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
            'kotaAsal' => 'required',
            'kotaTujuan' => 'required',
            'tarif' => 'required',
            'waktu' => 'required',
        ]);

        Destination::create([
            'kotaAsal' => $request->kotaAsal,
            'kotaTujuan' => $request->kotaTujuan,
            'tarif' => $request->tarif,
            'waktu' => $request->waktu,
        ]);
        return redirect('admin/destinasi')->with('message','Data Berhasil Disimpan');
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
        $destinasi = Destination::find($id);
        return view('destination.edit', ['destinasi'=> $destinasi]);
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
            'kotaAsal' => 'required',
            'kotaTujuan' => 'required',
            'tarif' => 'required',
            'waktu' => 'required',
        ]);

        $destinasi = Destination::find($id);
        $destinasi->kotaAsal = $request->kotaAsal;
        $destinasi->kotaTujuan = $request->kotaTujuan;
        $destinasi->tarif = $request->tarif;
        $destinasi->waktu = $request->waktu;

        $destinasi->save();
        return redirect('admin/destinasi')->with('message', 'Data Berhasil Diupdate');
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
        $destinasi = Destination::find($id);

        $destinasi->delete();
        return redirect('admin/destinasi')->with('message', 'Data Berhasil DiHapus');
    }
}
