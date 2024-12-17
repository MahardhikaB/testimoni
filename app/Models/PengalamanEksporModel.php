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
        'negara_tujuan',      // Negara tujuan ekspor (sebelumnya destinasi_ekspor)
        'tanggal',            // Tanggal ekspor (sebelumnya tahun_ekspor)
        'produk_ekspor',      // Produk yang diekspor
        'deskripsi_ekspor',   // Deskripsi pengalaman ekspor
        'kuantitas',          // Jumlah barang yang diekspor
        'nilai',              // Nilai ekspor dalam USD
        'status_verifikasi',  // Status verifikasi
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
        return $this->select('pengalaman_ekspor.id_ekspor, pengalaman_ekspor.negara_tujuan, pengalaman_ekspor.tanggal, pengalaman_ekspor.produk_ekspor, perusahaan.nama_perusahaan')
                    ->join('users', 'users.user_id = pengalaman_ekspor.user_id_ekspor')
                    ->join('perusahaan', 'perusahaan.user_id_perusahaan = users.user_id')
                    ->where('pengalaman_ekspor.status_verifikasi', 'pending')
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
     * Mendapatkan pengalaman ekspor dengan nilai ekspor di atas jumlah tertentu.
     *
     * @param float $minValue
     * @return array
     */
    public function getEksporByMinValue(float $minValue): array
    {
        return $this->where('nilai >=', $minValue)->findAll();
    }

    /**
     * Mendapatkan data pengalaman ekspor berdasarkan negara tujuan.
     *
     * @param string $negara
     * @return array
     */
    public function getEksporByCountry(string $negara): array
    {
        return $this->where('negara_tujuan', $negara)->findAll();
    }
}
