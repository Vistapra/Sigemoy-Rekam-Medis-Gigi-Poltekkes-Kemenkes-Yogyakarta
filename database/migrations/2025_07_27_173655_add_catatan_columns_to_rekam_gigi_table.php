<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCatatanColumnsToRekamGigiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rekam_gigi', function (Blueprint $table) {
            $table->text('catatan_perencanaan')->nullable()->after('tindakan');
            $table->text('catatan_tindakan')->nullable()->after('catatan_perencanaan');
            $table->text('catatan_evaluasi')->nullable()->after('catatan_tindakan');
            $table->text('catatan_diagnosa')->nullable()->after('catatan_evaluasi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rekam_gigi', function (Blueprint $table) {
            $table->dropColumn([
                'catatan_perencanaan',
                'catatan_tindakan', 
                'catatan_evaluasi',
                'catatan_diagnosa'
            ]);
        });
    }
}