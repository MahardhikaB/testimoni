<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\Test\Fabricator;
use App\Models\UserModel;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Instance dari model User
        $userModel = new UserModel();

        // Data pengguna untuk ditambahkan
        $data = [
            [
                'nama_user' => 'Admin User',
                'email'     => 'admin@example.com',
                'role'      => 'admin', // Role sebagai admin
                'password'  => password_hash('admin1234', PASSWORD_DEFAULT), // Enkripsi password
            ],
            [
                'nama_user' => 'Regular User',
                'email'     => 'user@example.com',
                'role'      => 'user', // Role sebagai user
                'password'  => password_hash('user1234', PASSWORD_DEFAULT), // Enkripsi password
            ],
            [
                'nama_user' => 'bryan',
                'email'     => 'bryantosin1@gmail.com',
                'role'      => 'user', // Role sebagai user
                'password'  => password_hash('password', PASSWORD_DEFAULT), // Enkripsi password
            ],
        ];

        // Tambahkan data ke tabel users
        $userModel->insertBatch($data);

        echo "Seeder berhasil menambahkan data ke tabel users.";
    }
}