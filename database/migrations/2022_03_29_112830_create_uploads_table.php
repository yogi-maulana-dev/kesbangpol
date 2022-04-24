<?php

 /**
     * Show the form for creating a new resource.
     * Whatapps 6289631031237
     * email : yogimaulana100@gmail.com
     * https://github.com/Ays1234
     * https://serbaotodidak.com/
     */


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('uploads', function (Blueprint $table) {
            $table->id();
             $table->string('surat_terdaftar_dikemenkumham');
             $table->enum('a_surat_terdaftar_dikemenkumham',['0','1','2']);
             $table->string('surat_pendaftaran');
             $table->enum('a_surat_pendaftaran',['0','1','2']);
        $table->string('akte_pendirian');
             $table->enum('a_akte_pendirian',['0','1','2']);
          $table->string('adrt');
          $table->enum('a_adrt',['0','1','2']);
                 $table->string('keabsahan_kantor');
                 $table->enum('a_keabsahan_kantor',['0','1','2']);
                $table->string('program');
                $table->enum('a_program',['0','1','2']);
                 $table->string('surat_keputusan');
                 $table->enum('a_surat_keputusan',['0','1','2']);
                  $table->string('biodata_pengurus');
                  $table->enum('a_biodata_pengurus',['0','1','2']);
                  $table->string('ktp');
                  $table->enum('a_ktp',['0','1','2']);
                    $table->string('foto');
                    $table->enum('a_foto',['0','1','2']);
                     $table->string('surat_keterangan_domisili');
                     $table->enum('a_surat_keterangan_domisili' ,['0','1','2']);
                      $table->string('npwp');
                      $table->enum('a_npwp',['0','1','2']);
                      $table->string('foto_kantor');
                      $table->enum('a_foto_kantor',['0','1','2']);
                        $table->string('surat_ketertiban');
                        $table->enum('a_surat_ketertiban',['0','1','2']);
                         $table->string('surat_tidak_avilasi');
                         $table->enum('a_surat_tidak_avilasi',['0','1','2']);
                         $table->string('surat_konflik');
                         $table->enum('a_surat_konflik',['0','1','2']);
                         $table->string('surat_hak_cipta');
                         $table->enum('a_surat_hak_cipta',['0','1','2']);
                         $table->string('surat_laporan');
                         $table->enum('a_surat_laporan',['0','1','2']);
                         $table->string('surat_absah');
                          $table->enum('a_surat_absah',['0','1','2']);
                         $table->string('surat_rekom_agama');
                         $table->enum('a_surat_rekom_agama',['0','1','2']);
                         $table->string('surat_rekom_skpd');
                         $table->enum('a_surat_rekom_skpd',['0','1','2']);
                         $table->string('surat_rekom_skpd_kerja');
                         $table->enum('a_surat_rekom_skpd_kerja' ,['0','1','2']);
                         $table->string('surat_rekom_kesediaan');
                         $table->enum('a_surat_rekom_kesediaan',['0','1','2']);
                         $table->string('surat_izasah');
                         $table->enum('a_surat_izasah',['0','1','2']);
                         $table->string('skt');
                         $table->enum('a_skt',['0','1','2']);
                         $table->timestamps();
                         $table->string('id_user');
                           $table->enum('lengkap',['0','1','2']);
                           $table->text('ket')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uploads');
    }
}

 /**
     * Show the form for creating a new resource.
     * Whatapps 6289631031237
     * email : yogimaulana100@gmail.com
     * https://github.com/Ays1234
     * https://serbaotodidak.com/
     */
