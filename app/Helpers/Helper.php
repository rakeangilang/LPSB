<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Katalog;
use App\User;
use App\Keranjang;
use App\Pesanan;
use App\AdministrasiPesanan;
use App\DokumenPesanan;
use App\Pelacakan;
use App\Sampel;

class Helper
{
	public function newPesanan(Request $request, $id_pelanggan)
    {
        try
        {
        	// get nomor pesanan
        	$waktu_sekarang = Carbon::now('Asia/Jakarta');
        	$bulan = $waktu_sekarang->month;
        	$tahun = $waktu_sekarang->year;

        	$count = Pesanan::whereMonth('WaktuPemesanan', $bulan)
        					->whereYear('WaktuPemesanan', $tahun)
        					->count();

        	$no_pesanan = $count + 1;
        	// buat pesanan
        	$id_pesanan = Pesanan::create([
        		'NoPesanan' => $no_pesanan,
        		'IDPelanggan' => $id_pelanggan,
        		'Percepatan' => $request->lama_pengujian,
        		'KembalikanSampel' => $request->sisa_sampel,
        		'TotalHarga' => $request->harga_total,
        		'WaktuPemesanan' => $waktu_sekarang
        		])->IDPesanan;

        	return $id_pesanan;
        }
        catch(\Exception $e){
            return -1;
        }
    }

    public function newAdministrasiPesanan($data_user, $data_rek, $id_pesanan, $keterangan)
    {
        try
        {
         	// buat administrasi pesanan
        	$z = AdministrasiPesanan::create([
        		'IDPesanan' => $id_pesanan,
        		'NamaLengkap' => $data_user['Nama'],
        		'Institusi' => $data_user['Perusahaan'],
        		'Alamat' => $data_user['Alamat'],
        		'NoHP' => $data_user['NoHP'],
        		'Email' => $data_user['Email'],
        		'NoNPWP' => $data_user['NoNPWP'],
        		'NamaRekening' => $data_rek['NamaRekening'],
        		'NamaBank' => $data_rek['NamaBank'],
        		'NoRekening' => $data_rek['NoRekening'],
        		'KeteranganPesanan' => $keterangan
        		]);
        	//{"NamaLengkap": "Gilang", "Institusi": "IPB", "Alamat": "bogor", "NoHP": "999", "Email": "ganteng@banget.com", "NoNPWP": "9182938", "NamaRekening": "h3h3", "NamaBank": "jabar", "NoRekening": "231992"}

 //       	{"data_user": {"Nama": "Gilang", "Perusahaan": "IPB", "Alamat": "bogor", "NoHP": "999", "Email": "ganteng@banget.com", "NoNPWP": "9182938"}, "data_rek": {"NamaRekening": "h3h3", "NamaBank": "jabar", "NoRekening": "231992"}, "listKeranjang": [{"IDItem": 1, "JenisSampel": "Daun", "BentukSampel": "Ekstrak", "Kemasan": "Toples", "Jumlah": "5", "JenisAnalisis": "Fitokimia", "Metode": "Visualisasi warna", "Harga": 175000}], "lama_pengujian": 1, "sisa_sampel": 1, "harga_total": 8888, "keterangan": "haha"}

        	return 0;
        }
        catch(\Exception $e){
            return 500;
        }
    }

    public function newDokumenPesanan($id_pesanan)
    {
        try
        {
            $p = DokumenPesanan::create([
            	'IDPesanan' => $id_pesanan
            	]);

            return 0;
        }
        catch(\Exception $e){
            return 500;
        }
    }

    public function newPelacakan($id_pesanan)
    {
        try
        {
            Pelacakan::create([
            	'IDPesanan' => $id_pesanan
            	]);

            return 0;
        }
        catch(\Exception $e){
            return 500;
        }

        try{
            
        }
        catch(\Exception $e) {
            return response()->json(['success'=>false, 'message'=>$e->getMessage(),'Status'=>500], 500);
        }
    }

    public function addSampels($list_keranjang, $id_pesanan, $id_pelanggan)
    {
        try
        {
        	// create nomor sampel
        	$waktu_sekarang = Carbon::now('Asia/Jakarta');
        	$bulan = $waktu_sekarang->month;
        	$tahun = $waktu_sekarang->year;

        	if(Pesanan::where('IDPesanan', '!=', $id_pesanan)->whereMonth('WaktuPemesanan', $bulan)->whereYear('WaktuPemesanan', $tahun)->exists())
        	{
        		$pesanan_terakhir = Pesanan::select('IDPesanan')->whereMonth('WaktuPemesanan', $bulan)
        					->whereYear('WaktuPemesanan', $tahun)
        					->latest()
        					->first();

        		$count = Sampel::where('IDPesanan', $pesanan_terakhir)->max('NoSampel');
        	}
        	else {
        		$count = 0;
        	}

        	$no_sampel = $count + 1;      	

            // create new sampels
            // [{"IDItem": 1, "IDKatalog": 1, "JenisSampel": "Daun", "BentukSampel": "Ekstrak", "Kemasan": "Toples", "Jumlah": 5, "JenisAnalisis": "Fitokimia", "Metode": "Visualisasi warna", "Harga": 175000}]
            foreach($list_keranjang as $item){

            	Sampel::create([
            		'IDPesanan' => $id_pesanan,
            		'NoSampel' => $no_sampel++,
                    'IDKatalog' => $item['IDKatalog'],
            		'JenisSampel' => $item['JenisSampel'],
            		'BentukSampel' => $item['BentukSampel'],
            		'Kemasan' => $item['Kemasan'],
            		'Jumlah' => $item['Jumlah'],
            		'JenisAnalisis' => $item['JenisAnalisis'],
            		'Metode' => $item['Metode'],
            		'HargaSampel' => $item['Harga']
            		]);

            	$hapus = Keranjang::where('IDItem', $item['IDItem'])->where('IDPelanggan', $id_pelanggan)->delete();
            }

            return 0;
        }
        catch(\Exception $e){
            return response()->json(['success'=>false, 'message'=>$e->getMessage(),'Status'=>500], 500);
        }
    }

    public static function instance(){
    	return new Helper();
    }

}