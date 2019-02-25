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
    	$id_katalog = $request['IDKatalog'];
        $jenis_sampel = $request['JenisSampel'];
    	$bentuk_sampel = $request['BentukSampel'];
    	$kemasan = $request['Kemasan'];
    	$jumlah = $request['Jumlah'];

    	Keranjang::create([
    		'IDPelanggan' => $pelanggan,
    		'JenisSampel' => $jenis_sampel,
    		'BentukSampel' => $bentuk_sampel,
    		'Kemasan' => $kemasan,
    		'Jumlah' => $jumlah,
            'IDKatalog' => $id_katalog
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
    	$keranjangs = Keranjang::where('StatusKeranjang', 1)->where('IDPelanggan', $id_pelanggan)->get();

        foreach($keranjangs as $keranjang){
            $katalog = Katalog::select('JenisAnalisis', 'Metode', 'HargaIPB', 'HargaNONIPB')->where('IDKatalog', $keranjang->IDKatalog)->first();
            $keranjang->setAttribute('JenisAnalisis', $katalog->JenisAnalisis);
            $keranjang->setAttribute('Metode', $katalog->Metode);
            $keranjang->setAttribute('HargaIPB', $katalog->HargaIPB);
            $keranjang->setAttribute('HargaNONIPB', $katalog->HargaNONIPB);
        }

    	return response()->json([
    		'success'=>true,
            'message'=>'Item di keranjang berhasil diambil',
            'keranjang'=>$keranjang,
            'Status' => 200
    		], 200);
    }
}
