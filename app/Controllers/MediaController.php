<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class MediaController extends BaseController
{
    public function index()
    {
        $mediaModel = new \App\Models\MediaPromosiModel();
        $media = $mediaModel->findAll();

        return view('media/index', [
            'media' => $media,
        ]);
    }

    public function create()
    {
        return view('media/add_media');

    }

    public function store()
    {
        // dd($this->request->getPost());
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_media' => 'required',
            'tahun_media' => 'required|numeric',
            'deskripsi_media' => 'required',
            'tipe' => 'required',
        ],[
            'nama_media' => [
                'required' => 'Media harus diiisi.'
            ],
            'tahun_media' => [
                'required' => 'Tahun harus diisi.'
            ],
            'deskripsi' => [
                'required' => 'Deskripsi harus diisi.'
            ],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $mediaModel = new \App\Models\MediaPromosiModel();
        $mediaModel->insert([
            'user_id_media' => session()->get('user_id'),
            'nama_media' => $this->request->getPost('nama_media'),
            'tahun_media' => $this->request->getPost('tahun_media'),
            'deskripsi_media' => $this->request->getPost('deskripsi_media'),
            'tipe' => $this->request->getPost('tipe'),
        ]);

        return redirect()->to('user/profile')->with('success_media', 'Media promosi berhasil ditambahkan');
    }

    public function edit($id_media)
    {
        $mediaModel = new \App\Models\MediaPromosiModel();
        $media = $mediaModel->find($id_media);

        if (!$media) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Media promosi dengan ID $id_media tidak ditemukan.");
        }

        return view('media/edit_media', [
            'media' => $media,
        ]);
    }

    public function update($id_media)
    {
        // dd($this->request->getPost());
        $mediaModel = new \App\Models\MediaPromosiModel();

        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_media' => 'required',
            'tahun_media' => 'required|numeric',
            'deskripsi_media' => 'required',
        ],[
            'nama_media' => [
                'required' => 'Media harus diiisi.'
            ],
            'tahun_media' => [
                'required' => 'Tahun harus diisi.'
            ],
            'deskripsi' => [
                'required' => 'Deskripsi harus diisi.'
            ],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $mediaModel->update($id_media, [
            'nama_media' => $this->request->getPost('nama_media'),
            'tahun_media' => $this->request->getPost('tahun_media'),
            'deskripsi_media' => $this->request->getPost('deskripsi_media'),
        ]);

        return redirect()->to('user/profile')->with('success_media', 'Media promosi berhasil diubah');
    }

    public function delete($id_media)
    {
        $mediaModel = new \App\Models\MediaPromosiModel();
        $media = $mediaModel->find($id_media);

        if (!$media) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Media promosi dengan ID $id_media tidak ditemukan.");
        }

        $mediaModel->delete($id_media);

        return redirect()->to('user/profile')->with('success_media', 'Media promosi berhasil dihapus');
    }
}