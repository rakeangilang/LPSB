<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pesanan;
use App\DokumenPesanan;
use App\AdministrasiPesanan;
use App\Pelacakan;
use App\User;
use App\Sampel;
use App\Katalog;
use App\Pemberitahuan;
use Carbon\Carbon;

class PesananController extends Controller
{
    //
    public function getPesanan(Request $request, User $user)
    {
    	try{
    		$id_pelanggan = $request->user()->IDPelanggan;
    		$pesananss = Pesanan::select('IDPesanan', 'TotalHarga', 'Ulasan')->where('IDPelanggan', $id_pelanggan)->get();
    		$pesanans = $pesananss;

    	foreach($pesanans as $pesanan)
    	{
    		// get data and pre condition
    		$status_pesanan = Pelacakan::select('IDStatus', 'UpdateTerakhir')->where('IDPesanan', $pesanan->IDPesanan)->first();
    		if($pesanan->Ulasan == NULL){ $status_ulasan = 0; }
    		else { $status_ulasan = 1; }
    		
    		$pesanan->setAttribute('StatusUtama', $status_pesanan->IDStatus);
    		$pesanan->setAttribute('HargaTotal', $pesanan->TotalHarga);
    		$pesanan->setAttribute('WaktuStatusTerbaru', $status_pesanan->UpdateTerakhir->toDateTimeString());

    		// set status
    		$status_dokumen = DokumenPesanan::select('BuktiPembayaran', 'BuktiPengiriman')->where('IDPesanan', $pesanan->IDPesanan)->first();
    		if($status_dokumen->BuktiPembayaran == NULL){ $status_pembayaran = 0; }
    		else { $status_pembayaran = 1; }
    		if($status_dokumen->BuktiPengiriman == NULL){ $status_pengiriman = 0; }
    		else { $status_pengiriman = 1; }
    		$pesanan->setAttribute('status_pembayaran', $status_pembayaran);
    		$pesanan->setAttribute('status_pengiriman', $status_pengiriman);
    		$pesanan->setAttribute('status_ulasan', $status_ulasan);

    		// sampel
    		$sampels = Sampel::select('IDKatalog', 'IDSampel', 'JenisSampel', 'BentukSampel', 'Kemasan', 'Jumlah', 'JenisAnalisis', 'HargaSampel')->where('IDPesanan', $pesanan->IDPesanan)->get();

    		foreach($sampels as $sampel)
    		{
    			$foto_katalog = Katalog::select('FotoKatalog')->where('IDKatalog', $sampel->IDKatalog)->first();
    			$sampel->setAttribute('Foto', $foto_katalog->FotoKatalog);
    			unset($sampel->IDKatalog);
    		}

    		$pesanan->setAttribute('Sampel', $sampels);
    	}

        $sorted = $pesanans->sortByDesc('WaktuStatusTerbaru');
        $pesanans = $sorted->values()->all();

    	return response()->json(['success'=>true, 'AllPesanan'=>$pesanans, 'Status'=>200], 200);
        }
        catch(\Exception $e){
            return response()->json(['success'=>false, 'message'=>$e->getMessage(),'Status'=>500], 500);
        }
    	
    }

    public function beriUlasan(User $user, Request $request)
    {
        try{
            $id_pelanggan = $request->user()->IDPelanggan;
            $id_pesanan = $request->IDPesanan;
            $ulasan = $request->Ulasan;

            Pesanan::where('IDPesanan', $id_pesanan)->where('IDPelanggan', $id_pelanggan)->update([
                'Ulasan' => $ulasan
                ]);
            $waktu_sekarang = Carbon::now()->toDateTimeString();

            Pelacakan::where('IDPesanan', $id_pesanan)->update([
                'WaktuUlasan' => $waktu_sekarang
                ]);

            return response()->json(['success'=>true, 'message'=>'Ulasan berhasil disimpan', 'Status'=>200], 200);
        }
        catch(\Exception $e) {
            return response()->json(['success'=>false, 'message'=>$e->getMessage(),'Status'=>500], 500);
        }
    }

    public function getUlasan(User $user, Request $request)
    {
        try{
            $id_pelanggan = $request->user()->IDPelanggan;
            $id_pesanan = $request->IDPesanan;

            $ulasan = Pesanan::select('Ulasan')->where('IDPesanan', $id_pesanan)->where('IDPelanggan', $id_pelanggan)->first();

            return response()->json(['success'=>true, 'Ulasan'=>$ulasan->Ulasan, 'Status'=>200], 200);
        }
        catch(\Exception $e) {
            return response()->json(['success'=>false, 'message'=>$e->getMessage(),'Status'=>500], 500);
        }
    }

