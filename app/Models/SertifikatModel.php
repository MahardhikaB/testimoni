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
        'user_id_sertifikat',
        'judul_sertifikat',
        'no_sertifikat',
        'tanggal_terbit_sertifikat',
        'penerbit_sertifikat',
        'file_sertifikat',
        'tipe',
        'status_verifikasi',
        'created_at',
        'updated_at',
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

    /**
     * Mendapatkan sertifikat yang belum diverifikasi.
     *
     * @return array
     */
    public function getUnverifiedSertifikat(): array
    {
        return $this->select('sertifikat.*, users.nama_user, perusahaan.nama_perusahaan')
                    ->join('users', 'users.user_id = sertifikat.user_id_sertifikat')
                    ->join('perusahaan', 'perusahaan.user_id_perusahaan = users.user_id')
                    ->where('users.role', 'user')
                    ->where('sertifikat.status_verifikasi', 'pending')
                    ->findAll();
    }

    public function updateVerifikasi(int $id, string $status): bool
    {
        return $this->update($id, ['status_verifikasi' => $status]);
    }
}