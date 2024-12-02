<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PerusahaanModel;
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
        // Tangkap data dari form
        $data = $this->request->getPost();

        // Validasi input
        $validation = \Config\Services::validation();

        $validation->setRules([
            'nama_user' => 'required|string|max_length[100]',
            'email' => 'required|valid_email|max_length[100]|is_unique[users.email]',
            'password' => 'required|min_length[8]',
            'nama_perusahaan' => 'required|string|max_length[100]',
            'alamat' => 'required|string',
            'nomor_telepon' => 'required|numeric|min_length[10]|max_length[15]',
            'jenis_perusahaan' => 'required|string|max_length[100]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Kembali ke form dengan pesan error
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Hash password
        $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);

        // Buat transaksi untuk menyimpan ke dua tabel
        $db = \Config\Database::connect();
        $db->transStart();

        // Simpan data user ke tabel `users`
        $userModel = new UserModel();
        $userId = $userModel->insert([
            'nama_user' => $data['nama_user'],
            'email' => $data['email'],
            'role' => 'user', // Default role untuk registrasi
            'password' => $hashedPassword,
        ]);

        // Simpan data perusahaan ke tabel `perusahaan`
        $perusahaanModel = new PerusahaanModel();
        $perusahaanModel->insert([
            'user_id_perusahaan' => $userId,
            'nama_perusahaan' => $data['nama_perusahaan'],
            'alamat' => $data['alamat'],
            'telepon' => $data['nomor_telepon'],
            'jenis_perusahaan' => $data['jenis_perusahaan'],
        ]);

        // Commit transaksi
        $db->transComplete();

        if ($db->transStatus() === false) {
            return redirect()->back()->with('error', 'Registrasi gagal, silakan coba lagi.');
        }

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->to('/login')->with('success', 'Registrasi berhasil, silakan login.');
    }
    
    // Logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
