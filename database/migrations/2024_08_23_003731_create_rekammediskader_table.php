<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekammediskaderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekammediskader', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pasien_id');
            $table->unsignedBigInteger('user_id'); // Consistent type for user_id
            $table->unsignedBigInteger('namakondisigigi_id');
            $table->text('total')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('pasien_id')->references('id')->on('pasien')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Referencing users table
            $table->foreign('namakondisigigi_id')->references('id')->on('namakondisigigi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rekammediskader');
    }
}
