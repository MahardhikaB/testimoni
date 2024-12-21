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
        'negara_tujuan',      // Negara tujuan ekspor
        'tanggal',            // Tanggal ekspor
        'produk_ekspor',      // Produk yang diekspor
        'deskripsi_ekspor',   // Deskripsi pengalaman ekspor
        'kuantitas',          // Jumlah barang yang diekspor
        'nilai',              // Nilai ekspor dalam USD
        'status_verifikasi',  // Status verifikasi
        'bukti_ekspor',
    ];

    /**
     * Mendapatkan pengalaman ekspor yang hanya diterima (status 'accepted').
     *
     * @return array
     */
    public function getAcceptedEkspor(): array
    {
        return $this->where('status_verifikasi', 'accepted')->findAll();
    }

    /**
     * Mendapatkan semua pengalaman ekspor milik user tertentu.
     *
     * @param int $userId
     * @return array
     */
    public function getEksporByUserId(int $userId)
    {
        return $this->where('user_id_ekspor', $userId)
                    ->where('status_verifikasi', 'accepted') // Filter only accepted
                    ->findAll();
    }

    /**
     * Memperbarui status verifikasi untuk pengalaman ekspor tertentu.
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
     * Menambahkan pengalaman ekspor baru dengan status 'pending'.
     *
     * @param array $progressData
     * @return bool
     */
    public function addFromProgress($progressData)
    {
        $data = [
            'user_id_ekspor' => $progressData['user_id'],
            'negara_tujuan' => $progressData['negara_ekspor'],
            'tanggal' => $progressData['tanggal_ekspor'],
            'produk_ekspor' => $progressData['produk_ekspor'],
            'deskripsi_ekspor' => $progressData['deskripsi_ekspor'],
            'kuantitas' => $progressData['kuantitas_ekspor'],
            'nilai' => $progressData['nilai_ekspor_usd'],
            'status_verifikasi' => 'pending', // Default status
            'bukti_ekspor' => $progressData['bukti_ekspor'],
        ];

        return $this->insert($data);
    }

        /**
     * Mendapatkan pengalaman ekspor yang belum diverifikasi.
     *
     * @return array
     */
    public function getUnverifiedEkspor(): array
    {
        return $this->select('pengalaman_ekspor.id_ekspor, pengalaman_ekspor.negara_tujuan, pengalaman_ekspor.tanggal, pengalaman_ekspor.produk_ekspor, perusahaan.nama_perusahaan')
                    ->join('users', 'users.user_id = pengalaman_ekspor.user_id_ekspor')
                    ->join('perusahaan', 'perusahaan.user_id_perusahaan = users.user_id')
                    ->where('pengalaman_ekspor.status_verifikasi', 'pending')
                    ->findAll();
    }

}
