<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inventarisasi_hukum', function (Blueprint $table) {
            $table->string('created_by_role', 50)->nullable()->after('opd_id');
            $table->integer('created_by_user_id')->nullable()->after('created_by_role');
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
            $table->dropColumn(['created_by_role', 'created_by_user_id']);
        });
    }
};
