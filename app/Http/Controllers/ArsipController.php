<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Suratmasuk;
use DB;
use App\Suratkeluar;

class ArsipController extends Controller
{
    public function index(){
    	$dataumum=Suratmasuk::whereRaw("id_jenis = 1")->count();
    	$datakedinasan=Suratmasuk::whereRaw("id_jenis = 2")->count();
    	$datakunjungan=Suratmasuk::whereRaw("id_jenis = 3")->count();
    	$datapramuka=Suratmasuk::whereRaw("id_jenis = 4")->count();
    	$datalingkungan=Suratmasuk::whereRaw("id_jenis = 5")->count();
        $suratkeluarumum=Suratkeluar::whereRaw("id_jenis = 6")->count();
        $surattugas=Suratkeluar::whereRaw("id_jenis = 7")->count();
        $suratkeputusan=Suratkeluar::whereRaw("id_jenis = 8")->count();
    	$datasemua=Suratmasuk::all()->count();
    	return view('arsip.dashboard',compact('dataumum','datakedinasan','datakunjungan','datapramuka','datalingkungan','datasemua','databelumterbaca','suratkeluarumum','surattugas','suratkeputusan'));
    }

    public function bacasemua(){
        $data=DB::update('UPDATE suratmasuks SET status = 1 WHERE status = 0;');
        $data1=DB::update('UPDATE suratkeluars SET status = 1 WHERE status = 0;');
        return back();
    }

    public function bell(){
        $databelumterbaca=Suratmasuk::whereRaw("status = 0")->count();
        //dd($databelumterbaca);
        return view('layouts.template',compact($databelumterbaca));
    }
}
