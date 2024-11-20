<?php

namespace App\Models;

use CodeIgniter\Model;

class ProgramPembinaanModel extends Model
{
    protected $table = 'program_pembinaan'; // Nama tabel
    protected $primaryKey = 'id_program'; // Primary key

    protected $useTimestamps = true; // Gunakan kolom created_at dan updated_at
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $allowedFields = [
        'user_id_pembinaan',     // Foreign key ke tabel users
        'nama_program',          // Nama program pembinaan
        'tahun_program',         // Tahun pelaksanaan program
        'penyelenggara_program', // Penyelenggara program pembinaan
        'deskripsi_program',     // Deskripsi program pembinaan
    ];

    /**
     * Mendapatkan semua program pembinaan milik user tertentu.
     *
     * @param int $userId
     * @return array
     */
    public function getProgramsByUserId(int $userId)
    {
        return $this->where('user_id_pembinaan', $userId)->findAll();
    }
}
