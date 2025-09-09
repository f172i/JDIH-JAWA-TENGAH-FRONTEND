<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableIventarisasiHukumChangeFile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inventarisasi_hukum', function (Blueprint $table) {
            $table->mediumText('file')->change();
            $table->mediumText('file_url')->change();
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
            $table->string('file')->change();
            $table->string('file_url')->change();
        });
    }
}
