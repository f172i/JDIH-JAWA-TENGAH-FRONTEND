<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AreaKako extends Model
{
    protected $table = 'area_kako';
    public $timestamps = false;
    protected $fillable = [
        'nama',
        'kode_area',
        'path_svg',
        'x_y'
    ];
}