    public function detailPesanan(User $user, Request $request)
    {
        try{
            $id_pelanggan = $request->user()->IDPelanggan;
            $id_pesanan = $request->IDPesanan;
            $pesanan = Pesanan::where('IDPesanan', $id_pesanan)->where('IDPelanggan', $id_pelanggan)->first();
            $id_pesanan = $pesanan->IDPesanan;

            $total_harga = $pesanan->TotalHarga;
            $data_user = AdministrasiPesanan::select('NamaLengkap', 'Institusi', 'Alamat', 'NoHP', 'Email', 'NoNPWP')
                                            ->where('IDPesanan', $id_pesanan)->first();

            $status_pesanan = $this->getStatus($id_pesanan, $id_pelanggan);

            $sampels = Sampel::select('IDKatalog', 'JenisSampel', 'BentukSampel', 'Kemasan', 'Jumlah', 'JenisAnalisis', 'Metode', 'HargaSampel')
                            ->where('IDPesanan', $id_pesanan)->get();

            foreach ($sampels as $sampel) {
                $foto_katalog = Katalog::select('FotoKatalog')->where('IDKatalog', $sampel->IDKatalog)->first();
                $sampel->setAttribute('Foto', $foto_katalog->FotoKatalog);
            }

            $bulan = Carbon::parse($pesanan->WaktuPemesanan)->format('m');
            $tahun = Carbon::parse($pesanan->WaktuPemesanan)->format('y');            
            $no_pesanan = $pesanan->NoPesanan . '/' . $bulan . '/' . $tahun;

            return response()->json([
                'message'=>'Berhasil mengambil detail pesanan', 
                'data_user'=>$data_user,
                'status_pesanan'=>$status_pesanan,
                'HargaTotal'=>$total_harga,
                'listSampel'=>$sampels,
                'NoPesanan'=>$no_pesanan, 
                'Status'=>200], 200);
        }
        catch(\Exception $e) {
            return response()->json(['success'=>false, 'message'=>$e->getMessage(),'Status'=>500], 500);
        }
    }

