<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class KurirController extends Controller
{
    //
    public function index()
    {
        $kurir = DB::table('users')
        ->where('jabatan', 0)
        ->get();
        
        return view('kurir.index', [
            'kurir' => $kurir
            ]);
    }

    public function dt()
    {
        $data =  User::all();
        return DataTables::of($data)
        //button aksi
        ->editColumn('gender', function ($db) {
            if($db->gender == 1){
                $c = 'Laki-Laki';
            } else{
                $c = 'Perempuan';
            }
            return $c;
        })
        ->addColumn('aksi', function($s){
            return '<a href="kurir/edit/'.$s->id.'" class="btn btn-warning"><i class="fa fa-pencil"></i>Edit</a>
            <button type="button" name="delete" id="'.$s->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-close"></i>Delete</button>
            ';
        })
        ->rawColumns(['gender','aksi'])
        ->toJSon();
    }

    public function create()
    {
        return view('kurir.add');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'telp' => 'required',
            'platNomor' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'address' => $request->address,
            'telp' => $request->telp,
            'platNomor' => $request->platNomor,
            'password' => bcrypt('123456789'),
            'jabatan' => 0,
            'avatar' => 'default.png'
        ]);
        return redirect('admin/kurir')->with('message','Data Berhasil Disimpan');
    }
    public function edit($id)
    {
        //
        $kurir = User::find($id);
        return view('kurir.edit', ['kurir'=> $kurir]);
    }

    public function update(Request $request, $id)
    {
        //
       $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'telp' => 'required',
            'platNomor' => 'required'
        ]);

        $kurir = User::find($id);
        $kurir->name = $request->name;
        $kurir->email = $request->email;
        $kurir->gender = $request->gender;
        $kurir->address = $request->address;
        $kurir->telp = $request->telp;
        $kurir->platNomor = $request->platNomor;

        $kurir->save();
        return redirect('admin/kurir')->with('message', 'Data Berhasil Diupdate');
    }

    public function destroy($id)
    {
        //
        $kurir = User::find($id);

        // $kurir->delete();
        // return redirect('admin/kurir')->with('message', 'Data Berhasil DiHapus');
        $kurir->delete();
               
    }
}
