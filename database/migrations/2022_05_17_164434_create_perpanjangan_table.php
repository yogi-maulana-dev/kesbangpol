<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerpanjanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perpanjangan', function (Blueprint $table) {
            $table->id();
            $table->string('sk_pengurusan');
            $table->enum('a_sk_pengurusan', ['0', '1', '2']);
            $table->string('foto_ketua');
            $table->enum('a_foto_ketua', ['0', '1', '2']);
            $table->string('npwp');
            $table->enum('a_npwp', ['0', '1', '2']);
            $table->string('id_user');
            $table->enum('lengkap', ['0', '1', '2']);
            $table->text('ket')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perpanjangan');
    }
}
