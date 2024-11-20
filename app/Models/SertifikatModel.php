<?php

namespace App\Models;

use CodeIgniter\Model;

class SertifikatModel extends Model
{
    protected $table = 'sertifikat'; // Nama tabel
    protected $primaryKey = 'id_sertifikat'; // Primary key

    protected $useTimestamps = true; // Gunakan kolom created_at dan updated_at
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $allowedFields = [
        'user_id_sertifikat', // Foreign key ke tabel users
        'judul_sertifikat',   // Judul sertifikat
        'no_sertifikat',      // Nomor sertifikat
        'tanggal_terbit_sertifikat',     // Tanggal terbit sertifikat
        'penerbit_sertifikat',           // Nama penerbit
    ];

    /**
     * Mendapatkan semua sertifikat milik user tertentu.
     *
     * @param int $userId
     * @return array
     */
    public function getSertifikatByUserId(int $userId)
    {
        return $this->where('user_id_sertifikat', $userId)->findAll();
    }
}
