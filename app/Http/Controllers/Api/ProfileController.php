<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Validator;

class ProfileController extends BaseController
{
    //
    public function show($id)
    {
        $user = DB::table('users')
        ->where('jabatan', 0)
        ->Where('id', $id)
        ->first();

        if ($user) {
            return response()->json([
                'message' => 'Detail get by ID',
                'data'    => $user
            ], 200);
        } else {
            return response()->json([
                'message'    => "Detail Method Failed ".$id. " not found"
            ], 422);
        }
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        // $user = DB::table('users')
        // ->where('id', $id)
        // ->first();

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'gender' => ['required', 'string'],
            'address' => ['required', 'string'],
            'telp' => ['required', 'string'],
            'avatar' => ['required', 'string'],
            'platNomor' => ['required']
        ],
    );

        if ($user) {
            if ($validator->fails()) {
                return $this->responseError('Update Items Failed', 422, $validator->errors());
            }
            $user->name = $request->name ? $request->name : $user->name;
            $user->email = $request->email ? $request->email : $user->email;
            $user->gender = $request->gender ? $request->gender : $user->gender;
            $user->address = $request->address? $request->address : $user->address;
            $user->telp = $request->telp? $request->telp : $user->telp;
            $user->avatar = $request->telp? $request->telp : $user->telp;
            $user->platNomor = $request->platNomor? $request->platNomor : $user->platNomor;

            $user->save();

            return response()->json([ 
                "message" => "PUT Method Success ",
                "data" => $user
            ]);
        }
        return response()->json([
            "message" => "PUT Method Failed ".$id. " not found"
        ], 404);
    }
}
