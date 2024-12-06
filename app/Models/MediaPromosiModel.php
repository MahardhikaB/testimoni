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
        'status_verifikasi',    // Status verifikasi
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

    /**
     * Mendapatkan media promosi yang belum diverifikasi.
     *
     * @return array
     */
    public function getUnverifiedMedia(): array
    {
        return $this->select('media_promosi.*, users.nama_user, perusahaan.nama_perusahaan')
                    ->join('users', 'users.user_id = media_promosi.user_id_media')
                    ->join('perusahaan', 'perusahaan.user_id_perusahaan = users.user_id')
                    ->where('users.role', 'user')
                    ->where('media_promosi.status_verifikasi', 'pending')
                    ->findAll();
    }

    public function updateVerifikasi(int $id, string $status): bool
    {
        return $this->update($id, ['status_verifikasi' => $status]);
    }
}