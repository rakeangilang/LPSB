<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Katalog;
use App\Kategori;

class KatalogController extends Controller
{
    // ambil daftar katalog
    public function getAllKatalog()
    {
    	$katalogs = Katalog::all();
    	
    	//foreach($katalogs as $katalog){
    	//	$IDKatalogs[] = $katalog->IDKatalog;
    	//	$JenisAnalisiss[] = $katalog->JenisAnalisis;
    	//	$HargaIPBs[] = $katalog->HargaIPB;
    	//	$HargaNONIPBs[] = $katalog->HargaNONIPB;
    	//	$Metodes[] = $katalog->Metode;
    	//	$Keterangans[] = $katalog->Keterangan;
    	//	$ListBentukSamples[] = $katalog->ListBentukSample;
    	//	$Statuss[] = $katalog->status;
    	//	$DitambahkanPadas[] = $katalog->DitambahkanPada;
    	//	$DiupdatePadas[] = $katalog->DiupdatePada;
    	//}

    	foreach($katalogs as $katalog){
            $BentukSample = $katalog->BentukSample;
    	}


    	return response()->json([
    		'success'=>true,
            'message'=>'Semua kategori berhasil diambil',
    		'katalogs'=>$katalogs
    		]);

    	//return response()->json([
    	//	'success'=>true,
    	//	'message'=>"API berhasil diambil",
    	//	'IDKatalogs'=>$IDKatalogs,
    	//	'JenisAnalisiss'=>$JenisAnalisiss,
    	//	'HargaIPBs=>'=>$HargaIPBs,
    	//	'HargaNONIPBs'=>$HargaNONIPBs,
    	//	'Metodes'=>$Metodes,
    	//	'Keterangans'=>$Keterangans,
    	//	'ListBentukSamples'=>$ListBentukSamples,
    	//	'Statuss'=>$Statuss,
    	//	'DitambahkanPadas'=>$DitambahkanPadas,
    	//	'DiupdatePadas'=>$DiupdatePadas
    	//	]);
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
            $BentukSample = $katalog->BentukSample;
        }
        
        return response()->json([
            'success'=>true,
            'message'=>'Katalog sesuai kategori berhasil diambil',
            'katalogs'=>$katalogs
            ]);
    }
}
