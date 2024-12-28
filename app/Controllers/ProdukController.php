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
        // dd($this->request->getPost());
        $validation = \Config\Services::validation();

        // Define validation rules and messages
        $validation->setRules([
            'nama_produk' => 'required',
            'deskripsi_produk' => 'required',
            'harga_produk' => 'required|numeric',
            'foto_1' => 'uploaded[foto_1]|max_size[foto_1,2048]|is_image[foto_1]',
            'foto_2' => 'max_size[foto_2,2048]|is_image[foto_2]',
            'foto_3' => 'max_size[foto_3,2048]|is_image[foto_3]',
            'foto_4' => 'max_size[foto_4,2048]|is_image[foto_4]',
            'foto_5' => 'max_size[foto_5,2048]|is_image[foto_5]',
            'tipe' => 'required',
        ], [
            'nama_produk' => [
                'required' => 'Nama produk wajib diisi'
            ],
            'harga_produk' => [
                'numeric' => 'Harga harus berupa angka'
            ],
            'deskripsi_produk' => [
                'required' => 'Deskripsi produk wajib diisi'
            ],
            'foto_1' => [
                'uploaded' => 'Foto produk 1 wajib diisi',
                'max_size' => 'Ukuran foto terlalu besar',
                'is_image' => 'File harus berupa gambar'
            ],
            'foto_2' => [
                'max_size' => 'Ukuran foto terlalu besar',
                'is_image' => 'File harus berupa gambar'
            ],
            'foto_3' => [
                'max_size' => 'Ukuran foto terlalu besar',
                'is_image' => 'File harus berupa gambar'
            ],
            'foto_4' => [
                'max_size' => 'Ukuran foto terlalu besar',
                'is_image' => 'File harus berupa gambar'
            ],
            'foto_5' => [
                'max_size' => 'Ukuran foto terlalu besar',
                'is_image' => 'File harus berupa gambar'
            ],
            'tipe' => [
                'required' => 'Tipe produk wajib diisi'
            ],
        ]);

        // Run validation
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('produk_errors', $validation->getErrors());
        }

        // Get user ID from session
        $userId = session()->get('user_id');

        // Handle file uploads
        $uploadedFiles = [];
        $photoFields = ['foto_1', 'foto_2', 'foto_3', 'foto_4', 'foto_5'];
        foreach ($photoFields as $field) {
            $file = $this->request->getFile($field);
            if ($file && $file->isValid() && !$file->hasMoved()) {
                $randomName = $file->getRandomName();
                $file->move('storage/photos', $randomName); // Save in 'storage/photos' directory
                $uploadedFiles[$field] = $randomName; // Store the random filename
            } else {
                $uploadedFiles[$field] = null; // No file uploaded for this field
            }
        }

        // Save product data
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

        // Redirect to product list with success message
        return redirect()->to('/user/profile')->with('success_produk', 'Produk berhasil ditambahkan');
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

        return redirect()->to('/user/profile')->with('success_produk', 'Produk berhasil diubah');
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