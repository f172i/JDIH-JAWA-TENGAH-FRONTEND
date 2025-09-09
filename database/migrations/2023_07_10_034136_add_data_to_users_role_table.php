<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddDataToUsersRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_role', function (Blueprint $table) {
            DB::table('users_role')->insert([
                [
                    'roles_name' => 'validator'
                ]
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_role', function (Blueprint $table) {
            DB::table('users_role')->where('roles_name', 'validator')->delete();
        });
    }
}
