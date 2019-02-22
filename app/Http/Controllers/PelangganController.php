<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PelangganController extends Controller
{
    //
    public function getInfoRekening(User $user, Request $request)
    {
    	$pelanggan = $request->user();
    	$nama_rekening = $pelanggan->NamaRekening;
    	$nama_bank = $pelanggan->NamaBank;
    	$no_rekening = $pelanggan->NoRekening;

    	return response()->json([
    		'success'=>true,
            'message'=>'Informasi rekening berhasil diambil',
    		'NamaRekening' => $nama_rekening,
    		'NamaBank' => $nama_bank,
    		'NoRekening' => $no_rekening
    		]);
    }
}
