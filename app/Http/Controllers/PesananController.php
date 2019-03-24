<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Pesanan;
use App\DokumenPesanan;
use App\AdministrasiPesanan;
use App\Pelacakan;
use App\User;
use App\Sampel;
use App\Katalog;
use App\Pemberitahuan;
use App\Survey;
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
    		$status_pesanan = Pelacakan::select('Pembayaran', 'KirimSampel', 'IDStatus', 'UpdateTerakhir', 'WaktuPembayaran', 'WaktuKirimSampel', 'WaktuUlasan')->where('IDPesanan', $pesanan->IDPesanan)->first();
            $waktu_ulasan = $status_pesanan->WaktuUlasan;
    		
    		$pesanan->setAttribute('StatusUtama', $status_pesanan->IDStatus);
    		$pesanan->setAttribute('HargaTotal', $pesanan->TotalHarga);
    		$pesanan->setAttribute('WaktuStatusTerbaru', $status_pesanan->UpdateTerakhir->toDateTimeString());

    		// set status
            $status_pembayaran = $status_pesanan->Pembayaran;
            if($status_pembayaran == 3) {
                $waktu_pembayaran = Pemberitahuan::select('WaktuPemberitahuan')->where('IDPesanan', $pesanan->IDPesanan)
                            ->where('IDStatus', 21)->first();
                $waktu_pembayaran = $waktu_pembayaran->WaktuPemberitahuan;
            }
            else $waktu_pembayaran = null;

            $status_pengiriman = $status_pesanan->KirimSampel;
            if($status_pengiriman == 3) {
                $waktu_pengiriman = Pemberitahuan::select('WaktuPemberitahuan')->where('IDPesanan', $pesanan->IDPesanan)
                            ->where('IDStatus', 22)->first();
                $waktu_pengiriman = $waktu_pengiriman->WaktuPemberitahuan;
            }
            else $waktu_pengiriman = null;

    		$pesanan->setAttribute('status_pembayaran', $status_pembayaran);
            $pesanan->setAttribute('waktu_pembayaran', $waktu_pembayaran);
    		$pesanan->setAttribute('status_pengiriman', $status_pengiriman);
            $pesanan->setAttribute('waktu_pengiriman', $waktu_pengiriman);
    		$pesanan->setAttribute('waktu_ulasan', $waktu_ulasan);

    		// sampel
    		$sampels = Sampel::select('IDKatalog', 'IDSampel', 'JenisSampel', 'BentukSampel', 'Kemasan', 'Jumlah', 'JenisAnalisis', 'HargaSampel')->where('IDPesanan', $pesanan->IDPesanan)->get();

    		foreach($sampels as $sampel)
    		{
    			$foto_katalog = Katalog::select('FotoKatalog')->where('IDKatalog', $sampel->IDKatalog)->first();
    			$sampel->setAttribute('Foto', $foto_katalog->FotoKatalog);
    			unset($sampel->IDKatalog);
    		}

    		$pesanan->setAttribute('Sampel', $sampels);
            unset($pesanan->Ulasan);
    	}

        $sorted = $pesanans->sortByDesc('WaktuStatusTerbaru');
        $pesanans = $sorted->values()->all();

    	return response()->json(['success'=>true, 'AllPesanan'=>$pesanans, 'Status'=>200], 200);
        }
        catch(\Exception $e){
            return response()->json(['success'=>false, 'message'=>$e->getMessage(),'Status'=>500], 200);
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
            $waktu_sekarang = Carbon::now('Asia/Jakarta')->toDateTimeString();

            Pelacakan::where('IDPesanan', $id_pesanan)->update([
                'WaktuUlasan' => $waktu_sekarang
                ]);

            return response()->json(['success'=>true, 'message'=>'Ulasan berhasil disimpan', 'Status'=>200], 200);
        }
        catch(\Exception $e) {
            return response()->json(['success'=>false, 'message'=>$e->getMessage(),'Status'=>500], 200);
        }
    }

    public function getUlasan(User $user, Request $request)
    {
        try{
            $id_pelanggan = $request->user()->IDPelanggan;
            $id_pesanan = $request->IDPesanan;

            $ulasan = Pesanan::select('Ulasan')->where('IDPesanan', $id_pesanan)->where('IDPelanggan', $id_pelanggan)->first()->Ulasan;
            $waktu_ulasan = Pelacakan::select('WaktuUlasan')->where('IDPesanan', $id_pesanan)->first()->WaktuUlasan;

            return response()->json(['success'=>true, 'Ulasan'=>$ulasan, 'WaktuUlasan'=>$waktu_ulasan, 'Status'=>200], 200);
        }
        catch(\Exception $e) {
            return response()->json(['success'=>false, 'message'=>$e->getMessage(),'Status'=>500], 200);
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
            $data_user = AdministrasiPesanan::select('NamaLengkap', 'Institusi', 'Alamat', 'NoHP', 'Email', 'NoNPWP', 'KeteranganPesanan')
                                            ->where('IDPesanan', $id_pesanan)->first();

            $status_pesanan = $this->getStatus($id_pesanan, $id_pelanggan);
            $keterangan = $data_user->KeteranganPesanan;
            $percepatan = $pesanan->Percepatan;
            $kembalikan_sampel = $pesanan->KembalikanSampel;

            $sampels = Sampel::select('IDKatalog', 'JenisSampel', 'BentukSampel', 'Kemasan', 'Jumlah', 'JenisAnalisis', 'Metode', 'HargaSampel')
                            ->where('IDPesanan', $id_pesanan)->get();

            foreach ($sampels as $sampel) {
                $foto_katalog = Katalog::select('FotoKatalog')->where('IDKatalog', $sampel->IDKatalog)->first();
                $sampel->setAttribute('Foto', $foto_katalog->FotoKatalog);
            }

            $bulan = Carbon::parse($pesanan->WaktuPemesanan)->format('m');
            $tahun = Carbon::parse($pesanan->WaktuPemesanan)->format('y');            
            $no_pesanan = $pesanan->NoPesanan . '/' . $bulan . '/' . $tahun;

            unset($data_user->KeteranganPesanan);

            return response()->json([
                'message'=>'Berhasil mengambil detail pesanan', 
                'data_user'=>$data_user,
                'status_pesanan'=>$status_pesanan,
                'HargaTotal'=>$total_harga,
                'Keterangan'=>$keterangan,
                'Percepatan'=>$percepatan,
                'KembalikanSampel'=>$kembalikan_sampel,
                'listSampel'=>$sampels,
                'NoPesanan'=>$no_pesanan, 
                'Status'=>200], 200);
        }
        catch(\Exception $e) {
            return response()->json(['success'=>false, 'message'=>$e->getMessage(),'Status'=>500], 200);
        }
    }

    public function kirimSampel(User $user, Request $request)
    {
        try{
            $id_pelanggan = $request->user()->IDPelanggan;
            $id_pesanan = $request->IDPesanan;
            $id_pesanan = Pesanan::select('IDPesanan')->where('IDPelanggan', $id_pelanggan)
                                ->where('IDPesanan', $id_pesanan)->first();
            $id_pesanan = $id_pesanan->IDPesanan;
            $resi = $request->Resi;

            DokumenPesanan::where('IDPesanan', $id_pesanan)->update(['BuktiPengiriman'=>$resi]);
            $waktu_sekarang = Carbon::now('Asia/Jakarta')->toDateTimeString();
            Pelacakan::where('IDPesanan', $id_pesanan)->update([
                'KirimSampel'=>2, 
                'WaktuKirimSampel'=>$waktu_sekarang
                ]);
            // kirim sendiri = '-KirimSendiri'
            return response()->json(['NoResi'=>$resi,'Status'=>200], 200);
        }
        catch(\Exception $e){
            return response()->json(['success'=>false, 'message'=>$e->getMessage(),'Status'=>500], 200);
        }
    }

    public function bayar(User $user, Request $request)
    {
        try
        {
            $id_pelanggan = $request->user()->IDPelanggan;
            $id_pesanan = $request->IDPesanan;
            $id_pesanan = Pesanan::select('IDPesanan')->where('IDPelanggan', $id_pelanggan)
                                ->where('IDPesanan', $id_pesanan)->first();
            $id_pesanan = $id_pesanan->IDPesanan;
            $data_rek = $request->data_rek;
            $bayar = $request->BuktiBayar;
            $nama_rekening = $data_rek['NamaRekening'];
            $nama_bank = $data_rek['NamaBank'];
            $no_rekening = $data_rek['NoRekening'];

            // {"IDPesanan": 3, "BuktiBayar": "lul", "data_rek":{"NamaRekening":"h4h4", "NamaBank": "BI", NoRekening: 223}}
            DokumenPesanan::where('IDPesanan', $id_pesanan)->update(['BuktiPembayaran'=>$bayar]);
            $waktu_sekarang = Carbon::now('Asia/Jakarta')->toDateTimeString();
            Pelacakan::where('IDPesanan', $id_pesanan)->update([
                'Pembayaran'=>2, 
                'WaktuPembayaran'=>$waktu_sekarang
                ]);

            AdministrasiPesanan::where('IDPesanan', $id_pesanan)->update([
                'NamaRekening'=>$nama_rekening,
                'NamaBank'=>$nama_bank,
                'NoRekening'=>$no_rekening
                ]);

            return response()->json([
                'message'=>'Bukti pembayaran berhasil diunggah',
                'NamaRekening'=>$nama_rekening,
                'NamaBank'=>$nama_bank,
                'NoRekening'=>$no_rekening,
                'Status'=>200], 200);
        }
        catch(\Exception $e){
            return response()->json(['success'=>false, 'message'=>$e->getMessage(),'Status'=>500], 200);
        }
    }

    public function getGambar()
    {
        //$img = Storage::get('public/Day1Recap.PNG');
        $path = public_path('images/Day1Recap.PNG');

        $fileData = file_get_contents($path);
        $encode = base64_encode($fileData);
        //$file = File::get(public_path('images/Day1Recap.PNG'));

        $decode = base64_decode($encode);

        //return response()->file($path);
       // return $img;//response()->json(['img'=>$img]);
        return response($decode)->header('Content-Type', 'image');
    }

    public function ubahStatusByPelanggan(User $user, Request $request)
    {
        try{
            $id_pelanggan = $request->user()->IDPelanggan;
            $id_pesanan = $request->IDPesanan;
            $id_pesanan = Pesanan::select('IDPesanan')->where('IDPesanan', $id_pesanan)->where('IDPelanggan', $id_pelanggan)
                                ->first();
            $id_pesanan = $id_pesanan->IDPesanan;
            $ubah_status = $request->UbahStatus;

            $waktu_sekarang = Carbon::now('Asia/Jakarta')->toDateTimeString();

            // batal
            if($ubah_status == 'Batal'){
                Pelacakan::where('IDPesanan', $id_pesanan)->update(['IDStatus'=>6]);
                $alasan = $request->Alasan;
                AdministrasiPesanan::where('IDPesanan', $id_pesanan)->update(['CatatanPembatalan'=>$alasan]);

                $waktu = Carbon::now('Asia/Jakarta')->toDateTimeString();

                $pemberitahuan = Pemberitahuan::create([
                'IDPesanan'=>$id_pesanan,
                'IDStatus'=>6,
                'WaktuPemberitahuan'=>$waktu_sekarang,
                'IDPelanggan'=>$id_pelanggan
                ]);

                return response()->json(['Status pembatalan'=>6, 'Status'=>200], 200);
            }
    
            // terima sisa sampel
            elseif($ubah_status == 'SisaSampel'){
                Pelacakan::where('IDPesanan', $id_pesanan)->update(['SisaSampel'=>3, 'WaktuTerimaSisa'=>$waktu_sekarang]);

                return response()->json(['Status sisa sampel'=>3, 'Status'=>200], 200);
            }

            // terima sertifikat
            elseif($ubah_status == 'TerimaSertifikat'){
                Pelacakan::where('IDPesanan', $id_pesanan)->update(['KirimSertifikat'=>3, 'WaktuTerimaSertif'=>$waktu_sekarang]);

                return response()->json(['Status sertifikat'=>3, 'Status'=>200], 200);
            }

            // minta kirim sertifikat
            elseif($ubah_status == 'MintaSertifikat'){
                Pelacakan::where('IDPesanan', $id_pesanan)->update(['KirimSertifikat'=>1]);

                return response()->json(['Status sertifikat'=>1, 'Status'=>200], 200);
            }
        }
        catch(\Exception $e) {
            return response()->json(['success'=>false, 'message'=>$e->getMessage(),'Status'=>500], 200);
        }
        
    }

    public function getResi(User $user, Request $request)
    {
        try{
            $id_pelanggan = $request->user()->IDPelanggan;
            $id_pesanan = Pesanan::select('IDPesanan')->where('IDPelanggan', $id_pelanggan)
                                ->where('IDPesanan', $request->IDPesanan)->first()->IDPesanan;
            $resi = DokumenPesanan::select('BuktiPengiriman')->where('IDPesanan', $id_pesanan)->first()->BuktiPengiriman;
    
            return response()->json(['IDPesanan'=>$id_pesanan, 'Resi'=>$resi, 'Status'=>200], 200);
        }
        catch(\Exception $e) {
            return response()->json(['success'=>false, 'message'=>$e->getMessage(),'Status'=>500], 200);
        }
        
    }

    public function simpanSurvey(User $user, Request $request)
    {
        try
        {
            $id_pelanggan = $request->user()->IDPelanggan;
            $id_pesanan = Pesanan::select('IDPesanan')->where('IDPelanggan', $id_pelanggan)
                                ->where('IDPesanan', $request->IDPesanan)->first()->IDPesanan;
            
            Survey::create([
                'IDPesanan' => $id_pesanan,
                'Survey1' => $request->survey1,
                'Survey2' => $request->survey2,
                'Survey3' => $request->survey3,
                'Survey4' => $request->survey4,
                'Survey5' => $request->survey5,
                'Survey6' => $request->survey6,
                'Survey7' => $request->survey7,
                'Survey8' => $request->survey8,
                'Survey9' => $request->survey9
            ]);

            return response()->json([
                'message' => 'Penilaian berhasil disimpan',
                'IDPesanan' => $id_pesanan,
                'survey1' => $request->survey1,
                'survey2' => $request->survey2,
                'survey3' => $request->survey3,
                'survey4' => $request->survey4,
                'survey5' => $request->survey5,
                'survey6' => $request->survey6,
                'survey7' => $request->survey7,
                'survey8' => $request->survey8,
                'survey9' => $request->survey9,
                'Status' => 200
            ], 200);
        }
        catch(\Exception $e){
            return response()->json(['success'=>false, 'message'=>$e->getMessage(),'Status'=>500], 200);
        }
    }

    public function gantiResi(User $user, Request $request)
    {
        try{
            return response()->json(['IDPesanan'=>$id_pesanan, 'Resi'=>$resi, 'Status'=>200], 200);
        }
        catch(\Exception $e) {
            return response()->json(['success'=>false, 'message'=>$e->getMessage(),'Status'=>500], 200);
        }
    }



    private function getStatus($id_pesanan, $id_pelanggan)
    {
        try
        {
            // get status
            $waktu_pesanan_dibuat = Pesanan::select('WaktuPemesanan')->where('IDPesanan', $id_pesanan)->first()->WaktuPemesanan;
            $waktu_pesanan_dibuat = $waktu_pesanan_dibuat->toDateTimeString();
            $status_pembayaran = Pelacakan::select('Pembayaran')->where('IDPesanan', $id_pesanan)->first()->Pembayaran;
            $status_kirim_sampel = Pelacakan::select('KirimSampel')->where('IDPesanan', $id_pesanan)->first()->KirimSampel;
            $status_sisa_sampel = Pelacakan::select('SisaSampel')->where('IDPesanan', $id_pesanan)->first()->SisaSampel;
            $status_kirim_sertifikat = Pelacakan::select('KirimSertifikat')->where('IDPesanan', $id_pesanan)->first()->KirimSertifikat;
            $status_utama = Pelacakan::select('IDStatus')->where('IDPesanan', $id_pesanan)->first()->IDStatus;

            // get waktu status by kondisi
            // pembayaran stat 2 = bukti bayar uploaded, 3 = pembayaran di verifikasi
            $waktu_pembayaran = NULL;
            if ($status_pembayaran==3) {
                $waktu_pembayaran = Pemberitahuan::select('WaktuPemberitahuan')
                                    ->where('IDPesanan', $id_pesanan)
                                    ->where('IDStatus', 21)
                                    ->first()->WaktuPemberitahuan;
                $waktu_pembayaran = $waktu_pembayaran->toDateTimeString();
            }
            else $waktu_pembayaran = null;
            // kirim sampel stat 2 = bukti kirim sampel uploaded, 3 = pesanan diterima dan divalidasi

            // sisa sampel stat 3 = sisa sampel diterima, 2 = sisa sampel dikirim RESI!!!!!!!!!!
            if(Pemberitahuan::where('IDPesanan', $id_pesanan)->where('IDStatus', 51)->exists())
            {
                $resi_sisa_sampel = DokumenPesanan::select('BuktiPengembalianSampel')->where('IDPesanan', $id_pesanan)
                                    ->first()->BuktiPengembalianSampel;
            }
            else $resi_sisa_sampel = null;
            // kirim sertifikat 3 = sertifikat diterima, 2 = sertifikat dikirim
            if(Pemberitahuan::where('IDPesanan', $id_pesanan)->where('IDStatus', 52)->exists())
            {
                $resi_sertif = DokumenPesanan::select('BuktiPengirimanSertifikat')->where('IDPesanan', $id_pesanan)
                                    ->first()->BuktiPengirimanSertifikat;
            }
            else $resi_sertif = null;
            // pesanan divalidasi idstat = 2
            if(Pemberitahuan::where('IDPesanan', $id_pesanan)->where('IDStatus', 2)->exists())
            {
                $validasi_pesanan = Pemberitahuan::select('WaktuPemberitahuan')->where('IDPesanan', $id_pesanan)
                                    ->where('IDStatus', 2)->first();
                $waktu_validasi_pesanan = $validasi_pesanan->WaktuPemberitahuan;
            }
            else $waktu_validasi_pesanan = NULL;
            
            // dikaji ulang idstat = 3
            if(Pemberitahuan::where('IDPesanan', $id_pesanan)->where('IDStatus', 3)->exists())
            {
                $kaji_ulang = Pemberitahuan::select('WaktuPemberitahuan')->where('IDPesanan', $id_pesanan)
                                    ->where('IDStatus', 3)->first();
                $waktu_dikaji_ulang = $kaji_ulang->WaktuPemberitahuan;
            }
            else $waktu_dikaji_ulang = NULL;
            // dianalisis idstat = 4
            if(Pemberitahuan::where('IDPesanan', $id_pesanan)->where('IDStatus', 4)->exists())
            {
                $dianalisis = Pemberitahuan::select('WaktuPemberitahuan')->where('IDPesanan', $id_pesanan)
                                    ->where('IDStatus', 4)->first();
                $waktu_dianalisis = $dianalisis->WaktuPemberitahuan;
            }
            else $waktu_dianalisis = NULL;
            // selesai idstat = 5
            if(Pemberitahuan::where('IDPesanan', $id_pesanan)->where('IDStatus', 5)->exists())
            {
                $selesai = Pemberitahuan::select('WaktuPemberitahuan')->where('IDPesanan', $id_pesanan)
                                    ->where('IDStatus', 5)->first();
                $waktu_selesai = $selesai->WaktuPemberitahuan;
            }
            else $waktu_selesai = NULL;

            // terima sisa sampel param = SisaSampel
            $sisa_sampel = Pelacakan::select('SisaSampel', 'WaktuTerimaSisa')->where('IDPesanan', $id_pesanan)
                                    ->first();
            if($sisa_sampel->SisaSampel == 3){
                $waktu_terima_sisa = $sisa_sampel->WaktuTerimaSisa;
            }
            else $waktu_terima_sisa = null;

            // terima sertifikat param = KirimSertifikat
            $kirim_sertifikat = Pelacakan::select('KirimSertifikat', 'WaktuTerimaSertif')->where('IDPesanan', $id_pesanan)
                                    ->first();
            if($kirim_sertifikat->KirimSertifikat == 3){
                $waktu_terima_sertif = $kirim_sertifikat->WaktuTerimaSertif;
            }
            else $waktu_terima_sertif = null;

            // dibatalkan idstat = 6 / 7
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

            // kondisi segementasi status pesanan
            $dianalisis = Pemberitahuan::where('IDPesanan', $id_pesanan)->where('IDStatus', 4)->exists();
            $selesai = Pemberitahuan::where('IDPesanan', $id_pesanan)->where('IDStatus', 5)->exists();
            $batal_pelanggan = Pemberitahuan::where('IDPesanan', $id_pesanan)->where('IDStatus', 6)->exists();
            $batal_admin = Pemberitahuan::where('IDPesanan', $id_pesanan)->where('IDStatus', 7)->exists();
            
            // segmen 3 = batal
            if($batal_pelanggan) {
                $status_pesanan = array('WaktuValidasiPesanan'=>$waktu_validasi_pesanan, 'WaktuDikajiUlang'=>$waktu_dikaji_ulang,
                'StatusUtama'=>$status_utama,
                'WaktuDibatalkan'=>$waktu_dibatalkan, 'WaktuPesananDibuat'=>$waktu_pesanan_dibuat,
                'StatusPembayaran'=>$status_pembayaran, 'WaktuPembayaran'=>$waktu_pembayaran, 
                'StatusKirimSampel'=>$status_kirim_sampel,
                'StatusSisaSampel'=>$status_sisa_sampel, 'StatusKirimSertifikat'=>$status_kirim_sertifikat);
            }
            // segmen 3 = batal
            elseif($batal_admin) {
                $alasan_batal = AdministrasiPesanan::select('CatatanPembatalan')->where('IDPesanan', $id_pesanan)
                                                ->first()->CatatanPembatalan;
                $status_pesanan = array('WaktuValidasiPesanan'=>$waktu_validasi_pesanan, 'WaktuDikajiUlang'=>$waktu_dikaji_ulang,
                'StatusUtama'=>$status_utama, 'AlasanBatal'=>$alasan_batal,
                'WaktuDibatalkan'=>$waktu_dibatalkan, 'WaktuPesananDibuat'=>$waktu_pesanan_dibuat,
                'StatusPembayaran'=>$status_pembayaran, 'WaktuPembayaran'=>$waktu_pembayaran, 
                'StatusKirimSampel'=>$status_kirim_sampel,
                'StatusSisaSampel'=>$status_sisa_sampel, 'StatusKirimSertifikat'=>$status_kirim_sertifikat);
            }

            // segmen 2 = selesai
            elseif($selesai) {
                $status_pesanan = array('WaktuValidasiPesanan'=>$waktu_validasi_pesanan, 'WaktuDikajiUlang'=>$waktu_dikaji_ulang,
                'StatusUtama'=>$status_utama, 'WaktuDianalisis'=>$waktu_dianalisis, 'WaktuSelesai'=>$waktu_selesai,
                'WaktuUlasan'=>$waktu_ulasan, 'WaktuPesananDibuat'=>$waktu_pesanan_dibuat, 'StatusPembayaran'=>$status_pembayaran,
                'WaktuPembayaran'=>$waktu_pembayaran, 'StatusKirimSampel'=>$status_kirim_sampel, 'WaktuTerimaSisa'=>$waktu_terima_sisa,
                'WaktuTerimaSertifikat'=>$waktu_terima_sertif, 'StatusSisaSampel'=>$status_sisa_sampel,
                'ResiPengirimanSisa'=>$resi_sisa_sampel, 'ResiPengirimanSertif'=>$resi_sertif,
                'StatusKirimSertifikat'=>$status_kirim_sertifikat);
            }
            // segmen 1 = dianalisis
            else {
                $status_pesanan = array('WaktuValidasiPesanan'=>$waktu_validasi_pesanan, 'WaktuDikajiUlang'=>$waktu_dikaji_ulang,
                'StatusUtama'=>$status_utama, 'WaktuDianalisis'=>$waktu_dianalisis, 'WaktuPesananDibuat'=>$waktu_pesanan_dibuat,
                'StatusPembayaran'=>$status_pembayaran, 'WaktuPembayaran'=>$waktu_pembayaran,
                'StatusKirimSampel'=>$status_kirim_sampel,
                'StatusSisaSampel'=>$status_sisa_sampel, 'StatusKirimSertifikat'=>$status_kirim_sertifikat);
            }
            // segmen 1 = belum dianalisis

            return $status_pesanan;
        }
        catch(\Exception $e){
            return response()->json(['success'=>false, 'message'=>$e->getMessage(),'Status'=>500], 200);
        }
    }
}