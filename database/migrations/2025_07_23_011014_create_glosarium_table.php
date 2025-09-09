<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('glosarium', function (Blueprint $table) {
        $table->id();
        $table->string('judul')->unique();
        $table->text('deskripsi')->nullable();
        $table->string('sumber_pdf')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glosarium');
    }
};
