<?php

namespace App\Controllers;

class AdminController extends BaseController
{
    public function dashboard()
{
    $session = session();
    $userData = [
        'nama_user' => $session->get('nama_user'),
        'role' => $session->get('role')
    ];
    return view('admin/adminDashboard', ['user' => $userData]);
}

}
