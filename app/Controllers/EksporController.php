<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class EksporController extends BaseController
{
    public function index()
    {
        $eksporModel = new \App\Models\PengalamanEksporModel();
        $ekspor = $eksporModel->findAll();

        return view('ekspor/index', [
            'ekspor' => $ekspor,
        ]);
    }

    public function create()
    {
        return view('ekspor/add_ekspor');
    }

    public function store()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'destinasi_ekspor' => 'required',
            'tahun_ekspor' => 'required',
            'produk_ekspor' => 'required',
            'deskripsi_ekspor' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $eksporModel = new \App\Models\PengalamanEksporModel();
        $eksporModel->insert([
            // 'user_id_ekspor' => session()->get('user_id'),
            'user_id_ekspor' => 2,
            'destinasi_ekspor' => $this->request->getPost('destinasi_ekspor'),
            'tahun_ekspor' => $this->request->getPost('tahun_ekspor'),
            'produk_ekspor' => $this->request->getPost('produk_ekspor'),
            'deskripsi_ekspor' => $this->request->getPost('deskripsi_ekspor'),
        ]);

        return redirect()->to('/ekspor')->with('success', 'Ekspor berhasil ditambahkan');
    }
}
