<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PengalamanPameranModel;
use CodeIgniter\HTTP\ResponseInterface;

class PameranController extends BaseController
{
    public function index()
    {
        $pameranModel = new PengalamanPameranModel();
        $pameran = $pameranModel->getAllPameranByUserId(session()->get('user_id'));

        return view('user/partials/pameran', [
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
            'tanggal_pameran' => 'required|valid_date',
            'lokasi_pameran' => 'required',
            'deskripsi_pameran' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $pameranModel = new PengalamanPameranModel();
        $pameranModel->insert([
            'user_id_pameran' => session()->get('user_id'),
            'nama_pameran' => $this->request->getPost('nama_pameran'),
            'tanggal_pameran' => $this->request->getPost('tanggal_pameran'),
            'lokasi_pameran' => $this->request->getPost('lokasi_pameran'),
            'deskripsi_pameran' => $this->request->getPost('deskripsi_pameran'),
            'status_verifikasi' => 'pending',
        ]);

        return redirect()->to('user/profile')->with('success', 'Pameran berhasil ditambahkan dan sedang dalam proses verifikasi.');
    }

    public function edit($id_pameran)
    {
        $pameranModel = new PengalamanPameranModel();
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
            'tanggal_pameran' => 'required|valid_date',
            'lokasi_pameran' => 'required',
            'deskripsi_pameran' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $pameranModel = new PengalamanPameranModel();
        $data = [
            'nama_pameran' => $this->request->getPost('nama_pameran'),
            'tanggal_pameran' => $this->request->getPost('tanggal_pameran'),
            'lokasi_pameran' => $this->request->getPost('lokasi_pameran'),
            'deskripsi_pameran' => $this->request->getPost('deskripsi_pameran'),
        ];

        $pameranModel->update($id_pameran, $data);

        return redirect()->to('user/profile')->with('success', 'Pameran berhasil diubah.');
    }

    public function delete($id_pameran)
    {
        $pameranModel = new PengalamanPameranModel();
        $pameran = $pameranModel->find($id_pameran);

        if (!$pameran) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Pameran dengan ID $id_pameran tidak ditemukan.");
        }

        $pameranModel->delete($id_pameran);

        return redirect()->to('user/profile')->with('success', 'Pameran berhasil dihapus.');
    }

    public function unverified()
    {
        $pameranModel = new PengalamanPameranModel();
        $unverifiedPameran = $pameranModel->getUnverifiedPameran();

        return view('pameran/unverified', [
            'pameran' => $unverifiedPameran,
        ]);
    }
}
