<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = "video";
    protected $primaryKey = 'id_video';
    public $timestamps = true;
    public $incrementing =  false;
    protected $fillable = [
        'judul_video',
        'thumbnail_video',
        'link_youtube_video',
        'publish_video',
    ];
}
