<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('glosarium', function (Blueprint $table) {
            $table->string('judul_perda')->nullable()->after('sumber_pdf');
            $table->text('link_perda')->nullable()->after('judul_perda');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('glosarium', function (Blueprint $table) {
            $table->dropColumn(['judul_perda', 'link_perda']);
        });
    }
};
