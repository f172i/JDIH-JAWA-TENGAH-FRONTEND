<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Session;

class InventarisasiHukumService
{

    function detailInventarisasiHukum($id)
    {
        $query = "select kategori.nama, inventarisasi_hukum.* from inventarisasi_hukum left join kategori on kategori.id = inventarisasi_hukum.jenis where inventarisasi_hukum.id = $id";
        return DB::select($query);
    }

}
