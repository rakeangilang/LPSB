<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Auth;

class ApiAuthController extends Controller
{
    //
    public function register(Request $request)
    {
      try{
      $nama = $request['Nama'];
      $email = $request['Email'];
      $password = Hash::make($request['Password']);
      $api_token = bcrypt($email);

      if(User::where('Email', '=', $email)->exists()){
        return response()->json([
          'success'=>false,
          'message'=>'Email sudah terdaftar',
          'Status' => 409
          ], 409);
      }
      else {
        User::create([
        'Nama' => $nama,
        'Email' => $email,
        'Password' => $password,
        'api_token' => $api_token
      ]);

      return response()->json([
        'success'=>true,
            'message'=>'Register berhasil, simpan data pengguna',
        'Nama' => $nama,
        'Email' => $email,
        'api_token' => $api_token,
        'Status' => 201
        ], 201);
      }
        }
        catch(\Exception $e){
            return response()->json(['success'=>false, 'message'=>$e->getMessage(),'Status'=>500], 500);
        }
    }

    public function login(Request $request, User $user)
    { 
      try{
          if(!Auth::attempt(['Email' => $request->Email, 'password' => $request->Password]))
      {
          return response()->json(['error' => "Email atau password salah", "Status" => 400], 400);
      }

        $user = $user->find(Auth::user()->IDPelanggan);

        $id_pelanggan = $user->IDPelanggan;
        $email = $user->Email;
        $api_token = $user->api_token;
        $nama = $user->Nama;
        $perusahaan = $user->Perusahaan;
        $alamat = $user->Alamat;
        $nohp = $user->NoHP;
        $no_identitas = $user->NoIdentitas;
        $no_npwp = $user->NoNPWP;

      return response()->json([
          'success' => true,
          'message' => "Berhasil login",
          "IDPelanggan" => $id_pelanggan,
          'Email' => $email,
          'api_token' => $api_token,
          'Nama' => $nama,
          'Perusahaan' => $perusahaan,
          'Alamat' => $alamat,
          'NoHP' => $nohp,
          'NoIdentitas' => $no_identitas,
          'NoNPWP' => $no_npwp,
          'Status' => 200
        ], 200);
        }
        catch(\Exception $e){
            return response()->json(['success'=>false, 'message'=>$e->getMessage(),'Status'=>500], 500);
        }
    }
}
