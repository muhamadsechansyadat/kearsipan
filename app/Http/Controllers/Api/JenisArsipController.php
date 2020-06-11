<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jenisarsip;
// use DB;

class JenisArsipController extends Controller
{
    public function index(){
        $data = Jenisarsip::all();
        return response()->json($data);
    }

    public function create(Request $request){
        $simpan=Jenisarsip::create([
            'jenis_surat' => $request->jenis_surat]);
        $response['success'] = true;

        if ($simpan && $simpan->save()) {
            $response['message'] = 'Berhasil Di Simpan';
            $response['data'] = $simpan;
        }else{
            $response['success'] = false;
            $response['message'] = 'Gagal Tersimpan';
            $response['data'] = '';
        }

        return response()->json($response);
    }

    public function delete($id){
        $data = Jenisarsip::where('id',$id)->first();

        $response['success'] = true;

        if ($data && $data->delete()) {
            $response['message'] = 'Berhasil Hapus';
            $response['data'] = $data->id;
        }else{
            $response['success'] = false;
            $response['message'] = 'Gagal Hapus';
            $response['data'] = '';
        }

        return response()->json($response);
    }

    public function update(Request $request,$id){
        $id = $request->id;
        $jenis = Jenisarsip::find($id);
        $jenis->jenis_surat = $request->jenis_surat;
        $response['success'] = true;

        if ($jenis && $jenis->save()) {
            $response['message'] = 'Berhasil Di Update';
            $response['data'] = $jenis;
        }else{
            $response['success'] = false;
            $response['message'] = 'Gagal Terupdate';
            $response['data'] = '';
        }

        return response()->json($response);
    }

    public function edit($id){
        // $id = $request->id;
        $data = Jenisarsip::find($id);
        $response['success'] = true;
        if($data){
            $response['message'] = 'Berhasil Di Update';
            $response['data'] = $data;
        }else{
            $response['success'] = false;
            $response['message'] = 'Gagal Terupdate';
            $response['data'] = '';
        }
        return response()->json($data);
    }
}
