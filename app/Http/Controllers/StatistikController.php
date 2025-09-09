<?php

namespace App\Http\Controllers;

use App\Models\InventarisasiHukum;
use App\Models\Visitor;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;

class StatistikController extends Controller
{


    public function index()
    {
        $phpcurrentyear = date("Y");
        $pengunjung = DB::select("SELECT date as tgl, sum(hits) as jml FROM visitor group by date ");
        $tgl = array_column($pengunjung, 'tgl');
        $jml = array_column($pengunjung, 'jml');
        $tahunber = InventarisasiHukum::select(DB::raw("tahun_diundang"))
            ->orderBy("tahun_diundang", 'desc')
            ->groupBy(DB::raw("tahun_diundang"))
            // ->limit(6)
            ->where('tahun_diundang','!=','0000')
            ->get();
        $tahunberlakutakberlaku = InventarisasiHukum::select(DB::raw("tahun_diundang"))
            ->orderBy("tahun_diundang", 'desc')
            ->groupBy(DB::raw("tahun_diundang"))
            ->limit(6)
            ->get()->toArray();
        $tahunberlakutakberlaku = array_column($tahunberlakutakberlaku, 'tahun_diundang');
        $grafikkategori = InventarisasiHukum::select(DB::raw("count(*) as count, kategori.nama"))
            ->leftJoin('kategori', 'inventarisasi_hukum.jenis', '=', 'kategori.id')
            ->orderBy("kategori.nama", 'desc')
            ->groupBy(DB::raw("kategori.nama"))
            ->get()->toArray();
        $grafikkategori = array_column($grafikkategori, 'count');
        $visitor = Visitor::select(DB::raw("sum(if(YEARWEEK(`date`, 1) = YEARWEEK(CURDATE(), 1),hits,0)) as weekly"))
            ->get()->toArray();
        $visitor = array_column($visitor, 'weekly');
        $perda = InventarisasiHukum::select(DB::raw("count(*) as TotalCount"))
            ->where("jenis", '1')
            ->where("tahun_diundang", $phpcurrentyear)
            ->groupBy(DB::raw("month(created_at), jenis"))
            ->get()->toArray();
        $perda = array_column($perda, 'TotalCount');
        $pergub = InventarisasiHukum::select(DB::raw("COUNT(id) AS TotalCount"))
            ->where("jenis", '2')
            ->where("tahun_diundang", $phpcurrentyear)
            ->groupBy(DB::raw("month(created_at), jenis"))
            ->get()->toArray();
        $pergub = array_column($pergub, 'TotalCount');
        $katalog = InventarisasiHukum::select(DB::raw("COUNT(id) AS TotalCount"))
            ->where("jenis", '3')
            ->where("tahun_diundang", $phpcurrentyear)
            ->groupBy(DB::raw("month(created_at), jenis"))
            ->get()->toArray();
        $katalog = array_column($katalog, 'TotalCount');
        $naskah = InventarisasiHukum::select(DB::raw("COUNT(id) AS TotalCount"))
            ->where("jenis", '4')
            ->where("tahun_diundang", $phpcurrentyear)
            ->groupBy(DB::raw("month(created_at), jenis"))
            ->get()->toArray();
        $naskah = array_column($naskah, 'TotalCount');
        $rekom = InventarisasiHukum::select(DB::raw("COUNT(id) AS TotalCount"))
            ->where("jenis", '5')
            ->where("tahun_diundang", $phpcurrentyear)
            ->groupBy(DB::raw("month(created_at), jenis"))
            ->get()->toArray();
        $rekom = array_column($rekom, 'TotalCount');
        $kepgub = InventarisasiHukum::select(DB::raw("COUNT(id) AS TotalCount"))
            ->where("jenis", '6')
            ->where("tahun_diundang", $phpcurrentyear)
            ->groupBy(DB::raw("month(created_at), jenis"))
            ->get()->toArray();
        $kepgub = array_column($kepgub, 'TotalCount');
        $instgub = InventarisasiHukum::select(DB::raw("COUNT(id) AS TotalCount"))
            ->where("jenis", '7')
            ->where("tahun_diundang", $phpcurrentyear)
            ->groupBy(DB::raw("month(created_at), jenis"))
            ->get()->toArray();
        $instgub = array_column($instgub, 'TotalCount');
        $se = InventarisasiHukum::select(DB::raw("COUNT(id) AS TotalCount"))
            ->where("jenis", '8')
            ->where("tahun_diundang", $phpcurrentyear)
            ->groupBy(DB::raw("month(created_at), jenis"))
            ->get()->toArray();
        $se = array_column($se, 'TotalCount');
        // $tahunan_perundangan = DB::select("
        // select 
        //     tahun_diundang
        //     , sum(case when jenis= 1 then 1 else 0 end) perda
        //     , sum(case when jenis= 2 then 1 else 0 end) pergub
        //     , sum(case when jenis= 3 then 1 else 0 end) katalog
        //     , sum(case when jenis= 4 then 1 else 0 end) naskah
        //     , sum(case when jenis= 5 then 1 else 0 end) rekom
        //     , sum(case when jenis= 6 then 1 else 0 end) kepgub
        //     , sum(case when jenis= 7 then 1 else 0 end) instruksi
        //     , sum(case when jenis= 8 then 1 else 0 end) surat
        //     from inventarisasi_hukum
        //     group by tahun_diundang
        //     order by tahun_diundang desc
        // limit 6");

        $tahunan_perundangan = DB::select("
        select 
            tahun_diundang
            , sum(case when jenis= 1 then 1 else 0 end) perda
            , sum(case when jenis= 2 then 1 else 0 end) pergub
            , sum(case when jenis= 3 then 1 else 0 end) katalog
            , sum(case when jenis= 4 then 1 else 0 end) naskah
            , sum(case when jenis= 5 then 1 else 0 end) rekom
            , sum(case when jenis= 6 then 1 else 0 end) kepgub
            , sum(case when jenis= 7 then 1 else 0 end) instruksi
            , sum(case when jenis= 8 then 1 else 0 end) surat
            from inventarisasi_hukum
            where tahun_diundang != '0000'
            group by tahun_diundang
            order by tahun_diundang desc");

        //10tahun terakhir
        $perda10tahun = InventarisasiHukum::select(DB::raw("count(*) as TotalCount"))
            ->where("jenis", '1')
            ->whereIn("tahun_diundang", ['select tahun_diundang from inventarisasi_hukum group by tahun_diundang order by tahun_diundang desc limit 2'])
            ->groupBy(DB::raw("tahun_diundang, jenis"))
            ->get()->toArray();
        $perda10tahun = array_column($perda10tahun, 'TotalCount');
        $bidang_hukum = InventarisasiHukum::select(DB::raw("count(*) as count"))
            ->groupBy(DB::raw("bid_hukum"))
            ->get()->toArray();
        $bidang_hukum = array_column($bidang_hukum, 'count');

        

        return view('page/pengunjung/statistik')
            ->with('tahunberlakutakberlaku',json_encode($tahunberlakutakberlaku,JSON_NUMERIC_CHECK))
            ->with('tahunber',$tahunber)
            ->with('tahunan_perundangan',$tahunan_perundangan)
            ->with('grafikkategori',json_encode($grafikkategori,JSON_NUMERIC_CHECK))
            ->with('visitor',json_encode($visitor,JSON_NUMERIC_CHECK))
            ->with('tgl',json_encode($tgl,JSON_NUMERIC_CHECK))
            ->with('jml',json_encode($jml,JSON_NUMERIC_CHECK))
            ->with('perda',json_encode($perda,JSON_NUMERIC_CHECK))
            ->with('pergub',json_encode($pergub,JSON_NUMERIC_CHECK))
            ->with('katalog',json_encode($katalog,JSON_NUMERIC_CHECK))
            ->with('naskah',json_encode($naskah,JSON_NUMERIC_CHECK))
            ->with('rekom',json_encode($rekom,JSON_NUMERIC_CHECK))
            ->with('kepgub',json_encode($kepgub,JSON_NUMERIC_CHECK))
            ->with('instgub',json_encode($instgub,JSON_NUMERIC_CHECK))
            ->with('se',json_encode($se,JSON_NUMERIC_CHECK))
            ->with('perda10thn',json_encode($perda10tahun,JSON_NUMERIC_CHECK))
            ;
    }

    public function perbidang()
    {
        $data = InventarisasiHukum::select(DB::raw("count(*) as jml, bidang_hukum.nama"))
            ->leftJoin('bidang_hukum', 'bidang_hukum.id', '=', 'inventarisasi_hukum.bid_hukum')
            ->whereRaw('bidang_hukum.nama is not null')
            ->groupBy('bidang_hukum.nama')
            ->get();
        
            return json_encode($data);   
    }

    public function matrix_perkategori()
    {
        $data = InventarisasiHukum::select(DB::raw("count(*) as jml, kategori.nama, tahun"))
            ->leftJoin('kategori', 'kategori.id', '=', 'inventarisasi_hukum.jenis')
            // ->whereRaw('bidang_hukum.nama is not null')
            ->groupBy('inventarisasi_hukum.tahun_diundang')
            ->get();
        
            return json_encode($data);   
    }

    public function berlaku_takberlaku()
    {
        $data = DB::select("
        select 
            tahun_diundang
            , sum(case when status= 1 then 1 else 0 end) berlaku
            , sum(case when status= 0 then 1 else 0 end) tak_berlaku
            from inventarisasi_hukum
            group by tahun_diundang 
            order by tahun_diundang desc
            limit 6"
        );
        
        
        return json_encode($data);   
    }

    public function tahunan_perundangan()
    {
        $data = DB::select("
        select 
            tahun_diundang
            , sum(case when jenis= 1 then 1 else 0 end) perda
            , sum(case when jenis= 2 then 1 else 0 end) pergub
            , sum(case when jenis= 3 then 1 else 0 end) katalog
            , sum(case when jenis= 4 then 1 else 0 end) naskah
            , sum(case when jenis= 5 then 1 else 0 end) rekom
            , sum(case when jenis= 6 then 1 else 0 end) kepgub
            , sum(case when jenis= 7 then 1 else 0 end) instruksi
            , sum(case when jenis= 8 then 1 else 0 end) surat
            from inventarisasi_hukum
            group by tahun_diundang
            order by tahun_diundang desc
        limit 6"
        );
        
        
        return json_encode($data);   
    }

    public function bulanan_perundangan()
    {
        $phpcurrentyear = date("Y");
        $data = DB::select("
        select 
            month(created_at)
            , sum(case when jenis= 1 then 1 else 0 end) perda
            , sum(case when jenis= 2 then 1 else 0 end) pergub
            , sum(case when jenis= 3 then 1 else 0 end) katalog
            , sum(case when jenis= 4 then 1 else 0 end) naskah
            , sum(case when jenis= 5 then 1 else 0 end) rekom
            , sum(case when jenis= 6 then 1 else 0 end) kepgub
            , sum(case when jenis= 7 then 1 else 0 end) instruksi
            , sum(case when jenis= 8 then 1 else 0 end) surat
            from inventarisasi_hukum
            where tahun_diundang = $phpcurrentyear
            group by month(created_at), jenis
        limit 6"
        );
        
        // ->where("tahun_diundang", $phpcurrentyear)
        //     ->groupBy(DB::raw("month(created_at), jenis"))
        
        return json_encode($data);   
    }


}
