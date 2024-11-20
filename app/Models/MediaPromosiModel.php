<?php

namespace App\Models;

use CodeIgniter\Model;

class MediaPromosiModel extends Model
{
    protected $table = 'media_promosi'; // Nama tabel
    protected $primaryKey = 'id_media'; // Primary key

    protected $useTimestamps = true; // Gunakan kolom created_at dan updated_at
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $allowedFields = [
        'user_id_media',  // Foreign key ke tabel users
        'nama_media',     // Nama media promosi
        'tahun_media',          // Tahun penggunaan media promosi
        'deskripsi_media',      // Deskripsi media promosi
    ];

    /**
     * Mendapatkan semua media promosi milik user tertentu.
     *
     * @param int $userId
     * @return array
     */
    public function getMediaByUserId(int $userId)
    {
        return $this->where('user_id_media', $userId)->findAll();
    }
}
