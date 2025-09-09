<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilJdih extends Model
{
    use HasFactory;

    protected $table = "profile_jdih";
    protected $primaryKey = 'id';
    protected $fillable = [
        'isi',
        'kategori',
    ];
}
