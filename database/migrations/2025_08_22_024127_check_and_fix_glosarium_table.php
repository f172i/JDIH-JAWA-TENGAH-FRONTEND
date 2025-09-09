<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CheckAndFixGlosariumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Check if glosarium table exists, if not create it
        if (!Schema::hasTable('glosarium')) {
            Schema::create('glosarium', function (Blueprint $table) {
                $table->id();
                $table->string('judul')->unique();
                $table->text('deskripsi')->nullable();
                $table->string('sumber_pdf')->nullable();
                $table->timestamps();
            });
        }

        // Check and add missing columns
        Schema::table('glosarium', function (Blueprint $table) {
            if (!Schema::hasColumn('glosarium', 'judul_perda')) {
                $table->string('judul_perda')->nullable()->after('sumber_pdf');
            }
            if (!Schema::hasColumn('glosarium', 'link_perda')) {
                $table->text('link_perda')->nullable()->after('judul_perda');
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
        // Only drop columns that were added in this migration
        if (Schema::hasTable('glosarium')) {
            Schema::table('glosarium', function (Blueprint $table) {
                if (Schema::hasColumn('glosarium', 'link_perda')) {
                    $table->dropColumn('link_perda');
                }
                if (Schema::hasColumn('glosarium', 'judul_perda')) {
                    $table->dropColumn('judul_perda');
                }
            });
        }
    }
}
