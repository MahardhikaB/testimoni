<?php

namespace App\Controllers;

use App\Models\UserModel;

class LoginController extends BaseController
{
    public function index(): string
    {
        return view('auth/login'); // Sesuaikan lokasi view Anda
    }

    public function authenticate()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'user_id' => $user['user_id'],
                'nama_user' => $user['nama_user'],
                'role' => $user['role'],
                'isLoggedIn' => true,
            ]);
            
            // Redirect based on role
            return redirect()->to($user['role'] === 'admin' ? '/admin/dashboard' : '/user/dashboard');
        }

        // Jika gagal
        return redirect()->back()->with('error', 'Email atau password salah.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
