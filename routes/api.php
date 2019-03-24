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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Auth
Route::post('/register', 'ApiAuthController@register');
Route::post('/login', 'ApiAuthController@login');

// Katalog
Route::get('/getAllKatalog', 'KatalogController@getAllKatalog')->middleware('auth:api');
Route::get('/getAllKatalogUmum', 'KatalogController@getAllKatalogUmum')->middleware('auth:api');
Route::get('/getAllKategori', 'KatalogController@getAllKategori')->middleware('auth:api');
Route::get('/getKatalogByKategori/{id_kategori}', 'KatalogController@getKatalogByKategori')->middleware('auth:api');
Route::get('/getBentukHargaSampel/{id_katalog}', 'KatalogController@getBentukHargaByKatalog')->middleware('auth:api');
Route::get('/getKatalog/{id_katalog}', 'KatalogController@getKatalogByID')->middleware('auth:api');

// Keranjang
Route::post('/tambahItemKeranjang', 'KeranjangController@tambahItem')->middleware('auth:api');
Route::get('/getKeranjang', 'KeranjangController@getKeranjang')->middleware('auth:api')->name('getKeranjang');
Route::post('/hapusItem', 'KeranjangController@hapusItem')->middleware('auth:api');
Route::post('/pesanItem', 'KeranjangController@pesanItem')->middleware('auth:api');

// Pelanggan
Route::get('/getInfoRekening', 'PelangganController@getInfoRekening')->middleware('auth:api');
Route::get('/getProfil', 'PelangganController@getProfil')->middleware('auth:api');
Route::post('/simpanProfil', 'PelangganController@simpanProfil')->middleware('auth:api');
Route::post('/simpanRekening', 'PelangganController@simpanRekening')->middleware('auth:api');

// Pesanan
Route::get('/getPesanan', 'PesananController@getPesanan')->middleware('auth:api');
Route::post('/beriUlasan', 'PesananController@beriUlasan')->middleware('auth:api');
Route::post('/getUlasan', 'PesananController@getUlasan')->middleware('auth:api');
Route::post('/detailPesanan', 'PesananController@detailPesanan')->middleware('auth:api');
Route::post('/kirimSampel', 'PesananController@kirimSampel')->middleware('auth:api');
Route::post('/bayar', 'PesananController@bayar')->middleware('auth:api');
Route::post('/ubahStatusByPelanggan', 'PesananController@ubahStatusByPelanggan')->middleware('auth:api');
Route::post('/getResi', 'PesananController@getResi')->middleware('auth:api');
Route::post('/simpanSurvey', 'PesananController@simpanSurvey')->middleware('auth:api');

// Pemberitahuan
Route::post('/setStatusByAdmin', 'PemberitahuanController@setStatusByAdmin')->middleware('auth:api');
Route::get('/newPemberitahuan/{pes}/{stat}/{pel}', 'PemberitahuanController@newPemberitahuan')->middleware('auth:api')->name('newPemberitahuan');
Route::get('/getPemberitahuan', 'PemberitahuanController@getPemberitahuan')->middleware('auth:api');
Route::post('/readPemberitahuan', 'PemberitahuanController@readPemberitahuan')->middleware('auth:api');

//tes
Route::get('/getGambar', 'PesananController@getGambar');
Route::get('/generatePermohonanAnalisis', 'DocumentController@generateFormPermohonanAnalisis');