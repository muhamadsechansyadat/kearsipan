<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return redirect()->route('login');
});
Auth::routes();

Route::get('/access/denied',['as' => 'access.denied', 'uses'=>'HomeController@accessdenied']);

// Route::group(['middleware'=>'auth'], function () {
// 	Route::get('permissions-all-users',['middleware'=>'check-permission:user','uses'=>'HomeController@allUsers']);
// 	Route::get('permissions-all-admin',['middleware'=>'check-permission:admin','uses'=>'HomeController@allAdmin']);
// 	// Route::get('permissions-superadmin',['middleware'=>'check-permission:superadmin','uses'=>'HomeController@superadmin']);
// });
// ===================================Arsip==================================================
Route::group(['prefix'=>'arsip'],function(){
	Route::get('/','ArsipController@index');
	Route::get('/index','ArsipController@index');
	Route::get('/laporansemua','ArsipController@laporansemua');
});

Route::get('arsip/update/semua','ArsipController@bacasemua')->middleware('admin');
// ===================================Arsip==================================================

// ==================================Jenis Surat=============================================
Route::group(['prefix'=>'jenis-arsip','middleware' => 'admin'],function(){
	Route::get('/view/create','JenisarsipController@view');
	Route::post('/simpan','JenisarsipController@simpan');
	Route::get('/index','JenisarsipController@datajenisarsip')->name('jenisarsip.index');
	Route::get('/edit/{id}','JenisarsipController@edit');
	Route::put('/update/{id}','JenisarsipController@update');
	Route::get('/hapus/{id}','JenisarsipController@hapus');
});
// ===============================================================================================

// ==================================Surat Masuk=================================================

Route::group(['prefix'=>'surat-masuk'],function(){
	Route::get('/index','SuratmasukController@datasuratmasuk')->name('suratmasuk.index');
	Route::get('/view/create','SuratmasukController@view');
	Route::post('/simpan','SuratmasukController@simpan');
	Route::get('/edit/{id}','SuratmasukController@edit');
	Route::put('/update/{id}','SuratmasukController@update');
	Route::get('/hapus/{id}','SuratmasukController@hapus');
	Route::get('/download/{lampiran}','SuratmasukController@download');
	Route::get('show2/{id}','SuratmasukController@show2');
	Route::get('/belumterbaca','SuratmasukController@belumterbaca');
});

Route::get('surat-masuk/laporan','SuratmasukController@laporan')->middleware('admin');
Route::get('surat-masuk/show1/{id}','SuratmasukController@show1')->middleware('admin');

// ==================================Surat Masuk=================================================

// ==================================Surat Keluar================================================
Route::group(['prefix'=>'surat-keluar'],function(){
	Route::get('/index','SuratkeluarController@datasuratkeluar')->name('suratkeluar.index');
	Route::get('/view','SuratkeluarController@view');
	Route::get('/autocode/simpan','SuratkeluarController@autocode');
	Route::post('/simpan','SuratkeluarController@simpan');
	Route::get('/edit/{id}','SuratkeluarController@edit');
	Route::put('/update/{id}','SuratkeluarController@update');
	Route::get('/hapus/{id}','SuratkeluarController@hapus');
	Route::get('/download/{lampiran}','SuratkeluarController@download');
	Route::get('/show2/{id}','SuratkeluarController@show2');
});

Route::get('surat-keluar/laporan','SuratkeluarController@laporan')->middleware('admin');
Route::get('surat-keluar/show1/{id}','SuratkeluarController@show1')->middleware('admin');

// ===================================Surat Keluar===============================================