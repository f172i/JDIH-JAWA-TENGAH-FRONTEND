<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsBidangOpd extends Model
{
    use HasFactory;

    protected $table = 'ms_bidang_opd';
    protected $fillable = [
        'id_bidang',
        'id_opd',
        'opd_name',
        'status'
    ];
}