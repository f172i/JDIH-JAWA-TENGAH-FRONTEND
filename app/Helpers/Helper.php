<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Helper
{
    /** FORMAT TANGGAL INDONESIA */
    public static function tgl_indo($tanggal)
    { //@juna
        $bulan = array(
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $split = explode('-', $tanggal);
        return @$split[2] . ' ' . $bulan[(int)@$split[1]] . ' ' . @$split[0];
    }
    /** remove tag html */
    public static function string_rmv_html($param)
    {
        $string = str_replace(['(', ')'], '', str_replace(['<p>', '</p>'], '', $param));
        return $string;
    }

    public static function checkAuth($id_users) {
        $data = DB::connection()->select(
            "SELECT
            users.id AS id_users,
            users.name,
            users.email,
            users_role.roles_name
        FROM users
            join users_role on users.role = users_role.id
        WHERE users.id = $id_users");
        return $data;
    }

    public static function getVisitor() {
        $datenow = date('Y-m-d');
        $year = date('Y');
        $bln = date('m');
        $data = DB::connection()->select(
            "SELECT 
            sum(if(date = '$datenow',hits,0)) as daily,
            sum(if(YEARWEEK(`date`, 1) = YEARWEEK(CURDATE(), 1),hits,0)) as weekly,
            sum(if(year(date) = '$year' and month(date) = '$bln', hits, 0 )) as mounty,
            sum(if(year(date) = '$year', hits, 0 )) as yearly
            FROM visitor ");
        return $data;
    }

    public static function getSurvei() {
        $data = DB::connection()->select(
            "SELECT *
            FROM survei_kepuasan ");
        return $data;
    }
}
