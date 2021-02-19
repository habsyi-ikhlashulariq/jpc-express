<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function profile()
    {
        $user = DB::table('users')
                ->where('id', Auth::user()->id)
                ->first();
        return view('user.profile', [
            'user' => $user
        ]);
    }
    public function ubah_profile()
    {
        $user = DB::table('users')
                ->where('id', Auth::user()->id)
                ->first();
        $jk = ["Laki-Laki", "Perempuan"];
        return view('user.update', [
            'user' => $user,
            'jk' => $jk
        ]);
    }
    
    public function update_profile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'gender' => 'required',
            'email' => 'required',
            'telp' => 'required',
            'address' => 'required'
        ]);
        $id = Auth::user()->id;
        $profile = User::find($id);
        $profile->name = $request->name;
        $profile->gender = $request->gender;
        $profile->email = $request->email;
        $profile->telp = $request->telp;
        $profile->address = $request->address;

        if ($request->file('avatar') == "") {
            $profile->avatar = $profile->avatar;
        }else{
            $file = $request->file('avatar');
            $file_name = $file->getClientOriginalName();
            $request->avatar->move(public_path().'/user_profile', $file_name);
            $profile->avatar = $file_name;    
        }

        $profile->update();
        return redirect('/profile')->with('message', 'Data Berhasil Diupdate');
    }

    public function ubah_password()
    {
        $user = DB::table('users')
                ->where('id', Auth::user()->id)
                ->first();
        return view('user.update_password', [
            'user' => $user,
        ]);
    }
    public function update_password()
    {
        request()->validate([
            'old_password' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $currentPassword = auth()->user()->password;
        $old_password = request('old_password');

        if (Hash::check($old_password, $currentPassword)) {
            auth()->user()->update([

                'password' => bcrypt(request('password')),
            
            ]);
            return back()->with('success', 'Youre Changed');

        }else{
            return back()->withErrors(['old_password' => 'Make sure you fill your current password']);
        }
    }
}
