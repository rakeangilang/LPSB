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
        	$waktu_sekarang = Carbon::now();
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

    public function newAdministrasiPesanan($data_user, $id_pesanan)
    {
        try
        {
         	// buat administrasi pesanan
        	$z = AdministrasiPesanan::create([
        		'IDPesanan' => $id_pesanan,
        		'NamaLengkap' => $data_user['NamaLengkap'],
        		'Institusi' => $data_user['Institusi'],
        		'Alamat' => $data_user['Alamat'],
        		'NoHP' => $data_user['NoHP'],
        		'Email' => $data_user['Email'],
        		'NoNPWP' => $data_user['NoNPWP'],
        		'NamaRekening' => $data_user['NamaRekening'],
        		'NamaBank' => $data_user['NamaBank'],
        		'NoRekening' => $data_user['NoRekening']
        		]);
        	//{"NamaLengkap": "Gilang", "Institusi": "IPB", "Alamat": "bogor", "NoHP": "999", "Email": "ganteng@banget.com", "NoNPWP": "9182938", "NamaRekening": "h3h3", "NamaBank": "jabar", "NoRekening": "231992"}

 //       	{"data_user": {"NamaLengkap": "Gilang", "Institusi": "IPB", "Alamat": "bogor", "NoHP": "999", "Email": "ganteng@banget.com", "NoNPWP": "9182938", "NamaRekening": "h3h3", "NamaBank": "jabar", "NoRekening": "231992"}, "listKeranjang": [{"a": 1}, {"b":2}], "lama_pengujian": 1, "sisa_sampel": 1, "harga_total": 8888}

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
    }

    public function addSampels($list_keranjang, $id_pesanan, $id_pelanggan)
    {
        try
        {
        	// create nomor sampel
        	$waktu_sekarang = Carbon::now();
        	$bulan = $waktu_sekarang->month;
        	$tahun = $waktu_sekarang->year;

        	if(Pesanan::where('IDPesanan', '!=', $id_pesanan)->whereMonth('WaktuPemesanan', $bulan)->whereYear('WaktuPemesanan', $tahun)->exists())
        	{
        		$pesanan_terakhir = Pesanan::select('IDPesanan')->whereMonth('WaktuPemesanan', $bulan)
        					->whereYear('WaktuPemesanan', $tahun)
        					->latest()
        					->first();

        		$count = Sampel::max('NoSampel')->where('IDPesanan', $pesanan_terakhir);
        	}
        	else {
        		$count = 0;
        	}

        	$no_sampel = $count + 1;      	

            // create new sampels
            // [{"IDItem": 1, "JenisSampel": "Daun", "BentukSampel": "Ekstrak", "Kemasan": "Toples", "Jumlah": 5, "JenisAnalisis": "Fitokimia", "Metode": "Visualisasi warna", "HargaSampel": 175000}]
            foreach($list_keranjang as $item){

            	Sampel::create([
            		'IDPesanan' => $id_pesanan,
            		'NoSampel' => $no_sampel++,
            		'JenisSampel' => $item['JenisSampel'],
            		'BentukSampel' => $item['BentukSampel'],
            		'Kemasan' => $item['Kemasan'],
            		'Jumlah' => $item['Jumlah'],
            		'JenisAnalisis' => $item['JenisAnalisis'],
            		'Metode' => $item['Metode'],
            		'HargaSampel' => $item['HargaSampel']
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