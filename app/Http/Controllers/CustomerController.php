<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('customer.index');
    }
    public function dt()
    {
        $data =  Customer::all();
        return DataTables::of($data)
        //button aksi
        ->addColumn('aksi', function($s){
            return '<a href="customer/edit/'.$s->id.'" class="btn btn-warning">Edit</a>
            <a href="customer/destroy/'.$s->id.'" class="btn btn-danger">Hapus</a>
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
        return view('customer.add');
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
            'namaCustomer' => 'required',
            'emailCustomer' => 'required',
            'noTelpCustomer' => 'required',
            'genderCustomer' => 'required',
            'alamatCustomer' => 'required'
        ]);

        Customer::create([
            'namaCustomer' => $request->namaCustomer,
            'emailCustomer' => $request->emailCustomer,
            'noTelpCustomer' => $request->noTelpCustomer,
            'genderCustomer' => $request->genderCustomer,
            'alamatCustomer' => $request->alamatCustomer,
        ]);
        return redirect('customer')->with('message','Data Berhasil Disimpan');
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
        $customer = Customer::find($id);
        return view('customer.edit', ['customer'=> $customer]);
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
            'namaCustomer' => 'required',
            'emailCustomer' => 'required',
            'noTelpCustomer' => 'required',
            'genderCustomer' => 'required',
            'alamatCustomer' => 'required'
        ]);
        $customer = Customer::find($id);
        $customer->namaCustomer = $request->namaCustomer;
        $customer->emailCustomer = $request->emailCustomer;
        $customer->noTelpCustomer = $request->noTelpCustomer;
        $customer->genderCustomer = $request->genderCustomer;
        $customer->alamatCustomer = $request->alamatCustomer;

        $customer->save();
        return redirect('/customer')->with('message', 'Data Berhasil Diupdate');
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
        $customer = Customer::find($id);

        $customer->delete();
        return redirect('/customer')->with('message', 'Data Berhasil DiHapus');
    }
}
