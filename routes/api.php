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
Route::get('/getAllKategori', 'KatalogController@getAllKategori')->middleware('auth:api');
Route::get('/getKatalogByKategori/{id_kategori}', 'KatalogController@getKatalogByKategori')->middleware('auth:api');
Route::get('/getBentukHargaSampel/{id_katalog}', 'KatalogController@getBentukHargaByKatalog')->middleware('auth:api');
Route::get('/getKatalog/{id_katalog}', 'KatalogController@getKatalogByID')->middleware('auth:api');

// Pelanggan
Route::get('/getInfoRekening', 'PelangganController@getInfoRekening')->middleware('auth:api');