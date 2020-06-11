<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Validator;
use Hash;
// use DB;

class UserController extends Controller
{	
	/**
	* Handle an authentication attempt.
	*
	* @param \Illuminate\Http\Request $request
	*
	* @return Response;
	*/
	public function login(Request $request){
		// $user = User::where('email',$request->email)
		// 			->where('password', Hash::make($request->password))
		// 			->first();
		// //return response()->json(Hash::make($request->password));

		$user = $request->only('email','password');

		$response['success'] = true;
		if(Auth::attempt($user)){
			$user['password'] = Hash::make($user['password']);
			$response['message'] = 'Berhasil login';
            $response['data'] = $user;
		}else {
			$response['success'] = false;
            $response['message'] = 'Gagal Login';
            $response['data'] = '';
		}
		return response()->json($response);
	}

	public function register(Request $request){
		$register = new User();
	    //$surat->tgl_buat_surat = $request->tgl_buat_surat;
	    $register->name = $request->name;
	    $register->email = $request->email;
	    $register->password = Hash::make($request->password);
	    //$register->remember_token = $request->remember_token;
	    $register->level = $request->level;

        $response['success'] = true;

        if ($register && $register->save()) {
            $response['message'] = 'Berhasil Di Simpan';
            $response['data'] = $register;
        }else{
            $response['success'] = false;
            $response['message'] = 'Gagal Tersimpan';
            $response['data'] = '';
        }
		return response()->json($response);
	}
}