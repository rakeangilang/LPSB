<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Pesanan;
use App\Pelacakan;
use App\Pemberitahuan;
use Carbon\Carbon;

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

    	//return response()->json(['new status'=>$set_status, 'pel'=>$pelanggan]);
    	return redirect()->route('newPemberitahuan', ['pes'=>$id_pesanan,'stat'=>$set_status]);
    }

    public function newPemberitahuan($pes, $stat)
    {
        // if status cocok, buat pemberitahuan, kalo nggak gausah
        $waktu = Carbon::now()->toDateTimeString();
        $pemberitahuan = Pemberitahuan::create([
            'IDPesanan'=>$pes,
            'IDStatus'=>$stat,
            'WaktuPemberitahuan'=>$waktu
            ]);
    	return response()->json(['pes'=>$pes, 'stat'=>$stat]);
    }

    public function getPemberitahuan(User $user, Request $request)
    {
        $id_pelanggan = $request->user()->IDPelanggan;
        $pemberitahuans = Pemberitahuan::where('IDPelanggan', $id_pelanggan)->orderBy('WaktuPemberitahuan', 'desc')->get();

        return response()->json(['Pemberitahuans'=>$pemberitahuans]);
    }
}
