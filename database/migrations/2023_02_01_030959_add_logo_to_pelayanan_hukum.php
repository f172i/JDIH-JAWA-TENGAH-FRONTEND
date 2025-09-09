<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLogoToPelayananHukum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pelayanan_hukum', function ($table) {
            if (!Schema::hasColumn('pelayanan_hukum', 'logo')) {
                $table->text('logo');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pelayanan_hukum', function ($table) {
            $table->dropColumn('logo');
        });
    }
}
