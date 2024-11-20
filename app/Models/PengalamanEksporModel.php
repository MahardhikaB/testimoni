<?php

namespace App\Models;

use CodeIgniter\Model;

class PengalamanEksporModel extends Model
{
    protected $table = 'pengalaman_ekspor'; // Nama tabel
    protected $primaryKey = 'id_ekspor'; // Primary key

    protected $useTimestamps = true; // Gunakan kolom created_at dan updated_at
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $allowedFields = [
        'user_id_ekspor',     // Foreign key ke tabel users
        'destinasi_ekspor',   // Negara tujuan ekspor
        'tahun_ekspor',              // Tahun ekspor
        'produk_ekspor',             // Produk yang diekspor
        'deskripsi_ekspor',          // Deskripsi pengalaman ekspor
    ];

    /**
     * Mendapatkan semua pengalaman ekspor milik user tertentu.
     *
     * @param int $userId
     * @return array
     */
    public function getEksporByUserId(int $userId)
    {
        return $this->where('user_id_ekspor', $userId)->findAll();
    }
}
