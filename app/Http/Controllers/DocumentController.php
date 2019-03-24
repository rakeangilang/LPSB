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

        $nama = "hehe";
        $nim = "G6415";
        $template_path = storage_path('templates\tes1.doc');
        $hasil_path = storage_path('permohonan_analisis');
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($template_path);
        $templateProcessor->setValue('Nama', $nama);
        $templateProcessor->setValue('NIM', $nim);
        $templateProcessor->setImageValue('gambar', array('path' => storage_path('templates\Day1Recap.PNG'), 'width'=>200, 'height'=>200));

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
}