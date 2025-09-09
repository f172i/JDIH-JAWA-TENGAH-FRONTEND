<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InventarisasiHukum;
use Illuminate\Support\Facades\DB;
use App\Helpers\Helper;

class IntegrasiController extends Controller
{
    public function index()
    {
        $data = InventarisasiHukum::select("*",
        "inventarisasi_hukum.id as idData",
        "kategori.nama as namaKategori",
        "bidang_hukum.nama as namaBidangHukum",
        "inventarisasi_hukum.link as linkDokumen",
        )
        ->Join('kategori', 'kategori.id', '=', 'inventarisasi_hukum.jenis')
        ->leftJoin('bidang_hukum','bidang_hukum.id','=','inventarisasi_hukum.bid_hukum')
        ->where('inventarisasi_hukum.jenis', '!=' ,'3')->where('inventarisasi_hukum.jenis', '!=' ,'6')->get();
        foreach($data as $d){
            $tentang = str_replace(['(', ')'], '', str_replace(['<p>', '</p>'], '', $d->content));
            $tentangfix = strval(ucwords(strtolower($tentang)));
            $sumber = str_replace(['<p>', '</p>'], '', $d->sumber);
            if($d->no_peraturan == 0){
                $judul = strval($d->namaKategori." Jawa Tengah Tahun ".$d->tahun_diundang." Tentang ".$tentang);
            }else{
                $judul = strval($d->namaKategori." Jawa Tengah Nomor ".$d->no_peraturan." Tahun ".$d->tahun_diundang." Tentang ".$tentang);
            }
            if($d->status == 1){
                $status = "Berlaku";
            }else{
                $status = "Tidak Berlaku";
            }
            $arr = array(
                'idData' => (string)$d->idData,
                'tahun_pengundangan' => (string)$d->tahun_diundang,
                'tanggal_penetapan' => $d->tgl_ditetap,
                'tanggal_pengundangan' => $d->tgl_diundang,
                'jenis' => $d->namaKategori,
                'noPeraturan' => $d->no_peraturan,
                'judul' => $judul,
                'singkatanJenis' => ucwords(strtolower($d->singkatan_jenis)),
                'tempatTerbit' => $d->tmp_terbit,
                'sumber' => $sumber,
                'status' => $status,
                'bahasa' => "Bahasa Indonesia",
                'fileDownload' => $d->file,
                'urlDownload' => url($d->file_url),
                'operasi' => "4",
                'display' => "1",

                //baru
                'noPanggil' => $d->no_panggil,
                'penerbit' => $d->penerbit,
                'subjek' => $d->file_tags,
                'isbn' => $d->isbn,
                'bidangHukum' => $d->namaBidangHukum,
                'nomorIndukBuku' => $d->no_induk_buku,
                'urlDetailPeraturan' => url('inventarisasi-hukum/detail/'.$d->linkDokumen),
                'teuBadan' => $d->tajuk_entri_utama
            );
            $json[] = $arr;
        }
        $newjson = mb_convert_encoding($json, "UTF-8", "auto");
        return $newjson;
    }
}


