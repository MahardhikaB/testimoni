<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        helper(['url', 'form']);
    }

    // Menampilkan form login
    public function loginForm()
    {
        return view('auth/login');
    }

    // Proses login
    public function login()
    {
        $session = session();
        $request = service('request');
        
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'email' => 'required|valid_email',
            'password' => 'required|min_length[8]'
        ], [
            'email' => [
                'required' => 'Email harus diisi.',
                'valid_email' => 'Email tidak valid.',
            ],
            'password' => [
                'required' => 'Password harus diisi.',
                'min_length' => 'Password minimal 8 karakter.',
            ]
        ]);

        if (!$validation->withRequest($request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data user berdasarkan email
        $email = $request->getPost('email');
        $password = $request->getPost('password');
        $user = $this->userModel->where('email', $email)->first();

        if ($user) {
            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                // Cek role
                if ($user['role'] === 'admin') {
                    $session->set('user', $user);
                    return redirect()->to('/admin/dashboard');
                } elseif ($user['role'] === 'user') {
                    $session->set('user', $user);
                    return redirect()->to('/user/dashboard');
                } else {
                    return redirect()->back()->with('error', 'Role tidak valid.');
                }
            } else {
                return redirect()->back()->with('error', 'Password salah.');
            }
        } else {
            return redirect()->back()->with('error', 'Email tidak ditemukan.');
        }
    }

    // Logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
