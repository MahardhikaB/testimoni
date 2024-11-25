<?php

namespace App\Controllers;

class RegistrasiController extends BaseController
{
    public function index(): string
    {
        return view('auth/registrasi');
    }
}
