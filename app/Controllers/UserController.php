<?php

namespace App\Controllers;

class UserController extends BaseController
{
    public function dashboard()
{
    $session = session();
    $userData = [
        'nama_user' => $session->get('nama_user'),
        'role' => $session->get('role')
    ];
    return view('user/dashboard', ['user' => $userData]);
}

}
