<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\PerusahaanModel;

class DashboardController extends BaseController
{
    public function index()
    {
        // Ambil ID user dari sesi login
        $userId = session()->get('user_id');
        if (!$userId) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Load model
        $userModel = new UserModel();
        $perusahaanModel = new PerusahaanModel();

        // Ambil data user
        $user = $userModel->find($userId);
        if (!$user) {
            return redirect()->to('/login')->with('error', 'Pengguna tidak ditemukan.');
        }

        // Ambil data perusahaan berdasarkan user_id
        $perusahaan = $perusahaanModel->getCompanyByUserId($userId);
        if (!$perusahaan) {
            $perusahaan = [
                'nama_perusahaan' => 'Belum terdaftar',
                'alamat' => 'Belum terdaftar',
                'pelatihan_mulai' => null,
                'pelatihan_selesai' => null,
            ];
        }

        // Kirim data ke view
        return view('dashboard_user', [
            'user' => $user,
            'perusahaan' => $perusahaan,
        ]);
    }
}
