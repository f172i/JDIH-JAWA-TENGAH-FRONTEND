<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class TglPublishBerita extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Get records from old column.
        $results = DB::table('berita')->get();

        // Loop through the results of the old column, split the values.
        // For example, let's say you have to explode a |.
        foreach($results as $result)
        {
            if ($result->tgl_publish == null ) {
                DB::table('berita')->where('id',$result->id)->update([
                    "tgl_publish"    =>  $result->tgl
                ]);
            }
            
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
