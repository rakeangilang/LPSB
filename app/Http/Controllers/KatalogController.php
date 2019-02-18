<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Katalog;
use App\Kategori;
use App\BentukSampel;

class KatalogController extends Controller
{
    // ambil daftar katalog
    public function getAllKatalog()
    {
    	$katalogs = Katalog::all();

    	return response()->json([
    		'success'=>true,
            'message'=>'Semua kategori berhasil diambil',
    		'katalogs'=>$katalogs
    		]);
    }

    public function getKatalogByID($id_katalog)
    {
        $katalog = Katalog::find($id_katalog);
        $id_katalog = $katalog->IDKatalog;
        $id_kategori = $katalog->IDKategori;
        $jenis_analisis = $katalog->JenisAnalisis;
        $harga_ipb = $katalog->HargaIPB;
        $harga_nonipb = $katalog->HargaNONIPB;
        $metode = $katalog->Metode;
        $keterangan = $katalog->Keterangan;
        $status_aktif = $katalog->StatusAktif;
        $foto_katalog = $katalog->FotoKatalog;

        $kategori = Kategori::where('IDKategori', $id_kategori)->first();
        $kategori = $kategori->Kategori;
        $bentuk = BentukSampel::where('IDKatalog', $id_katalog)->first();
        $ekstrak = $bentuk->Ekstrak;
        $simplisia = $bentuk->Simplisia;
        $cairan = $bentuk->Cairan;
        $serbuk = $bentuk->Serbuk;


        return response()->json([
            'success'=>true,
            'message'=>'Semua kategori berhasil diambil',
            'IDKatalog'=>$id_katalog,
            'IDKategori'=>$id_kategori,
            'Kategori'=>$kategori,
            'JenisAnalisis'=>$jenis_analisis,
            'HargaIPB'=>$harga_ipb,
            'HargaNONIPB'=>$harga_nonipb,
            'Metode'=>$metode,
            'Keterangan'=>$keterangan,
            'StatusAktif'=>$status_aktif,
            'FotoKatalog'=>$foto_katalog,
            'Ekstrak'=>$ekstrak,
            'Simplisia'=>$simplisia,
            'Cairan'=>$cairan,
            'Serbuk'=>$serbuk,
            ]);
    }

    public function getAllKategori()
    {
        $kategoris = Kategori::all();

        return response()->json([
            'success'=>true,
            'message'=>'Semua kategori berhasil diambil',
            'kategoris'=>$kategoris
            ]);
    }

    public function getKatalogByKategori($id_kategori)
    {
        $katalogs = Katalog::where('IDKategori', $id_kategori)->get();

        foreach($katalogs as $katalog){
            $BentukSampel = $katalog->BentukSampel;
        }
        
        return response()->json([
            'success'=>true,
            'message'=>'Katalog sesuai kategori berhasil diambil',
            'katalogs'=>$katalogs
            ]);
    }

    public function getBentukHargaByKatalog($id_katalog)
    {
        $bentuk = BentukSampel::where('IDKatalog', $id_katalog)->first();
        $harga = Katalog::where('IDKatalog', $id_katalog)->first();
        $harga_ipb = $harga->HargaIPB;
        $harga_nonipb = $harga->HargaNONIPB;
        $id_katalog = $bentuk->IDKatalog;
        $ekstrak = $bentuk->Ekstrak;
        $simplisia = $bentuk->Simplisia;
        $cairan = $bentuk->Cairan;
        $serbuk = $bentuk->Serbuk;

        return response()->json([
            'success'=>true,
            'message'=>'Bentuk Sampel berdasarkan katalog berhasil diambil',
            'id_katalog'=>$id_katalog,
            'Ekstrak'=>$ekstrak,
            'Simplisia'=>$simplisia,
            'Cairan'=>$cairan,
            'Serbuk'=>$serbuk,
            'HargaIPB'=>$harga_ipb,
            'HargaNONIPB'=>$harga_nonipb
            ]);
    }

    
}
