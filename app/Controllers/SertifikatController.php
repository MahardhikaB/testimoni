<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\SertifikatModel;

class SertifikatController extends BaseController
{
    public function index()
    {
        $sertifikatModel = new \App\Models\SertifikatModel();
        $sertifikat = $sertifikatModel->findAll();

        return view('sertifikat/index', [
            'sertifikat' => $sertifikat,
        ]);
    }

    public function create()
    {
        return view('sertifikat/add_sertifikat');
    }

    public function store()
    {
        // Ambil user_id dari session
        $userId = session()->get('user_id'); // Pastikan session sudah menyimpan user_id

        if (!$userId) {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan atau belum login.');
        }

        $sertifikatModel = new SertifikatModel();

        // Validasi input
        $validationRules = [
            'judul_sertifikat' => 'required',
            'no_sertifikat' => 'required|alpha_numeric',
            'tanggal_terbit_sertifikat' => 'required|valid_date',
            'penerbit_sertifikat' => 'required',
            'tipe' => 'required'
            
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Simpan data sertifikat
        $sertifikatModel->insert([
            'user_id_sertifikat' => $userId,
            'judul_sertifikat' => $this->request->getPost('judul_sertifikat'),
            'no_sertifikat' => $this->request->getPost('no_sertifikat'),
            'tanggal_terbit_sertifikat' => $this->request->getPost('tanggal_terbit_sertifikat'),
            'penerbit_sertifikat' => $this->request->getPost('penerbit_sertifikat'),
            'tipe' => $this->request->getPost('tipe'),
            'status_verifikasi' => 'waiting'
        ]);

        return redirect()->to('user/sertifikat')->with('success', 'Sertifikat berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $sertifikatModel = new \App\Models\SertifikatModel();
        $sertifikat = $sertifikatModel->find($id);

        return view('sertifikat/edit_sertifikat', [
            'sertifikat' => $sertifikat,
        ]);
    }

    public function update($id)
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul_sertifikat' => 'required',
            'no_sertifikat' => 'required',
            'tanggal_terbit_sertifikat' => 'required',
            'penerbit_sertifikat' => 'required',
            'tipe' => 'required',
            
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $sertifikatModel = new \App\Models\SertifikatModel();
        $sertifikatModel->update($id, [
            'judul_sertifikat' => $this->request->getPost('judul_sertifikat'),
            'no_sertifikat' => $this->request->getPost('no_sertifikat'),
            'tanggal_terbit_sertifikat' => $this->request->getPost('tanggal_terbit_sertifikat'),
            'penerbit_sertifikat' => $this->request->getPost('penerbit_sertifikat'),
            'tipe' => $this->request->getPost('tipe'),
            'status_verifikasi' => 'waiting',
        ]);

        return redirect()->to('/sertifikat')->with('success', 'Sertifikat berhasil diperbarui');
    }
}