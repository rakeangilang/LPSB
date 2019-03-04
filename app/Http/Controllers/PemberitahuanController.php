<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Pesanan;
use App\Pelacakan;

class PemberitahuanController extends Controller
{
    //
    public function setStatus(User $user, Request $request)
    {
    	$id_pelanggan = $request->user()->IDPelanggan;
    	$id_pesanan = Pesanan::select('IDPesanan')->where('IDPelanggan', $id_pelanggan)->where('IDPesanan', $request->IDPesanan)->first();
    	$id_pesanan = $id_pesanan->IDPesanan;
    	$set_status = $request->SetStatus;
    	Pelacakan::where('IDPesanan', $id_pesanan)->update(['IDStatus' => $set_status]);

    	$pelanggan = $request->user()->first();

//    	return response()->json(['new status'=>$set_status]);
    	return redirect()->route('newPemberitahuan', array('pel'=>$pelanggan, 'req'=>$request));
    }

    public function newPemberitahuan($pel, $req)
    {
    	return response()->json(['pel'=>$pel, 'req'=>$req]);
    }
}
