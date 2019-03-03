<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pesanan;
use App\DokumenPesanan;
use App\Pelacakan;
use App\User;
use App\Sampel;
use App\Katalog;

class PesananController extends Controller
{
    //
    public function getPesanan(Request $request, User $user)
    {
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
    		$sampels = Sampel::select('IDKatalog', 'JenisSampel', 'BentukSampel', 'Kemasan', 'Jumlah', 'JenisAnalisis')->where('IDPesanan', $pesanan->IDPesanan)->get();

    		foreach($sampels as $sampel)
    		{
    			$foto_katalog = Katalog::select('FotoKatalog')->where('IDKatalog', $sampel->IDKatalog)->first();
    			$sampel->setAttribute('Foto', $foto_katalog->FotoKatalog);
    			unset($sampel->IDKatalog);
    		}

    		$pesanan->setAttribute('Sampel', $sampels);
    		$pesanan->setAttribute('x', gettype($pesanan));
    		unset($pesanan->Ulasan);
    		unset($pesanan->TotalHarga);
    	}

    	return response()->json(['AllPesanan'=>$pesanans, 'a'=>gettype($pesanans)]);
    }
}
