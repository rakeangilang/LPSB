<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    //
    public function generateFormPermohonanAnalisis()
    {
        //$dok_baru = new \PhpOffice\PhpWord\PhpWord();
        //$section = $phpWord->addSection();

        //$description = "hahahaha";
        //$section->addText($description);

        $nama = "Sutedjo Purnomo";
        $perusahaan = "PT. Makmur Sejahtera";
        $alamat = "Perum. Kalibaru Permai Blok C1 No.1, Cilodong, Depok";
        $no_hp = "6281712312";
        $email = "sutedjo1945@gmail.com";
        $no_pesanan = "25/3/19";
        $no_npwp = "123456789";
        $nama_penerima = "Mochammad Suryono Oyon";

        $template_path = storage_path('templates/Template_Permohonan_Analisis.docx');
        $hasil_path = storage_path('permohonan_analisis');
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($template_path);
        $templateProcessor->setValue('NamaLengkap', $nama);
        $templateProcessor->setValue('Perusahaan', $perusahaan);
        $templateProcessor->setValue('Alamat', $alamat);
        $templateProcessor->setValue('NoHP', $no_hp);
        $templateProcessor->setValue('Email', $email);
        $templateProcessor->setValue('NoNPWP', $no_npwp);
        $templateProcessor->setValue('NoPesanan', $no_pesanan);
        $templateProcessor->setValue('NamaPenerima', $nama_penerima);
        $templateProcessor->setImageValue('TTD', array('path' => storage_path('templates/ttd.png'), 'width'=>75, 'height'=>75));

        $filename = 'Hasil ' . $nama . '.docx';
 //     Storage::put('')
        $templateProcessor->saveAs(storage_path('permohonan_analisis/'.$filename));

        return response()->download(storage_path('permohonan_analisis/' . $filename));

//      $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($templateProcessor, 'Word2007');
        try{
            $objWriter->save(storage_path('tes.docx'));
        }
        catch(\Exception $e) {
            return response()->json(['success'=>false, 'message'=>$e->getMessage(),'Status'=>500], 200);
        }

        return response()->download(storage_path('tes.docx'));
    }

    public function uploadBuktiPembayaran(User $user, Request $request)
    {
        try
        {
//            $gambar = $request;
            return response()->json(['Status'=>200], 200);
        }
        catch(\Exception $e) {
            return response()->json(['success'=>false, 'message'=>$e->getMessage(),'Status'=>500], 200);
        }
    }
}