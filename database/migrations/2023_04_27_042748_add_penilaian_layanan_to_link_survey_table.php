<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddPenilaianLayananToLinkSurveyTable extends Migration
{
    public function up()
    {
        $id = rand(100, 999); // generate a random integer between 100 and 999
        $data = [
            'id' => $id,
            'link' => 'google.com',
            'name' => 'penilaian_layanan'
        ];
        DB::table('link_survey')->insert($data);
        $this->id = $id;
    }

    public function down()
    {
        DB::table('link_survey')->where('id', $this->id)->delete();
    }
}
