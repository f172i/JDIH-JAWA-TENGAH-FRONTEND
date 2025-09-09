<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Glosarium extends Model
{
    use HasFactory;

    // ✅ Ini penting agar model tahu bahwa nama tabelnya `glosarium`
    protected $table = 'glosarium';

    protected $fillable = ['judul', 'deskripsi', 'sumber_pdf', 'judul_perda', 'link_perda'];

    /**
     * Scope untuk pencarian berdasarkan judul dan deskripsi
     */
    public function scopeSearch($query, $search)
    {
        if (!$search) {
            return $query;
        }

        return $query->where(function ($q) use ($search) {
            $q->where('judul', 'LIKE', '%' . $search . '%')
              ->orWhere('deskripsi', 'LIKE', '%' . $search . '%')
              ->orWhere('judul_perda', 'LIKE', '%' . $search . '%');
        });
    }

    /**
     * Scope untuk mengurutkan berdasarkan relevansi pencarian
     */
    public function scopeOrderByRelevance($query, $search)
    {
        if (!$search) {
            return $query->orderBy('created_at', 'desc');
        }

        return $query->orderByRaw("
            CASE 
                WHEN judul LIKE ? THEN 1
                WHEN judul LIKE ? THEN 2
                WHEN deskripsi LIKE ? THEN 3
                WHEN deskripsi LIKE ? THEN 4
                ELSE 5
            END,
            created_at DESC
        ", [
            $search . '%',      // Exact match at start of judul
            '%' . $search . '%', // Contains in judul
            $search . '%',      // Exact match at start of deskripsi
            '%' . $search . '%'  // Contains in deskripsi
        ]);
    }
}
