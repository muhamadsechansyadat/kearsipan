<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Suratkeluar;
use DB;
//use File;

class SuratKeluarController extends Controller
{
	public function index(){
        $data = Suratkeluar::all();
        return response()->json($data);
    }

    public function autocode(){
    	$no = DB::table('suratkeluars')->select('id')->max('id');
    	$id = sprintf("%04s", $no+1);
    	$month = date('m');
    	if($month = '01'){
    		$m = "I";
    	}elseif($month = '02'){
    		$m = "II";
    	}elseif($month = '03'){
    		$m = "III";
    	}elseif($month = '04'){
    		$m = "IV";
    	}elseif($month = '05'){
    		$m = "V";
    	}elseif($month = '06'){
    		$m = "VI";
    	}elseif($month = '07'){
    		$m = "VII";
    	}elseif($month = '08'){
    		$m = "VIII";
    	}elseif($month = '09'){
    		$m = "IX";
    	}elseif($month = '10'){
    		$m = "X";
    	}elseif($month = '11'){
    		$m = "XI";
    	}elseif($month = '12'){
    		$m = "XII";
    	}

    	$year = date('Y');

    	$no_surat = '421.5/'.$id.'/SMK Wikrama/'.$m.'/'.$year;

    	return response()->json($no_surat);
    }

    public function create(Request $request){
    	$file = $request->file('lampiran');
        //dd($file);
        $new_file = $file->getClientOriginalName();
        $file->move(public_path('files'), $new_file);

    	$suratkeluar = new Suratkeluar();
	    //$surat->tgl_buat_surat = $request->tgl_buat_surat;
	    $suratkeluar->pengirim = $request->pengirim;
	    $suratkeluar->no_surat = $request->no_surat;
	    $suratkeluar->perihal = $request->perihal;
	    $suratkeluar->lampiran = $new_file;
	    $suratkeluar->id_jenis = $request->id_jenis;
	    $suratkeluar->ditujukan = $request->ditujukan;

	    $response['success'] = true;

        if ($suratkeluar && $suratkeluar->save()) {
            $response['message'] = 'Berhasil Di Simpan';
            $response['data'] = $suratkeluar;
        }else{
            $response['success'] = false;
            $response['message'] = 'Gagal Tersimpan';
            $response['data'] = '';
        }
        return response()->json($response);
    }

    public function edit($id){
    	$data = Suratkeluar::find($id);
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

    public function update(Request $request,$id){
    	$suratkeluar = Suratkeluar::find($id);
    	// dd($surat);
    	$file = $request->file('lampiran');
    	if ($file != null) {
	        $new_file = $file->getClientOriginalName();
	        $file->move(public_path('files'), $new_file);
	        $suratkeluar->lampiran = $new_file;  
	    }
        //$surat->tgl_buat_surat = $request->tgl_buat_surat;
	    $suratkeluar->pengirim = $request->pengirim;
	    $suratkeluar->no_surat = $request->no_surat;
	    $suratkeluar->perihal = $request->perihal;
	    $suratkeluar->id_jenis = $request->id_jenis;
	    $suratkeluar->ditujukan = $request->ditujukan;

	    $response['success'] = true;

        if ($suratkeluar && $suratkeluar->save()) {
            $response['message'] = 'Berhasil Di update';
            $response['data'] = $suratkeluar;
        }else{
            $response['success'] = false;
            $response['message'] = 'Gagal Terupdate';
            $response['data'] = '';
        }

        return response()->json($response);
    }

    public function delete($id){
        $data = Suratkeluar::where('id',$id)->first();

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

    public function download($id,$lampiran){
        $data = Suratkeluar::find($id);
        $path = public_path('files/'.$lampiran);
        return response()->download($path);
    }

    public function show($id){
        $data = Suratkeluar::where('id',$id)->first();
        Suratkeluar::where('id',$id)->update([
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
    	$data = Suratkeluar::all();
        return response()->json($data);
    }
}