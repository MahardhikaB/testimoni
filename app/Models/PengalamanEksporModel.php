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
        'status_verifikasi',         // Status verifikasi
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

    /**
     * Mendapatkan pengalaman ekspor yang belum diverifikasi.
     *
     * @return array
     */
    public function getUnverifiedEkspor(): array
    {
        return $this->select(' pengalaman_ekspor.id_ekspor, pengalaman_ekspor.destinasi_ekspor, pengalaman_ekspor.tahun_ekspor, pengalaman_ekspor.produk_ekspor, perusahaan.nama_perusahaan')
                    ->join('users', 'users.user_id = pengalaman_ekspor.user_id_ekspor')
                    ->join('perusahaan', 'perusahaan.user_id_perusahaan = users.user_id')
                    ->where('pengalaman_ekspor.status_verifikasi', 'pending')
                    ->findAll();
    }
}