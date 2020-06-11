<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['namespace' => 'Api'],function(){

	Route::get('/home','HomeController@index');
	Route::post('/home/create','HomeController@create');

	Route::post('user/login','UserController@login');
	Route::post('user/register','UserController@register');

	Route::get('/jenis-arsip/index','JenisArsipController@index');
	Route::post('/jenis-arsip/create','JenisArsipController@create');
	Route::get('/jenis-arsip/delete/{id}','JenisArsipController@delete');
	Route::post('/jenis-arsip/update/{id}','JenisArsipController@update');
	Route::get('/jenis-arsip/edit/{id}','JenisArsipController@edit');

	Route::get('/surat-masuk/index','SuratMasukController@index');
	Route::post('/surat-masuk/create','SuratMasukController@create');
	Route::get('/surat-masuk/delete/{id}','SuratMasukController@delete');
	Route::post('/surat-masuk/update/{id}','SuratMasukController@update');
	Route::get('/surat-masuk/edit/{id}','SuratMasukController@edit');
	Route::get('/surat-masuk/download/{id}/{lampiran}','SuratMasukController@download');
	Route::get('/surat-masuk/show/{id}','SuratMasukController@show');
	Route::get('/surat-masuk/laporan','SuratMasukController@laporan');

	Route::get('/surat-keluar/index','SuratKeluarController@index');
	Route::get('/surat-keluar/autocode/save','SuratKeluarController@autocode');
	Route::post('/surat-keluar/create','SuratKeluarController@create');
	Route::get('/surat-keluar/edit/{id}','SuratKeluarController@edit');
	Route::post('/surat-keluar/update/{id}','SuratKeluarController@update');
	Route::get('/surat-keluar/delete/{id}','SuratKeluarController@delete');
	Route::get('/surat-keluar/download/{id}/{lampiran}','SuratKeluarController@download');
	Route::get('/surat-keluar/show/{id}','SuratKeluarController@show');
	Route::get('surat-keluar/laporan','SuratKeluarController@laporan');

});

