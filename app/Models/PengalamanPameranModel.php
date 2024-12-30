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
        'user_id_pameran',     // Foreign key ke tabel users
        'nama_pameran',        // Nama pameran
        'tanggal_pameran',     // Tanggal pameran
        'lokasi_pameran',      // Lokasi pameran
        'deskripsi_pameran',   // Deskripsi pameran
        'status_verifikasi',   // Status verifikasi
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

    /**
     * Mendapatkan semua pengalaman pameran milik user tertentu, termasuk yang sudah diverifikasi.
     *
     * @param int $userId
     * @return array
     */
    public function getAllPameranByUserId(int $userId)
    {
        return $this->where('user_id_pameran', $userId)
                    ->whereIn('status_verifikasi', ['pending', 'accepted', 'verified'])
                    ->orderBy('created_at', 'ASC') // Urutkan berdasarkan tanggal
                    ->findAll();
    }

    /**
     * Mendapatkan pengalaman pameran yang belum diverifikasi.
     *
     * @return array
     */
    public function getUnverifiedPameran(): array
    {
        return $this->select('pengalaman_pameran.*, users.nama_user, perusahaan.nama_perusahaan')
                    ->join('users', 'users.user_id = pengalaman_pameran.user_id_pameran')
                    ->join('perusahaan', 'perusahaan.user_id_perusahaan = users.user_id')
                    ->where('users.role', 'user')
                    ->where('pengalaman_pameran.status_verifikasi', 'pending')
                    ->orderBy('pengalaman_pameran.created_at', 'ASC') // Urutkan berdasarkan tanggal
                    ->findAll();
    }

    /**
     * Memperbarui status verifikasi untuk pengalaman pameran tertentu.
     *
     * @param int $id
     * @param string $status
     * @return bool
     */
    public function updateVerifikasi(int $id, string $status): bool
    {
        return $this->update($id, ['status_verifikasi' => $status]);
    }

    /**
     * Menambahkan pengalaman pameran baru dengan status 'pending'.
     *
     * @param array $pameranData
     * @return bool
     */
    public function addFromProgress($pameranData)
    {
        $data = [
            'user_id_pameran' => $pameranData['user_id'],
            'nama_pameran' => $pameranData['nama_pameran'],
            'tanggal_pameran' => $pameranData['tanggal_pameran'],
            'lokasi_pameran' => $pameranData['lokasi_pameran'],
            'deskripsi_pameran' => $pameranData['deskripsi_pameran'],
            'status_verifikasi' => 'pending', // Default status
        ];

        return $this->insert($data);
    }
}