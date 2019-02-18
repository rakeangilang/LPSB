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

// Katalog
Route::get('/getAllKatalog', 'KatalogController@getAllKatalog');
Route::get('/getAllKategori', 'KatalogController@getAllKategori');
Route::get('/getKatalogByKategori/{id_kategori}', 'KatalogController@getKatalogByKategori');
Route::get('/getBentukHargaSampel/{id_katalog}', 'KatalogController@getBentukHargaByKatalog');
Route::get('/getKatalog/{id_katalog}', 'KatalogController@getKatalogByID');