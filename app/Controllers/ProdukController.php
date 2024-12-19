<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ProdukController extends BaseController
{
    /**
     * Tampilkan semua produk.
     */
    public function index()
    {
        $produkModel = new \App\Models\ProdukModel();
        $produk = $produkModel->findAll();

        return view('produk/index', [
            'produk' => $produk,
        ]);
    }

    /**
     * Tampilkan form tambah produk.
     */
    public function create()
    {
        return view('produk/add_produk');
    }

    /**
     * Simpan produk baru.
     */
    public function store()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_produk' => 'required',
            'deskripsi_produk' => 'required',
            'harga_produk' => 'required',
            'tipe' => 'required',
            'foto_1' => 'uploaded[foto_1]|max_size[foto_1,2048]|is_image[foto_1]',
            'foto_2' => 'max_size[foto_2,2048]|is_image[foto_2]',
            'foto_3' => 'max_size[foto_3,2048]|is_image[foto_3]',
            'foto_4' => 'max_size[foto_4,2048]|is_image[foto_4]',
            'foto_5' => 'max_size[foto_5,2048]|is_image[foto_5]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $userId = session()->get('user_id'); // Ambil ID user dari session
        $uploadedFiles = $this->uploadFiles(['foto_1', 'foto_2', 'foto_3', 'foto_4', 'foto_5'], [], $userId);

        $produkModel = new \App\Models\ProdukModel();
        $produkModel->insert([
            'user_id_produk' => $userId,
            'nama_produk' => $this->request->getPost('nama_produk'),
            'deskripsi_produk' => $this->request->getPost('deskripsi_produk'),
            'harga_produk' => $this->request->getPost('harga_produk'),
            'tipe' => $this->request->getPost('tipe'),
            'foto_1' => $uploadedFiles['foto_1'],
            'foto_2' => $uploadedFiles['foto_2'],
            'foto_3' => $uploadedFiles['foto_3'],
            'foto_4' => $uploadedFiles['foto_4'],
            'foto_5' => $uploadedFiles['foto_5'],
        ]);

        return redirect()->to('/produk')->with('success', 'Produk berhasil ditambahkan');
    }

    /**
     * Tampilkan form edit produk.
     */
    public function edit($id_produk)
    {
        $produkModel = new \App\Models\ProdukModel();
        $produk = $produkModel->find($id_produk);

        if (!$produk) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Produk dengan ID $id_produk tidak ditemukan.");
        }

        return view('produk/edit_produk', [
            'produk' => $produk,
        ]);
    }

    /**
     * Perbarui data produk.
     */
    public function update($id_produk)
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_produk' => 'required',
            'deskripsi_produk' => 'required',
            'harga_produk' => 'required',
            'tipe' => 'required',
            'foto_1' => 'max_size[foto_1,2048]|is_image[foto_1]',
            'foto_2' => 'max_size[foto_2,2048]|is_image[foto_2]',
            'foto_3' => 'max_size[foto_3,2048]|is_image[foto_3]',
            'foto_4' => 'max_size[foto_4,2048]|is_image[foto_4]',
            'foto_5' => 'max_size[foto_5,2048]|is_image[foto_5]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $produkModel = new \App\Models\ProdukModel();
        $produk = $produkModel->find($id_produk);

        if (!$produk) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Produk dengan ID $id_produk tidak ditemukan.");
        }

        $userId = session()->get('user_id'); // Ambil ID user dari session
        $uploadedFiles = $this->uploadFiles(['foto_1', 'foto_2', 'foto_3', 'foto_4', 'foto_5'], $produk, $userId);

        $produkModel->update($id_produk, [
            'nama_produk' => $this->request->getPost('nama_produk'),
            'deskripsi_produk' => $this->request->getPost('deskripsi_produk'),
            'harga_produk' => $this->request->getPost('harga_produk'),
            'tipe' => $this->request->getPost('tipe'),
            'foto_1' => $uploadedFiles['foto_1'],
            'foto_2' => $uploadedFiles['foto_2'],
            'foto_3' => $uploadedFiles['foto_3'],
            'foto_4' => $uploadedFiles['foto_4'],
            'foto_5' => $uploadedFiles['foto_5'],
        ]);

        return redirect()->to('/produk')->with('success', 'Produk berhasil diubah');
    }

    /**
     * Upload file dan simpan di folder user tertentu.
     */
    private function uploadFiles(array $fields, $existingData = [], $userId)
    {
        $uploadedFiles = [];
        $uploadPath = WRITEPATH . 'uploads/users/' . $userId;

        // Buat folder user jika belum ada
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        foreach ($fields as $field) {
            $file = $this->request->getFile($field);
            if ($file && $file->isValid()) {
                $fileName = $file->getRandomName();
                $file->move($uploadPath, $fileName);
                $uploadedFiles[$field] = 'users/' . $userId . '/' . $fileName;
            } else {
                $uploadedFiles[$field] = $existingData[$field] ?? null;
            }
        }
        return $uploadedFiles;
    }
}
