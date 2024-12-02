<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PerusahaanModel;

class UserController extends BaseController
{
    public function dashboard()
    {
        $session = session();

        // Ambil user_id dari session
        $userId = $session->get('user_id');
        if (!$userId) {
            return redirect()->to('/login')->with('error', 'Harap login terlebih dahulu.');
        }

        // Instansiasi model
        $userModel = new UserModel();
        $perusahaanModel = new PerusahaanModel();

        // Ambil data pengguna dari database
        $user = $userModel->find($userId);

        if (!$user) {
            return redirect()->to('/login')->with('error', 'Data pengguna tidak ditemukan.');
        }

        // Ambil data perusahaan berdasarkan user_id
        $perusahaan = $perusahaanModel->getCompanyByUserId($userId);

        // Data yang akan dikirim ke view
        $userData = [
            'user' => $user,
            'perusahaan' => $perusahaan,
        ];

        // Return view
        return view('user/dashboard', $userData);
    }
}
