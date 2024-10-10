<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEdukasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edukasi', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi');
            $table->enum('media_type', ['foto', 'video_upload', 'video_url']);
            $table->string('media_path')->nullable(); // Path untuk foto atau video yang diupload
            $table->string('video_url')->nullable();  // URL untuk video eksternal
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('edukasi');
    }
}
