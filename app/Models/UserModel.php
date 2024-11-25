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
        'password'
    ];

    // Fitur timestamps
    protected $useTimestamps = true;

    // Timestamps format
    protected $dateFormat = 'datetime';

    // Validasi
    protected $validationRules = [
        'nama_user' => 'required|string|max_length[100]',
        'email'     => 'required|valid_email|max_length[100]',
        'role'      => 'required|in_list[admin,user]', // 0 = admin, 1 = user
        'password'  => 'required|min_length[8]',
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
            'in_list'     => 'Role hanya boleh 0 (admin) atau 1 (user).',
        ],
        'password' => [
            'required'    => 'Password harus diisi.',
            'min_length'  => 'Password minimal 8 karakter.',
        ],
    ];

    // Fungsi untuk mendapatkan data pengguna berdasarkan role
    public function getUsersByRole(int $role)
    {
        return $this->where('role', $role)->findAll();
    }

    public function getUserByEmailOrUsername(string $input)
    {
        return $this->where('email', $input)
                    ->orWhere('nama_user', $input)
                    ->first();
    }
}
