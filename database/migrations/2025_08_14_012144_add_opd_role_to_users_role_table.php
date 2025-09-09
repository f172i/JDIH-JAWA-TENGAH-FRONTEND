<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddOpdRoleToUsersRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Add the 'opd' role to users_role table
        DB::table('users_role')->insert([
            'roles_name' => 'opd'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Remove the 'opd' role from users_role table
        DB::table('users_role')->where('roles_name', 'opd')->delete();
    }
}
