<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UserModel;
use App\Models\PerusahaanModel;

class PerusahaanSeeder extends Seeder
{
    public function run()
    {
        // Instance model User untuk mendapatkan ID regular user
        $userModel = new UserModel();

        // Mendapatkan ID regular user berdasarkan role 'user'
        $regularUser = $userModel->where('role', 'user')->first();

        if (!$regularUser) {
            echo "Regular user tidak ditemukan. Jalankan UserSeeder terlebih dahulu.";
            return;
        }

        // ID user regular
        $userId = $regularUser['user_id'];

        // Data perusahaan
        $data = [
            'user_id_perusahaan' => 2,
            'nama_perusahaan'    => 'PT Maju Sejahtera',
            'jenis_perusahaan'   => 'Manufaktur',
            'alamat'             => 'Jl. Mawar No. 123, Jakarta',
            'telepon'            => '08123456789',
            'pelatihan_mulai'    => '2024-01-01',
            'pelatihan_selesai'  => '2024-12-31',
        ];

        // Instance model Perusahaan
        $perusahaanModel = new PerusahaanModel();

        // Tambahkan data ke tabel perusahaan
        $perusahaanModel->insert($data);

        echo "Seeder berhasil menambahkan data ke tabel perusahaan.";
    }
}
