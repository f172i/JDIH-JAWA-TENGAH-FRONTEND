<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTipeDokumenToInventarisasiHukumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('inventarisasi_hukum', function (Blueprint $table) {
        //     $table->string('tipe_dokumen');
        // });
        Schema::table('inventarisasi_hukum', function($table) {
            $table->string('tipe_dokumen')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inventarisasi_hukum', function (Blueprint $table) {
            $table->dropColumn('tipe_dokumen');
        });
    }
}
