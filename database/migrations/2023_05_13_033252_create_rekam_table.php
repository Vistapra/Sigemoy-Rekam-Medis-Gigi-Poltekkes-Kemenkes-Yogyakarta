<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekam', function (Blueprint $table) {
            $table->id();
            $table->string('no_rekam');
            $table->string('tgl_rekam');
            $table->integer('pasien_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('keluhan'); // Anam Nesa
            $table->string('pemeriksaan')->nullable();
            $table->string('diagnosa')->nullable();
            $table->string('tindakan')->nullable();
            $table->integer('biaya_pemeriksaan')->default(0); // Perbaikan
            $table->integer('biaya_tindakan')->default(0); // Perbaikan
            $table->integer('biaya_obat')->default(0); // Perbaikan
            $table->integer('total_biaya')->default(0);
            $table->integer('petugas_id')->unsigned();
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
        Schema::dropIfExists('rekam');
    }
}
