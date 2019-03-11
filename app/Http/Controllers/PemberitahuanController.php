<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Pesanan;
use App\Pelacakan;
use App\Pemberitahuan;
use App\StatusPelacakan;
use App\AdministrasiPesanan;
use Carbon\Carbon;

class PemberitahuanController extends Controller
{
    //
    public function setStatusByAdmin(User $user, Request $request)
    {
        try{
            $waktu_sekarang = Carbon::now('Asia/Jakarta')->toDateTimeString();
            $id_pelanggan = $request->user()->IDPelanggan;
            $id_pesanan = Pesanan::select('IDPesanan')->where('IDPelanggan', $id_pelanggan)->where('IDPesanan', $request->IDPesanan)->first();
            $id_pesanan = $id_pesanan->IDPesanan;
            $set_status = $request->SetStatus;
            Pelacakan::where('IDPesanan', $id_pesanan)->update(['IDStatus' => $set_status, 'UpdateTerakhir' => $waktu_sekarang]);
            
            if($set_status == 7){
                AdministrasiPesanan::where('IDPesanan', $id_pesanan)->update(['CatatanPembatalan'=>$request->Alasan]);
                Pelacakan::where('IDPesanan', $id_pesanan)->update(['WaktuBatal' => $waktu_sekarang]);
            }

            //return response()->json(['new status'=>$set_status, 'pel'=>$pelanggan]);
            return redirect()->route('newPemberitahuan', ['pes'=>$id_pesanan,'stat'=>$set_status, 'pel'=>$id_pelanggan]);
        }
        catch(\Exception $e) {
            return response()->json(['success'=>false, 'message'=>$e->getMessage(),'Status'=>500], 500);
        }
    	
    }

    public function newPemberitahuan($pes, $stat, $pel)
    {
        try{
            // if status cocok, buat pemberitahuan, kalo nggak gausah
        $waktu = Carbon::now('Asia/Jakarta')->toDateTimeString();

        $pemberitahuan = Pemberitahuan::create([
            'IDPesanan'=>$pes,
            'IDStatus'=>$stat,
            'WaktuPemberitahuan'=>$waktu,
            'IDPelanggan'=>$pel
            ]);
        
        if($stat == 7){
            $alasan = AdministrasiPesanan::select('CatatanPembatalan')->where('IDPesanan', $pes)->first()->CatatanPembatalan;

            return response()->json(['IDPesanan'=>$pes, 'IDStatus'=>$stat, 'WaktuPembatalan'=>$waktu, 'Alasan'=>$alasan]);
        }

    	return response()->json(['IDPesanan'=>$pes, 'IDStatus'=>$stat, 'WaktuPemberitahuan'=>$waktu, ]);
        }
        catch(\Exception $e) {
            return response()->json(['success'=>false, 'message'=>$e->getMessage(),'Status'=>500], 500);
        }
    }

    public function getPemberitahuan(User $user, Request $request)
    {
        try{
        $id_pelanggan = $request->user()->IDPelanggan;
        $pemberitahuans = Pemberitahuan::where('IDPelanggan', $id_pelanggan)->orderBy('WaktuPemberitahuan', 'desc')->get();

        foreach ($pemberitahuans as $pemberitahuan)
        {
            $nama_status = StatusPelacakan::select('Status')->where('IDStatus', $pemberitahuan->IDStatus)->first();
            $pemberitahuan->setAttribute('NamaStatus', $nama_status->Status);
        }

        return response()->json(['Pemberitahuans'=>$pemberitahuans]);
        }
        catch(\Exception $e) {
            return response()->json(['success'=>false, 'message'=>$e->getMessage(),'Status'=>500], 500);
        }
    }

    public function readPemberitahuan(User $user, Request $request)
    {
        try{
            $id_pelanggan = $request->user()->IDPelanggan;
        $id_pemberitahuan = $request->IDPemberitahuan;

        Pemberitahuan::where('IDPemberitahuan', $id_pemberitahuan)->where('IDPelanggan', $id_pelanggan)
                    ->update(['Dilihat' => 1 ]);

        return response()->json(['message'=>'Pemberitahuan telah dibaca', 'Status'=>200], 200);
        }
        catch(\Exception $e) {
            return response()->json(['success'=>false, 'message'=>$e->getMessage(),'Status'=>500], 500);
        }
    }
}
