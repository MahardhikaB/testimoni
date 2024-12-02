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

    public function register()
    {
        $userModel = new UserModel();

        // Validasi input
        $validationRules = [
            'Nama' => 'required|string|max_length[100]',
            'email' => 'required|valid_email|is_unique[users.email]|max_length[100]',
            'password' => 'required|min_length[8]',
            'Nomor_telepon' => 'required|numeric|max_length[15]',
            'alamat' => 'required|string|max_length[255]',
        ];

        $validationMessages = [
            'email' => [
                'is_unique' => 'Email sudah terdaftar.',
            ],
            'password' => [
                'min_length' => 'Password minimal 8 karakter.',
            ],
        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil data dari request
        $data = [
            'nama_user' => $this->request->getPost('Nama'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT), // Hash password
            'role' => 'user', // Default role untuk registrasi
        ];

        // Simpan ke tabel users
        $userModel->insert($data);

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->to('/login')->with('success', 'Registrasi berhasil. Silakan login.');
    }
    
    // Logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
