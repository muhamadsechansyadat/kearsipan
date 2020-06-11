<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use App\Suratmasuk;
use Auth;
use DB;
use File;

class SuratmasukController extends Controller
{
	public function view(){
    	return view('suratmasuk.buatsurat');
    }

    public function datasuratmasuk(){
        $data=DB::select('SELECT * FROM `suratmasuks`');
        return view('suratmasuk.suratmasuk',['data'=>$data]);
    }

    public function simpan(Request $request){
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

    	if (Auth::user()->level == '2') {
            
            if($surat->save()){
                return back()->withMessage('Data Berhasil Tersimpan');
            }

        }elseif(Auth::user()->level == '1'){
            Suratmasuk::where('id',0)->update([
                'status'=> $surat->status = 1,
            ]);

            if($surat->save()){
                return back()->withMessage('Data Berhasil Tersimpan');
            }
        }
    }

    public function edit($id){
        $data = Suratmasuk::where('id',$id)->first();
        return view('suratmasuk.editsurat', compact('data'));
    }

    public function update(Request $request,$id){
    	// dd($request->all());
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

	    $surat->save();

        return redirect()->route('suratmasuk.index')->withMessage('Data Berhasil Terupdate!');
    }
    public function hapus($id){
        $data = Suratmasuk::where('id',$id)->first();
        $data->delete();
        return back()->withMessage('Data Berhasil Terhapus');
    }

    public function download($lampiran){
        $path = public_path('files/'.$lampiran);
        return response()->download($path);
    }

    public function show1($id){
        //$status = Suratmasuk::where('id',$id)->first();
        $data = Suratmasuk::where('id',$id)->first();
        Suratmasuk::where('id',$id)->update([
            'status'=> $data->status = 1,
        ]);
        return view('suratmasuk.showsurat', compact('data'));
    }

    public function show2($id){
        $data = Suratmasuk::where('id',$id)->first();
        return view('suratmasuk.showsurat', compact('data'));
    }

    public function laporan(){
        $data = Suratmasuk::all();
        return view('laporan.laporansuratmasuk', compact('data'));
    }

    public function belumterbaca(){
        $data1 = Suratmasuk::whereRaw("status = 0")->get();
        return view('layouts.template', compact('data1'));
        //dd($data);
    }
}
