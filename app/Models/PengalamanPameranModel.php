<?php

namespace App\Models;

use CodeIgniter\Model;

class PengalamanPameranModel extends Model
{
    protected $table = 'pengalaman_pameran'; // Nama tabel
    protected $primaryKey = 'id_pameran'; // Primary key

    protected $useTimestamps = true; // Gunakan kolom created_at dan updated_at
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $allowedFields = [
        'user_id_pameran', // Foreign key ke tabel users
        'nama_pameran',    // Nama pameran
        'tanggal_pameran',         // Tanggal pameran
        'lokasi_pameran',          // Lokasi pameran
        'deskripsi_pameran',       // Deskripsi pameran
    ];

    /**
     * Mendapatkan semua pengalaman pameran milik user tertentu.
     *
     * @param int $userId
     * @return array
     */
    public function getPameranByUserId(int $userId)
    {
        return $this->where('user_id_pameran', $userId)->findAll();
    }
}
