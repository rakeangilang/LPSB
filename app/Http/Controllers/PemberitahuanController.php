<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Pesanan;
use App\Pelacakan;
use App\Pemberitahuan;
use App\StatusPelacakan;
use App\AdministrasiPesanan;
use App\DokumenPesanan;
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

            if($set_status!=21 && $set_status!=22 && $set_status!=51 && $set_status!=52){
                Pelacakan::where('IDPesanan', $id_pesanan)->update(['IDStatus' => $set_status, 'UpdateTerakhir' => $waktu_sekarang]);
            }
            
            // jika kode batal
            if($set_status == 7){
                AdministrasiPesanan::where('IDPesanan', $id_pesanan)->update(['CatatanPembatalan'=>$request->Alasan]);
            }
            elseif($set_status == 21){
                AdministrasiPesanan::where('IDPesanan', $id_pesanan)->update(['VerifikasiPembayaran'=>1]);
            }
            elseif ($set_status == 22) {
                AdministrasiPesanan::where('IDPesanan', $id_pesanan)->update([
                    'PenerimaSampel'=>$request->PenerimaSampel,
                    'Jabatan'=>$request->Jabatan
                    ]);
            }
            // jika kode sisa sampel dikirim
            elseif($set_status == 51){
                DokumenPesanan::where('IDPesanan', $id_pesanan)->update(['BuktiPengembalianSampel'=>$request->Resi]);
                Pelacakan::where('IDPesanan', $id_pesanan)->update(['SisaSampel'=>2]);
            }
            // jika kode sertifikat dikirim
            elseif($set_status == 52){
                DokumenPesanan::where('IDPesanan', $id_pesanan)->update(['BuktiPengirimanSertifikat'=>$request->Resi]);
                Pelacakan::where('IDPesanan', $id_pesanan)->update(['KirimSertifikat'=>2]);   
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
        
        // jika kode batal
        if($stat == 7){
            $alasan = AdministrasiPesanan::select('CatatanPembatalan')->where('IDPesanan', $pes)->first()->CatatanPembatalan;

            return response()->json(['IDPesanan'=>$pes, 'IDStatus'=>$stat, 'Alasan'=>$alasan, 'WaktuPemberitahuan'=>$waktu]);
        }
        // jika kode sisa sampel dikirim
        elseif($stat == 51){
            $resi = DokumenPesanan::select('BuktiPengembalianSampel')->where('IDPesanan', $pes)->first()->BuktiPengembalianSampel;

            return response()->json(['IDPesanan'=>$pes, 'IDStatus'=>$stat, 'Resi'=>$resi, 'WaktuPemberitahuan'=>$waktu]);
        }
         // jika kode sertifikat dikirim
        elseif($stat == 52){
            $resi = DokumenPesanan::select('BuktiPengirimanSertifikat')->where('IDPesanan', $pes)->first()->BuktiPengirimanSertifikat;

            return response()->json(['IDPesanan'=>$pes, 'IDStatus'=>$stat, 'Resi'=>$resi, 'WaktuPemberitahuan'=>$waktu]);
        }

    	return response()->json(['IDPesanan'=>$pes, 'IDStatus'=>$stat, 'WaktuPemberitahuan'=>$waktu]);
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
            // fetch no pesanan/bulan/tahun
            $id_pesanan = $pemberitahuan->IDPesanan;
            $pesanan = Pesanan::select('NoPesanan', 'WaktuPemesanan')->where('IDPesanan', $id_pesanan)->first();
            $bulan = Carbon::parse($pesanan->WaktuPemesanan)->format('m');
            $tahun = Carbon::parse($pesanan->WaktuPemesanan)->format('y');
            $no_pesanan = $pesanan->NoPesanan . '/' . $bulan . '/' . $tahun;

            $nama_status = StatusPelacakan::select('Status')->where('IDStatus', $pemberitahuan->IDStatus)->first();
            $pemberitahuan->setAttribute('NamaStatus', $nama_status->Status);
            $pemberitahuan->setAttribute('NoPesanan', $no_pesanan);
        }

        return response()->json(['Pemberitahuans'=>$pemberitahuans, 'Status'=>200], 200);
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
