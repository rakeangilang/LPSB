<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keranjang;
use App\User;
use App\Katalog;

class KeranjangController extends Controller
{
    //
    public function tambahItem(User $user, Request $request)
    {
    	$pelanggan = $request->user()->IDPelanggan;
    	$jenis_sampel = $request['JenisSampel'];
    	$bentuk_sampel = $request['BentukSampel'];
    	$kemasan = $request['Kemasan'];
    	$jumlah = $request['Jumlah'];
    	$jenis_metode_analisis = $request['JenisMetodeAnalisis'];
    	$harga_sampel = $request['HargaSampel'];

    	Keranjang::create([
    		'IDPelanggan' => $pelanggan,
    		'JenisSampel' => $jenis_sampel,
    		'BentukSampel' => $bentuk_sampel,
    		'Kemasan' => $kemasan,
    		'Jumlah' => $jumlah,
    		'JenisMetodeAnalisis' => $jenis_metode_analisis,
    		'HargaSampel' => $harga_sampel
    		]);

    	return response()->json([
    		'success'=>true,
            'message'=>'Item berhasil ditambahkan ke keranjang',
            'Status' => 201
    		], 201);
    }

    public function getKeranjang(User $user, Request $request)
    {
    	$id_pelanggan = $request->user()->IDPelanggan;
    	$keranjang = Keranjang::where('StatusKeranjang', 1)->where('IDPelanggan', $id_pelanggan)->get();

    	return response()->json([
    		'success'=>true,
            'message'=>'Item di keranjang berhasil diambil',
            'keranjang'=>$keranjang,
            'Status' => 200
    		], 200);
    }
}
