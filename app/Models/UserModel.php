<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users'; // Nama tabel
    protected $primaryKey = 'user_id'; // Primary key

    // Kolom yang diizinkan untuk insert atau update
    protected $allowedFields = [
        'nama_user', 
        'email', 
        'role', 
        'password',
        'status_verifikasi', // Tambahan kolom status verifikasi
    ];

    // Fitur timestamps
    protected $useTimestamps = true;

    // Timestamps format
    protected $dateFormat = 'datetime';

    // Validasi
    protected $validationRules = [
        'nama_user' => 'required|string|max_length[100]',
        'email'     => 'required|valid_email|max_length[100]',
        'role'      => 'required|in_list[admin,user]', // Role harus admin atau user
        'password'  => 'required|min_length[8]',
        'status_verifikasi' => 'in_list[pending,accepted,rejected]', // Validasi status verifikasi
    ];

    protected $validationMessages = [
        'nama_user' => [
            'required'    => 'Nama pengguna harus diisi.',
            'max_length'  => 'Nama pengguna maksimal 100 karakter.',
        ],
        'email' => [
            'required'    => 'Email harus diisi.',
            'valid_email' => 'Email tidak valid.',
            'max_length'  => 'Email maksimal 100 karakter.',
        ],
        'role' => [
            'required'    => 'Role harus diisi.',
            'in_list'     => 'Role hanya boleh admin atau user.',
        ],
        'password' => [
            'required'    => 'Password harus diisi.',
            'min_length'  => 'Password minimal 8 karakter.',
        ],
        'status_verifikasi' => [
            'in_list'     => 'Status hanya boleh pending, accepted, atau rejected.',
        ],
    ];

    // Fungsi untuk mendapatkan data pengguna berdasarkan role
    public function getUsersByRole(string $role)
    {
        return $this->where('role', $role)->findAll();
    }

    public function getUsersListWithPerusahaan()
    {
        return $this->select('users.user_id, users.nama_user, perusahaan.nama_perusahaan, perusahaan.jenis_perusahaan, perusahaan.alamat, perusahaan.pelatihan_mulai, perusahaan.pelatihan_selesai')
                    ->join('perusahaan', 'perusahaan.user_id_perusahaan = users.user_id', 'left')
                    ->where('users.role', 'user')
                    ->where('perusahaan.nama_perusahaan !=', null)
                    ->findAll();
    }

    public function getUnverifiedUser(): array
    {
        return $this->select('users.user_id, users.nama_user, users.email, users.status_verifikasi, perusahaan.nama_perusahaan')
                    ->join('perusahaan', 'perusahaan.user_id_perusahaan = users.user_id', 'left')
                    ->where('users.role', 'user')
                    ->where('users.status_verifikasi', 'pending')
                    ->findAll();
    }

    // Fungsi untuk mendapatkan pengguna berdasarkan email atau username
    public function getUserByEmailOrUsername(string $input)
    {
        return $this->where('email', $input)
                    ->orWhere('nama_user', $input)
                    ->first();
    }

    // Fungsi untuk memperbarui status verifikasi
    public function updateVerifikasi(int $id, string $status): bool
    {
        return $this->update($id, ['status_verifikasi' => $status]);
    }
}