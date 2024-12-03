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
        'status_verifikasi',     // Status verifikasi
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

    /**
     * Mendapatkan program pembinaan yang belum diverifikasi.
     *
     * @return array
     */
    public function getUnverifiedProgramPembinaan(): array
    {
        return $this->select('program_pembinaan.*, users.nama_user, perusahaan.nama_perusahaan')
                    ->join('users', 'users.user_id = program_pembinaan.user_id_pembinaan')
                    ->join('perusahaan', 'perusahaan.user_id_perusahaan = users.user_id')
                    ->where('users.role', 'user')
                    ->where('program_pembinaan.status_verifikasi', 'pending')
                    ->findAll();
    }
}