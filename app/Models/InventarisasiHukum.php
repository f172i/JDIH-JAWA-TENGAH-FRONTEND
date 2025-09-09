<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class InventarisasiHukum extends Model
{
    protected $table = 'inventarisasi_hukum';
    public $timestamps = true;
    protected $fillable = [
        'reff_id',
        'jenis',
        'singkatan_jenis',
        'no_peraturan',
        'pengarang',
        'tgl_ditetap',
        'tgl_diundang',
        'tahun_diundang',
        'content',
        'abstrak',
        'tmp_terbit',
        'penerbit',
        'sumber',
        'file',
        'file_tags',
        'file_date',
        'file_author',
        'file_url',
        'status',
        'publish',
        'unduh',
        'view',
        'bid_hukum',
        'link',
        'bahasa',
        'isbn',
        'no_panggil',
        'no_induk_buku',
        'tipe_dokumen',
        'pemrakarsa','penandatangan','hasil_uji_materi','tajuk_entri_utama','file_custom_status',
        'lokasi',
        'deskripsi_fisik',
        'created_by_role',
        'created_by_user_id'
    ];

    /**
     * Scope to filter records based on user role and pengarang field
     */
    public function scopeFilterByUserAccess($query)
    {
        $userRole = Session::get('role');
        $userName = Session::get('name');

        // Filter data based on user role and name
        if ($userRole !== 'superadmin' && $userName) {
            // Check if user is a restricted user (BPKAD, Badan Pengelola, etc.)
            if (self::isRestrictedUser($userName)) {
                $query->where('pengarang', $userName);
            }
        }

        return $query;
    }

    /**
     * Check if a user should have restricted access based on their username
     */
    public static function isRestrictedUser($userName)
    {
        if (!$userName) return false;
        
        // Define patterns that indicate a restricted user
        $restrictedPatterns = [
            'Badan Pengelola',
            'bpkad',
            'BPKAD',
            // Add more patterns as needed
        ];
        
        foreach ($restrictedPatterns as $pattern) {
            if (stripos($userName, $pattern) !== false) {
                return true;
            }
        }
        
        return false;
    }

    /**
     * Check if current user can access/modify a specific record
     */
    public function canUserAccess($action = 'view')
    {
        $userRole = Session::get('role');
        $userName = Session::get('name');
        $userId = Session::get('id');
        
        // Superadmin can do everything
        if ($userRole === 'superadmin') {
            return true;
        }
        
        // Admin role can still do everything (backward compatibility)
        if ($userRole === 'admin') {
            return true;
        }
        
        // OPD role can only edit/delete records created by OPD users
        if ($userRole === 'opd') {
            if ($action === 'view') {
                return true; // OPD can view all records
            }
            
            // For edit/delete operations, check if the record was created by an OPD user
            // If created_by_role is null (old records), allow access for backward compatibility
            // until all records have been updated with the creator role
            if (is_null($this->created_by_role)) {
                return true; // Allow access to old records without creator info
            }
            
            // Only allow access if the record was created by an OPD user
            return $this->created_by_role === 'opd';
        }
        
        // For restricted users, check if pengarang matches
        if (self::isRestrictedUser($userName)) {
            return $this->pengarang === $userName;
        }
        
        // Other roles have different permissions based on action
        if ($action === 'view') {
            return true; // Everyone can view
        }
        
        return false; // Default deny for edit/delete
    }

}
