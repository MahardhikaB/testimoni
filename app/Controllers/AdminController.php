<?php

namespace App\Controllers;

class AdminController extends BaseController
{
    public function dashboard()
{
    $session = session();
    $userData = [
        'nama_user' => $session->get('nama_user'),
        'role' => $session->get('role'),
        'section' => 'dashboard'
    ];
    return view('admin/dashboard', ['user' => $userData]);
}

}