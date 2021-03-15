<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('vendor.index');
    }

    public function dt()
    {
        $data =  Vendor::all();
        return DataTables::of($data)
        //button aksi
        ->addColumn('aksi', function($s){
            return '<a href="vendor/edit/'.$s->id.'" class="btn btn-warning"> <i class="fa fa-pencil"></i>Edit</a>
            <button type="button" name="delete" id="'.$s->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-close"></i>Delete</button>
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
        return view('vendor.add');
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
            'vendor' => 'required',
        ]);

        Vendor::create([
            'vendor' => $request->vendor,
        ]);
        return redirect('admin/vendor')->with('message','Data Berhasil Disimpan');
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
        $vendor = Vendor::find($id);
        return view('vendor.edit', ['vendor'=> $vendor]);
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
            'vendor' => 'required',
        ]);
        $vendor = Vendor::find($id);
        $vendor->vendor = $request->vendor;

        $vendor->save();
        return redirect('admin/vendor')->with('message', 'Data Berhasil Diupdate');
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
        $vendor = Vendor::find($id);

        $vendor->delete();
        // return redirect('admin/vendor')->with('message', 'Data Berhasil DiHapus');
    }
}
