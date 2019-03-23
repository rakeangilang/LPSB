<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keranjang;
use App\User;
use App\Katalog;
use App\Pesanan;
use Helper;

class KeranjangController extends Controller
{
    //
    public function tambahItem(User $user, Request $request)
    {
        try{
            $pelanggan = $request->user()->IDPelanggan;
        $id_katalog = $request['IDKatalog'];
        $jenis_sampel = $request['JenisSampel'];
        $bentuk_sampel = $request['BentukSampel'];
        $kemasan = $request['Kemasan'];
        $jumlah = $request['Jumlah'];

        Keranjang::create([
            'IDPelanggan' => $pelanggan,
            'JenisSampel' => $jenis_sampel,
            'BentukSampel' => $bentuk_sampel,
            'Kemasan' => $kemasan,
            'Jumlah' => $jumlah,
            'IDKatalog' => $id_katalog
            ]);

        return response()->json([
            'success'=>true,
            'message'=>'Item berhasil ditambahkan ke keranjang',
            'Status' => 200
            ], 201);
        }
        catch(\Exception $e){
            return response()->json(['success'=>false, 'message'=>$e->getMessage(),'Status'=>500], 500);
        }
    }

    public function getKeranjang(User $user, Request $request)
    {
        try{
        $id_pelanggan = $request->user()->IDPelanggan;
        $keranjangs = Keranjang::where('IDPelanggan', $id_pelanggan)->orderBy('IDItem', 'desc')->get();

        foreach($keranjangs as $keranjang){
            $katalog = Katalog::select('JenisAnalisis', 'Metode', 'HargaIPB', 'HargaNONIPB')->where('IDKatalog', $keranjang->IDKatalog)->first();
            $keranjang->setAttribute('JenisAnalisis', $katalog->JenisAnalisis);
            $keranjang->setAttribute('Metode', $katalog->Metode);
            $keranjang->setAttribute('HargaIPB', $katalog->HargaIPB);
            $keranjang->setAttribute('HargaNONIPB', $katalog->HargaNONIPB);
        }

        return response()->json([
            'success'=>true,
            'message'=>'Item di keranjang berhasil diambil',
            'keranjang'=>$keranjangs,
            'Status' => 200
            ], 200);            
        }
        catch(\Exception $e){
            return response()->json(['success'=>false, 'message'=>$e->getMessage(),'Status'=>500], 500);
        }
    }

    public function hapusItem(User $user, Request $request)
    {
        try{
            $id_item = $request->IDItem;
        $id_user = $request->user()->IDPelanggan;
        $hapus = Keranjang::where('IDItem', $id_item)->where('IDPelanggan', $id_user)->delete();

        return response()->json([
            'success'=>true,
            'message'=>'Item berhasil dihapus dari keranjang',
            'Status' => 200
            ], 200);
        }
        catch(\Exception $e){
            return response()->json(['success'=>false, 'message'=>$e->getMessage(),'Status'=>500], 500);
        }
    }

    public function pesanItem(User $user, Request $request)
    {
        try{
        // chunk some data
            $res = $request;
            $id_pelanggan = $request->user()->IDPelanggan;
            $list_keranjang = $request->listKeranjang;
            $data_user = $request->data_user;
            $data_rek = $request->data_rek;
            $keterangan = $request->KeteranganPesanan;
            $kembalikan_sisa = $request->sisa_sampel;

        // buat pesanan then get IDPesanan
            $id_pesanan = Helper::instance()->newPesanan($request, $id_pelanggan);
        // buat administrasi pesanan
            $make_administrasi = Helper::instance()->newAdministrasiPesanan($data_user, $data_rek, $id_pesanan, $keterangan);
        // buat dokumen pesanan
            $make_dokumen = Helper::instance()->newDokumenPesanan($id_pesanan);
        // buat pelacakan
            $make_pelacakan = Helper::instance()->newPelacakan($id_pesanan, $kembalikan_sisa);
        // migrasi keranjang ke sampel
            $make_sampel = Helper::instance()->addSampels($list_keranjang, $id_pesanan, $id_pelanggan);

            // generate success status
            if($make_administrasi!=0 || $make_pelacakan!=0 || $make_dokumen!=0 || $id_pesanan==-1){
                $success_status = 500;
            }
            else{
                $success_status = 0;
            }
            return response()->json(['id_pesanan' => $id_pesanan, 'status' => $success_status, 'adm_status' => $make_administrasi, 'dok_status' => $make_dokumen, 'pel_status' => $make_pelacakan, 'sam_status' => $make_sampel]); 
        }


        catch(\Exception $e){
            return response()->json(['success'=> $list_keranjang['JenisSampel'], 'message'=>$e->getMessage(),'Status'=>501], 500);
        }
    }
}

