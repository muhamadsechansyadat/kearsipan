<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Suratkeluar;

class SuratkeluarController extends Controller
{
    public function datasuratkeluar(){
        $data=DB::select('SELECT * FROM `suratkeluars`');
        return view('suratkeluar.datasuratkeluar',['data'=>$data]);
    }

    public function autocode(){
    	// 421.5/0000/SMK WIKRAMA/bulan/tahun
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
    	//dd($no_surat);
    	return view('suratkeluar.simpansuratkeluar',[
     		'no_surat' => $no_surat
    	]);
    }

    public function simpan(Request $request){
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

	    //dd($suratkeluar);
        if (Auth::user()->level == '2') {
            
            if($suratkeluar->save()){
                return redirect('surat-keluar/autocode/simpan')->withMessage('Data Berhasil Tersimpan');
            }

        }elseif(Auth::user()->level == '1'){
            Suratkeluar::where('id',0)->update([
                'status'=> $suratkeluar->status = 1,
            ]);

            if($suratkeluar->save()){
                return redirect('surat-keluar/autocode/simpan')->withMessage('Data Berhasil Tersimpan');
            }
        }	
    }

    public function edit($id){
        $data = Suratkeluar::where('id',$id)->first();
        return view('suratkeluar.editsuratkeluar', compact('data'));
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

        //dd($suratkeluar);
	    $suratkeluar->save();
	    //dd($suratkeluar);

        return redirect()->route('suratkeluar.index')->withMessage('Data Berhasil Terupdate!');
    }

    public function hapus($id){
        $data = Suratkeluar::where('id',$id)->first();
        $data->delete();
        return back()->withMessage('Data Berhasil Terhapus');
    }

    public function download($lampiran){
        $path = public_path('files/'.$lampiran);
        return response()->download($path);
    }

    public function show1($id){
        //$status = Suratmasuk::where('id',$id)->first();
        $data = Suratkeluar::where('id',$id)->first();
        Suratkeluar::where('id',$id)->update([
            'status'=> $data->status = 1,
        ]);
        return view('suratkeluar.showsuratkeluar', compact('data'));
    }

    public function show2($id){
        $data = Suratkeluar::where('id',$id)->first();
        return view('suratkeluar.showsuratkeluar', compact('data'));
    }

    public function laporan(){
        $data = Suratkeluar::all();
        return view('laporan.laporansuratkeluar', compact('data'));
    }
}
