<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keranjang;
use App\User;
use App\Katalog;
use App\Pesanan;

class KeranjangController extends Controller
{
    //
    public function tambahItem(User $user, Request $request)
    {
        try{
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
        catch(\Exception $e){
            return response()->json(['success'=>false, 'message'=>$e->getMessage(),'Status'=>500], 500);
        }
    }

    public function getKeranjang(User $user, Request $request)
    {
        try{
        $id_pelanggan = $request->user()->IDPelanggan;
        $keranjangs = Keranjang::where('IDPelanggan', $id_pelanggan)->get();

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
            'keranjang'=>$keranjangs,
            'Status' => 200
            ], 200);            
        }
        catch(\Exception $e){
            return response()->json(['success'=>false, 'message'=>$e->getMessage(),'Status'=>500], 500);
        }
    }

    public function hapusItem(User $user, Request $request)
    {
        try{
            $id_item = $request->IDItem;
        $id_user = $request->user()->IDPelanggan;
        $hapus = Keranjang::where('IDItem', $id_item)->where('IDPelanggan', $id_user)->delete();

        return response()->json([
            'success'=>true,
            'message'=>'Item berhasil dihapus dari keranjang',
            'Status' => 200
            ], 200);
        }
        catch(\Exception $e){
            return response()->json(['success'=>false, 'message'=>$e->getMessage(),'Status'=>500], 500);
        }
    }

    //public function pesanItem(User $user, Request $request)
    //{
     //   $id_user = $request->user()->IDPelanggan;
      //  Pesanan::create([
       //     'IDPelanggan' => $id_user,
         //   'NoPesanan' => 
           // ]);
        //foreach($request as $req)
        //{
         //   $pesan = Keranjang::where('IDPelanggan', $id_user)->where('IDItem', $req->IDItem)->get();

//        }
        //$something = Keranjang::where('IDItem', )
  //  }
}
