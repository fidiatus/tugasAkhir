<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaftarpklTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_pkl', function (Blueprint $table){
            $table->increments('id');
            $table->integer('prodi_id');
            $table->integer('grup_id');
            $table->string('perusahaan_id');
            $table->integer('nama_proyek');
            $table->string('semester');
            $table->string('tahun ajaran');
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
        Schema::drop('daftar_pkl');
    }
}
