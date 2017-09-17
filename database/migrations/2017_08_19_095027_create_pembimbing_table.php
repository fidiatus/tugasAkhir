<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembimbingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembimbing', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('nama_mhs');
            $table->string('nim');
            $table->string('bidangpkl_id');
            $table->string('prodi_id');
            $table->string('daftarpkl_id');
            $table->string('dosen_id');
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
        Schema::drop('pembimbing');
    }
}
