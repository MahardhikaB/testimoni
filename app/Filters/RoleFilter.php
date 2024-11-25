<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        $role = $arguments[0] ?? null;

        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Harap login terlebih dahulu.');
        }

        // Cek role
        if ($session->get('role') !== $role) {
            return redirect()->to('/login')->with('error', 'Anda tidak memiliki akses.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak diperlukan
    }
}