    private function getStatus($id_pesanan, $id_pelanggan)
    {
        try
        {
            // get status
            $waktu_pesanan_dibuat = Pesanan::select('WaktuPemesanan')->where('IDPesanan', $id_pesanan)->first()->WaktuPemesanan;
            $waktu_pesanan_dibuat = $waktu_pesanan_dibuat->toDateTimeString();
            $status_utama = Pelacakan::select('IDStatus')->where('IDPesanan', $id_pesanan)->first()->IDStatus;
            $waktu_status_utama = Pelacakan::select('UpdateTerakhir')->where('IDPesanan', $id_pesanan)->first()->UpdateTerakhir;
            $waktu_status_utama = $waktu_status_utama->toDateTimeString();
            $status_pembayaran = Pelacakan::select('Pembayaran')->where('IDPesanan', $id_pesanan)->first()->Pembayaran;
            $status_kirim_sampel = Pelacakan::select('KirimSampel')->where('IDPesanan', $id_pesanan)->first()->KirimSampel;
            $status_sisa_sampel = Pelacakan::select('SisaSampel')->where('IDPesanan', $id_pesanan)->first()->SisaSampel;
            $status_kirim_sertifikat = Pelacakan::select('KirimSertifikat')->where('IDPesanan', $id_pesanan)->first()->KirimSertifikat;

            // get waktu status by kondisi
            // pembayaran
            $waktu_pembayaran = NULL;
            $waktu_kirim_sampel = NULL;
            $waktu_sisa_sampel = NULL;
            $waktu_kirim_sertifikat = NULL;
            if($status_pembayaran==2){
                $waktu_pembayaran = Pelacakan::select('WaktuPembayaran')->where('IDPesanan', $id_pesanan)->first()->WaktuPembayaran;
                $waktu_pembayaran = $waktu_pembayaran->toDateTimeString();
            }
            elseif ($status_pembayaran==3) {
                $waktu_pembayaran = Pemberitahuan::select('WaktuPemberitahuan')
                                    ->where('IDPesanan', $id_pesanan)
                                    ->where('IDStatus', 21)
                                    ->first()->WaktuPemberitahuan;
                $waktu_pembayaran = $waktu_pembayaran->toDateTimeString();
            }
            // kirim sampel
            if($status_kirim_sampel==2){
                $waktu_kirim_sampel = Pelacakan::select('WaktuKirimSampel')->where('IDPesanan', $id_pesanan)->first()->KirimSampel;
                $waktu_kirim_sampel = $waktu_kirim_sampel->toDateTimeString();
            }
            elseif ($status_kirim_sampel==3) {
                $waktu_kirim_sampel = Pemberitahuan::select('WaktuPemberitahuan')
                                    ->where('IDPesanan', $id_pesanan)
                                    ->where('IDStatus', 22)
                                    ->first()->WaktuPemberitahuan;
                $waktu_kirim_sampel = $waktu_kirim_sampel->toDateTimeString();
            }
            // sisa sampel
            if($status_sisa_sampel==3){
                $waktu_sisa_sampel = Pelacakan::select('WaktuTerimaSisa')->where('IDPesanan', $id_pesanan)->first()->WaktuTerimaSisa;
                $waktu_sisa_sampel = $waktu_sisa_sampel->toDateTimeString();
            }
            elseif ($status_sisa_sampel==2) {
                $waktu_sisa_sampel = Pemberitahuan::select('WaktuPemberitahuan')
                                    ->where('IDPesanan', $id_pesanan)
                                    ->where('IDStatus', 51)
                                    ->first()->WaktuPemberitahuan;
                $waktu_sisa_sampel = $waktu_sisa_sampel->toDateTimeString();
            }
            // kirim sertifikat
            if($status_kirim_sertifikat==3){
                $waktu_kirim_sertifikat = Pelacakan::select('WaktuTerimaSertifikat')->where('IDPesanan', $id_pesanan)->first()->WaktuTerimaSertifikat;
                $waktu_kirim_sertifikat = $waktu_kirim_sertifikat->toDateTimeString();
            }
            elseif ($status_kirim_sertifikat==2) {
                $waktu_kirim_sertifikat = Pemberitahuan::select('WaktuPemberitahuan')
                                    ->where('IDPesanan', $id_pesanan)
                                    ->where('IDStatus', 52)
                                    ->first()->WaktuPemberitahuan;
                $waktu_kirim_sertifikat = $waktu_kirim_sertifikat->toDateTimeString();
            }
            // pesanan divalidasi stat = 2
            if(Pemberitahuan::where('IDPesanan', $id_pesanan)->where('IDStatus', 2)->exists())
            {
                $validasi_pesanan = Pemberitahuan::select('WaktuPemberitahuan')->where('IDPesanan', $id_pesanan)
                                    ->where('IDStatus', 2)->first();
                $waktu_validasi_pesanan = $validasi_pesanan->WaktuPemberitahuan;
            }
            else $waktu_validasi_pesanan = NULL;
            
            // dikaji ulang stat = 3
            if(Pemberitahuan::where('IDPesanan', $id_pesanan)->where('IDStatus', 3)->exists())
            {
                $kaji_ulang = Pemberitahuan::select('WaktuPemberitahuan')->where('IDPesanan', $id_pesanan)
                                    ->where('IDStatus', 3)->first();
                $waktu_dikaji_ulang = $kaji_ulang->WaktuPemberitahuan;
            }
            else $waktu_dikaji_ulang = NULL;
            // dianalisis stat = 4
            if(Pemberitahuan::where('IDPesanan', $id_pesanan)->where('IDStatus', 4)->exists())
            {
                $dianalisis = Pemberitahuan::select('WaktuPemberitahuan')->where('IDPesanan', $id_pesanan)
                                    ->where('IDStatus', 4)->first();
                $waktu_dianalisis = $dianalisis->WaktuPemberitahuan;
            }
            else $waktu_dianalisis = NULL;
            // selesai stat = 5
            if(Pemberitahuan::where('IDPesanan', $id_pesanan)->where('IDStatus', 5)->exists())
            {
                $selesai = Pemberitahuan::select('WaktuPemberitahuan')->where('IDPesanan', $id_pesanan)
                                    ->where('IDStatus', 5)->first();
                $waktu_selesai = $selesai->WaktuPemberitahuan;
            }
            else $waktu_selesai = NULL;
            // dibatalkan stat = 6 / 7
            $stat6 = Pemberitahuan::where('IDPesanan', $id_pesanan)->where('IDStatus', 6)->exists();
            $stat7 = Pemberitahuan::where('IDPesanan', $id_pesanan)->where('IDStatus', 7)->exists();
            if($stat6 || $stat7)
            {
                if($stat6) $idstat=6;
                elseif ($stat7) $idstat=7;
                $dibatalkan = Pemberitahuan::select('WaktuPemberitahuan')->where('IDPesanan', $id_pesanan)
                                    ->where('IDStatus', $idstat)->first();
                $waktu_dibatalkan = $dibatalkan->WaktuPemberitahuan;
            }
            else $waktu_dibatalkan = NULL;

            $ulasan = Pelacakan::select('WaktuUlasan')->where('IDPesanan', $id_pesanan)->first();
            $waktu_ulasan = $ulasan->WaktuUlasan;


            $status_pesanan = array('WaktuValidasiPesanan'=>$waktu_validasi_pesanan, 'WaktuDikajiUlang'=>$waktu_dikaji_ulang,
                'WaktuDianalisis'=>$waktu_dianalisis, 'WaktuSelesai'=>$waktu_selesai, 'WaktuDibatalkan'=>$waktu_dibatalkan, 'WaktuUlasan'=>$waktu_ulasan, 'WaktuPesananDibuat'=>$waktu_pesanan_dibuat, 'StatusUtama'=>$status_utama, 'WaktuStatusUtama'=>$waktu_status_utama, 
                'StatusPembayaran'=>$status_pembayaran, 'WaktuPembayaran'=>$waktu_pembayaran, 
                'StatusKirimSampel'=>$status_kirim_sampel, 'WaktuKirimSampel'=>$waktu_kirim_sampel,
                'StatusSisaSampel'=>$status_sisa_sampel, 'WaktuTerimaSisa'=>$waktu_sisa_sampel,
                'StatusKirimSertifikat'=>$status_kirim_sertifikat, 'WaktuTerimaSertifikat'=>$waktu_kirim_sertifikat);

            return $status_pesanan;
        }
        catch(\Exception $e){
            return response()->json(['success'=>false, 'message'=>$e->getMessage(),'Status'=>500], 500);
        }
    }
}