<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRecordsToKategoriRelated extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kategori', function (Blueprint $table) {
            //
        });

        $data_katalog = [
            [
                'IDKatalog'=>1,
                'IDKategori'=>1,
                'JenisAnalisis'=>'Fitokimia',
                'HargaIPB'=>175000,
                'HargaNONIPB'=>200000,
                'Metode'=>'Visualisasi warna',
                'Keterangan'=>'Kualitatif',
                'StatusAktif'=>1
            ],
            [
                'IDKatalog'=>2,
                'IDKategori'=>1,
                'JenisAnalisis'=>'Alkaloid',
                'HargaIPB'=>45000,
                'HargaNONIPB'=>50000,
                'Metode'=>'Visualisasi warna',
                'Keterangan'=>'Kualitatif',
                'StatusAktif'=>1
            ],
            [
                'IDKatalog'=>3,
                'IDKategori'=>2,
                'JenisAnalisis'=>'Kapang/kamir',
                'HargaIPB'=>110000,
                'HargaNONIPB'=>125000,
                'Metode'=>'Cawan tuang',
                'Keterangan'=>'Keamanan mikroba',
                'StatusAktif'=>1
            ],
            [
                'IDKatalog'=>4,
                'IDKategori'=>2,
                'JenisAnalisis'=>'PCA (TPC)',
                'HargaIPB'=>110000,
                'HargaNONIPB'=>125000,
                'Metode'=>'Cawan tuang',
                'Keterangan'=>'Keamanan mikroba',
                'StatusAktif'=>1
            ],
            [
                'IDKatalog'=>5,
                'IDKategori'=>2,
                'JenisAnalisis'=>'Koliform',
                'HargaIPB'=>110000,
                'HargaNONIPB'=>125000,
                'Metode'=>'Cawan tuang',
                'Keterangan'=>'Keamanan mikroba',
                'StatusAktif'=>1
            ],
            [
                'IDKatalog'=>6,
                'IDKategori'=>2,
                'JenisAnalisis'=>'Anti mikrob',
                'HargaIPB'=>275000,
                'HargaNONIPB'=>310000,
                'Metode'=>'Cawan tuang / MBC MIC',
                'Keterangan'=>'Aktivitas/2 cawan',
                'StatusAktif'=>1
            ]
                        ];

        $data_kategori = [
            [
                'IDKategori'=>1,
                'Kategori'=>'Fitokimia'
            ],
            [
                'IDKategori'=>2,
                'Kategori'=>'Mikrobiologi'
            ]
        ];

        $data_bentuksampel = [
            [
                'IDKatalog'=>1,
                'Ekstrak'=>25,
                'Simplisia'=>25,
                'Cairan'=>null,
                'Serbuk'=>null
            ],
            [
                'IDKatalog'=>2,
                'Ekstrak'=>10,
                'Simplisia'=>10,
                'Cairan'=>null,
                'Serbuk'=>null
            ],
            [
                'IDKatalog'=>3,
                'Ekstrak'=>10,
                'Simplisia'=>25,
                'Cairan'=>25,
                'Serbuk'=>null
            ],
            [
                'IDKatalog'=>4,
                'Ekstrak'=>10,
                'Simplisia'=>25,
                'Cairan'=>25,
                'Serbuk'=>null
            ],
            [
                'IDKatalog'=>5,
                'Ekstrak'=>10,
                'Simplisia'=>25,
                'Cairan'=>25,
                'Serbuk'=>null
            ],
            [
                'IDKatalog'=>6,
                'Ekstrak'=>10,
                'Simplisia'=>25,
                'Cairan'=>25,
                'Serbuk'=>null
            ]
        ];

        DB::table('katalog')->insert($data_katalog);
        DB::table('kategori')->insert($data_kategori);
        DB::table('bentuksampel')->insert($data_bentuksampel);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kategori', function (Blueprint $table) {
            //
        });
    }
}
