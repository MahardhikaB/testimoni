<?php

namespace App\Models;

use CodeIgniter\Model;

class PerusahaanModel extends Model
{
    protected $table = 'perusahaan'; // Nama tabel di database
    protected $primaryKey = 'id_perusahaan'; // Primary key tabel

    protected $useTimestamps = true; // Menggunakan kolom created_at dan updated_at
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $allowedFields = [
        'user_id_perusahaan', // Foreign key dari tabel users
        'nama_perusahaan',
        'jenis_perusahaan',
        'alamat',
        'telepon',
        'pelatihan_mulai',
        'pelatihan_selesai',
    ];

    /**
     * Memeriksa apakah pengguna sudah memiliki perusahaan.
     *
     * @param int $userId
     * @return bool
     */
    public function userHasCompany(int $userId): bool
    {
        return $this->where('user_id_perusahaan', $userId)->countAllResults() > 0;
    }

    /**
     * Mendapatkan perusahaan milik pengguna tertentu.
     *
     * @param int $userId
     * @return array|null
     */
    public function getCompanyByUserId(int $userId)
    {
        return $this->where('user_id_perusahaan', $userId)->first();
    }
}
