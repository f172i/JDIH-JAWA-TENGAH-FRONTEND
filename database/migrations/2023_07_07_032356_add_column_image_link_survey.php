<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddColumnImageLinkSurvey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('link_survey', function (Blueprint $table) {
            $table->string('image')->nullable();
        });

        DB::table('link_survey')->insert([
            'link' => null,
            'name' => 'gambar_survey',
            'image' => null,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('link_survey', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
}
