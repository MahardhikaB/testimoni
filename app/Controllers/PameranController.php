<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PameranController extends BaseController
{
    public function index()
    {
        $pameranModel = new \App\Models\PengalamanPameranModel();
        $pameran = $pameranModel->findAll();

        return view('pameran/index', [
            'pameran' => $pameran,
        ]);
    }

    public function create()
    {
        return view('pameran/add_pameran');
    }

    public function store()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_pameran' => 'required',
            'tanggal_pameran' => 'required',
            'lokasi_pameran' => 'required',
            'deskripsi_pameran' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $pameranModel = new \App\Models\PengalamanPameranModel();
        $pameranModel->insert([
            // 'user_id_pameran' => session()->get('user_id'),
            'user_id_pameran' => 2,
            'nama_pameran' => $this->request->getPost('nama_pameran'),
            'tanggal_pameran' => $this->request->getPost('tanggal_pameran'),
            'lokasi_pameran' => $this->request->getPost('lokasi_pameran'),
            'deskripsi_pameran' => $this->request->getPost('deskripsi_pameran'),
        ]);

        return redirect()->to('/pameran')->with('success', 'Pameran berhasil ditambahkan');
    }

    public function edit($id_pameran)
    {
        $pameranModel = new \App\Models\PengalamanPameranModel();
        $pameran = $pameranModel->find($id_pameran);

        if (!$pameran) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Pameran dengan ID $id_pameran tidak ditemukan.");
        }

        return view('pameran/edit_pameran', [
            'pameran' => $pameran,
        ]);
    }

    public function update($id_pameran)
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_pameran' => 'required',
            'tanggal_pameran' => 'required',
            'lokasi_pameran' => 'required',
            'deskripsi_pameran' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $pameranModel = new \App\Models\PengalamanPameranModel();
        $pameranModel->update($id_pameran, [
            'nama_pameran' => $this->request->getPost('nama_pameran'),
            'tanggal_pameran' => $this->request->getPost('tanggal_pameran'),
            'lokasi_pameran' => $this->request->getPost('lokasi_pameran'),
            'deskripsi_pameran' => $this->request->getPost('deskripsi_pameran'),
        ]);

        return redirect()->to('/pameran')->with('success', 'Pameran berhasil diperbarui');
    }
}
