<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'berita';
    public $timestamps = false;
    protected $fillable = [
        'nama',
        'title',
        'isi',
        'content',
        'images',
        'views',
        'penulis',
        'tgl',
        'tgl_publish',
        //'publish',
        'link'
    ];
}
