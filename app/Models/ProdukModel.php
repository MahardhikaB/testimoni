<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk'; // Nama tabel
    protected $primaryKey = 'id_produk'; // Primary key

    protected $useTimestamps = true; // Gunakan kolom created_at dan updated_at
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $allowedFields = [
        'user_id_produk', // Foreign key ke tabel users
        'nama_produk',    // Nama produk
        'deskripsi_produk',      // Deskripsi produk
        'harga_produk',          // Harga produk
        'foto_1',                // Foto produk 1
        'foto_2',                // Foto produk 2
        'foto_3',                // Foto produk 3
        'foto_4',                // Foto produk 4
        'foto_5',                // Foto produk 5
        'tipe',                  // Befor After identifier
        'status_verifikasi',     // Status verifikasi
    ];

    /**
     * Mendapatkan semua produk milik user tertentu.
     *
     * @param int $userId
     * @return array
     */
    public function getProdukByUserId(int $userId)
    {
        return $this->select('id_produk, nama_produk, deskripsi_produk, harga_produk, foto_1, foto_2, foto_3, foto_4, foto_5, tipe, status_verifikasi')
                    ->where('user_id_produk', $userId)
                    ->Where('foto_1 !=', null)
                    ->orWhere('foto_2 !=', null)
                    ->orWhere('foto_3 !=', null)
                    ->orWhere('foto_4 !=', null)
                    ->orWhere('foto_5 !=', null)
                    ->findAll();
    }

    /**
     * Mendapatkan produk yang belum diverifikasi.
     *
     * @return array
     */
    public function getUnverifiedProduk(): array
    {
        return $this->where('status_verifikasi', 'pending')->findAll();
    }

    public function updateVerifikasi(int $id, string $status): bool
    {
        return $this->update($id, ['status_verifikasi' => $status]);
    }
}