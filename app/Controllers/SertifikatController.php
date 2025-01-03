<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SertifikatModel;

class SertifikatController extends BaseController
{
    public function index()
    {
        $sertifikatModel = new SertifikatModel();
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
        $userId = session()->get('user_id');

        if (!$userId) {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan atau belum login.');
        }

        // Validasi input
        $validationRules = [
            'judul_sertifikat' => 'required',
            'no_sertifikat' => 'required|alpha_numeric',
            'tanggal_terbit_sertifikat' => 'required|valid_date',
            'penerbit_sertifikat' => 'required',
            'tipe' => 'required',
            'file_sertifikat' => 'uploaded[file_sertifikat]|max_size[file_sertifikat,4096]|ext_in[file_sertifikat,pdf,jpg,jpeg,png]',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fileSertifikat = $this->request->getFile('file_sertifikat');
        $namaFile = $fileSertifikat->getRandomName();
        $fileSertifikat->move('storage/sertifikat', $namaFile);

        $sertifikatModel = new SertifikatModel();
        $tipe = $this->request->getPost('tipe');

        if ($tipe == '0') {
            $sertifikatModel->insert([
                'user_id_sertifikat' => $userId,
                'judul_sertifikat' => $this->request->getPost('judul_sertifikat'),
                'no_sertifikat' => $this->request->getPost('no_sertifikat'),
                'tanggal_terbit_sertifikat' => $this->request->getPost('tanggal_terbit_sertifikat'),
                'penerbit_sertifikat' => $this->request->getPost('penerbit_sertifikat'),
                'tipe' => '0',
                'file_sertifikat' => $namaFile,
                'status_verifikasi' => 'waiting',
            ]);
            $sertifikatModel->insert([
                'user_id_sertifikat' => $userId,
                'judul_sertifikat' => $this->request->getPost('judul_sertifikat'),
                'no_sertifikat' => $this->request->getPost('no_sertifikat'),
                'tanggal_terbit_sertifikat' => $this->request->getPost('tanggal_terbit_sertifikat'),
                'penerbit_sertifikat' => $this->request->getPost('penerbit_sertifikat'),
                'tipe' => '1',
                'file_sertifikat' => $namaFile,
                'status_verifikasi' => 'waiting',
            ]);
        } else if ($tipe == '1') {
            $sertifikatModel->insert([
                'user_id_sertifikat' => $userId,
                'judul_sertifikat' => $this->request->getPost('judul_sertifikat'),
                'no_sertifikat' => $this->request->getPost('no_sertifikat'),
                'tanggal_terbit_sertifikat' => $this->request->getPost('tanggal_terbit_sertifikat'),
                'penerbit_sertifikat' => $this->request->getPost('penerbit_sertifikat'),
                'tipe' => $tipe,
                'file_sertifikat' => $namaFile,
                'status_verifikasi' => 'waiting',
            ]);
        }

        return redirect()->to('user/profile')->with('success_sertifikat', 'Sertifikat berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $sertifikatModel = new SertifikatModel();
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
            'file_sertifikat' => 'uploaded[file_sertifikat]|max_size[file_sertifikat,4096]|ext_in[file_sertifikat,pdf,jpg,jpeg,png]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $fileSertifikat = $this->request->getFile('file_sertifikat');
        $sertifikatModel = new SertifikatModel();

        if ($fileSertifikat && !$fileSertifikat->hasMoved()) {
            $namaFile = $fileSertifikat->getRandomName();
            $fileSertifikat->move('storage/sertifikat', $namaFile);

            // Hapus file lama
            $sertifikatLama = $sertifikatModel->find($id);
            if (!empty($sertifikatLama['file_sertifikat'])) {
                unlink('storage/sertifikat/' . $sertifikatLama['file_sertifikat']);
            }
        } else {
            $namaFile = $this->request->getPost('file_sertifikat_lama');
        }

        $sertifikatModel->update($id, [
            'judul_sertifikat' => $this->request->getPost('judul_sertifikat'),
            'no_sertifikat' => $this->request->getPost('no_sertifikat'),
            'tanggal_terbit_sertifikat' => $this->request->getPost('tanggal_terbit_sertifikat'),
            'penerbit_sertifikat' => $this->request->getPost('penerbit_sertifikat'),
            'file_sertifikat' => $namaFile,
            'status_verifikasi' => 'waiting',
        ]);

        return redirect()->to('user/profile')->with('success', 'Sertifikat berhasil diperbarui.');
    }

    public function delete($id)
    {
        $sertifikatModel = new SertifikatModel();
        $sertifikat = $sertifikatModel->find($id);

        if (!$sertifikat) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Sertifikat dengan ID $id tidak ditemukan.");
        }

        if(!$sertifikatModel->isDoubleFileSertifikat($sertifikat['file_sertifikat'])) {
            if(!empty($sertifikat['file_sertifikat'])) {
                unlink('storage/sertifikat/' . $sertifikat['file_sertifikat']);
            }
        }

        $sertifikatModel->delete($id);

        return redirect()->to('user/profile')->with('success', 'Sertifikat berhasil dihapus.');
    }
}