<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PelangganController extends Controller
{
    //
    public function getInfoRekening(User $user, Request $request)
    {
    	$pelanggan = $request->user();
    	$nama_rekening = $pelanggan->NamaRekening;
    	$nama_bank = $pelanggan->NamaBank;
    	$no_rekening = $pelanggan->NoRekening;

    	return response()->json([
    		'success'=>true,
            'message'=>'Informasi rekening berhasil diambil',
    		'NamaRekening' => $nama_rekening,
    		'NamaBank' => $nama_bank,
    		'NoRekening' => $no_rekening,
            'Status' => 200
    		], 200);
    }

    public function getProfil(User $user, Request $request)
    {
        $pelanggan = $request->user();
        $nama = $pelanggan->Nama;
        $email = $pelanggan->Email;
        $perusahaan = $pelanggan->Perusahaan;
        $alamat = $pelanggan->Alamat;
        $no_hp = $pelanggan->NoHP;
        $no_npwp = $pelanggan->NoNPWP;

        return response()->json([
            'success'=>true,
            'message'=>'Informasi pengguna berhasil diambil',
            'Nama' => $nama,
            'Email' => $email,
            'Perusahaan' => $perusahaan,
            'Alamat' => $alamat,
            'NoHP' => $no_hp,
            'NoNPWP' => $no_npwp,
            'Status' => 200
            ], 200);
    }

    public function simpanProfil(User $user, Request $request)
    {
        $nama = $request->Nama;
        $email = $request->Email;
        $perusahaan = $request->Perusahaan;
        $alamat = $request->Alamat;
        $no_hp = $request->NoHP;
        $no_npwp = $request->NoNPWP;

        $id_pelanggan = $request->user()->IDPelanggan;

        User::where('IDPelanggan', $id_pelanggan)->update([
                'Nama' => $nama,
                'Email' => $email,
                'Perusahaan' => $perusahaan,
                'Alamat' => $alamat,
                'NoHP' => $no_hp,
                'NoNPWP' => $no_npwp
            ]);

        return response()->json([
            'success'=>true,
            'message'=>'Informasi pengguna berhasil disimpan',
            'Status' => 200
            ], 200);
    }

    public function simpanRekening(User $user, Request $request)
    {
        $nama_rekening = $request->NamaRekening;
        $nama_bank = $request->NamaBank;
        $no_rekening = $request->NoRekening;

        $id_pelanggan = $request->user()->IDPelanggan;

        User::where('IDPelanggan', $id_pelanggan)->update([
            'NamaRekening' => $nama_rekening,
            'NamaBank' => $nama_bank,
            'NoRekening' => $no_rekening
            ]);

        return response()->json([
            'success'=>true,
            'message'=>'Informasi rekening berhasil disimpan',
            'NamaRekening' => $nama_rekening,
            'NamaBank' => $nama_bank,
            'NoRekening' => $no_rekening,
            'Status' => 200
            ], 200);
    }
}
