<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Suratmasuk;
use File;

class SuratMasukController extends Controller
{
	public function index(){
        $data = Suratmasuk::all();
        return response()->json($data);
    }

    public function create(Request $request){

    	$file = $request->file('lampiran');
        //dd($file);
        $new_file = $file->getClientOriginalName();
        $file->move(public_path('files'), $new_file);

    	$surat = new Suratmasuk();
	    //$surat->tgl_buat_surat = $request->tgl_buat_surat;
	    $surat->pengirim = $request->pengirim;
	    $surat->no_surat = $request->no_surat;
	    $surat->tgl_surat = $request->tgl_surat;
	    $surat->perihal = $request->perihal;
	    $surat->lampiran = $new_file;
	    $surat->id_jenis = $request->id_jenis;

        $response['success'] = true;

        if ($surat && $surat->save()) {
            $response['message'] = 'Berhasil Di Simpan';
            $response['data'] = $surat;
        }else{
            $response['success'] = false;
            $response['message'] = 'Gagal Tersimpan';
            $response['data'] = '';
        }

        return response()->json($response);
    }

    public function delete($id){
        $data = Suratmasuk::where('id',$id)->first();

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
    	$surat = Suratmasuk::find($id);
    	// dd($surat);
    	$file = $request->file('lampiran');
    	if ($file != null) {
	        $new_file = $file->getClientOriginalName();
	        $file->move(public_path('files'), $new_file);
	        $surat->lampiran = $new_file;  
	    }
        //$surat->tgl_buat_surat = $request->tgl_buat_surat;
	    $surat->pengirim = $request->pengirim;
	    $surat->no_surat = $request->no_surat;
	    $surat->tgl_surat = $request->tgl_surat;
	    $surat->perihal = $request->perihal;
	    $surat->id_jenis = $request->id_jenis;

        $response['success'] = true;

        if ($surat && $surat->save()) {
            $response['message'] = 'Berhasil Di update';
            $response['data'] = $surat;
        }else{
            $response['success'] = false;
            $response['message'] = 'Gagal Terupdate';
            $response['data'] = '';
        }

        return response()->json($response);
    }

    public function edit($id){
    	$data = Suratmasuk::find($id);
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

    public function download($id,$lampiran){
        $data = Suratmasuk::find($id);
        $path = public_path('files/'.$lampiran);
        return response()->download($path);
    }

    public function show($id){
        $data = Suratmasuk::where('id',$id)->first();
        Suratmasuk::where('id',$id)->update([
            'status'=> $data->status = 1,
        ]);
        $response['success'] = true;
        if($data){
            $response['message'] = 'Terbaca';
            $response['data'] = $data;
        }else{
            $response['success'] = false;
            $response['message'] = 'Gagal Terbaca';
            $response['data'] = '';
        }
        return response()->json($response);
    }

    public function laporan(){
        $data = Suratmasuk::all();
        return response()->json($data);
    }
}