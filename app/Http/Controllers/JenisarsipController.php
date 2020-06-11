<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jenisarsip;
use DB;

class JenisarsipController extends Controller
{

    public function view(){
    	return view('jenisarsip.simpanjenis');
    }

    public function simpan(Request $request){
    	$request->validate([
    		'jenis_surat'=> 'required|string']);
    	Jenisarsip::create([
    		'jenis_surat' => $request->jenis_surat]);
    	return back()->withMessage('Data Berhasil Tersimpan');
    }

    public function datajenisarsip(){
        $data=DB::select('SELECT * FROM `jenisarsips`');
        return view('jenisarsip.jenisarsip',['data'=>$data]);
    }

    public function edit($id){
        $data = Jenisarsip::where('id',$id)->first();
        return view('jenisarsip.edit', compact('data'));
    }
    public function update(Request $request,$id){
        Jenisarsip::where('id',$id)->update([
            'jenis_surat' => $request->jenis_surat
        ]);
        return redirect()->route('jenisarsip.index')->withMessage('Data Berhasil Terupdate!');
    }

    public function hapus($id){
        $data = Jenisarsip::where('id',$id)->first();
        $data->delete();
        return back()->withMessage('Data Berhasil Terhapus');
    }
}
