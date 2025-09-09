<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDescAnggotaToAnggotaJdihTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('anggota_jdih', function (Blueprint $table) {
            $table->string('desc_anggota')->nullable();
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('anggota_jdih', function (Blueprint $table) {
            $table->dropColumn('desc_anggota');
        });
    }
    
}
