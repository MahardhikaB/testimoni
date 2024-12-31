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
        // dd($this->request->getPost());
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_produk' => 'required',
            'deskripsi_produk' => 'required',
            'harga_produk' => 'required',
            'foto_1' => 'max_size[foto_1,2048]|is_image[foto_1]',
            'foto_2' => 'max_size[foto_2,2048]|is_image[foto_2]',
            'foto_3' => 'max_size[foto_3,2048]|is_image[foto_3]',
            'foto_4' => 'max_size[foto_4,2048]|is_image[foto_4]',
            'foto_5' => 'max_size[foto_5,2048]|is_image[foto_5]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('produk_errors', $validation->getErrors());
        }

        $produkModel = new \App\Models\ProdukModel();
        $produk = $produkModel->find($id_produk);

        if (!$produk) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Produk dengan ID $id_produk tidak ditemukan.");
        }

        $userId = session()->get('user_id'); // Ambil ID user dari session

        $foto_1 = $this->request->getFile('foto_1');
        $foto_2 = $this->request->getFile('foto_2');
        $foto_3 = $this->request->getFile('foto_3');
        $foto_4 = $this->request->getFile('foto_4');
        $foto_5 = $this->request->getFile('foto_5');
        $photoFields = [$foto_1, $foto_2, $foto_3, $foto_4, $foto_5];
        $photoArray = ['foto_1', 'foto_2', 'foto_3', 'foto_4', 'foto_5'];
        $photoName = ['', '', '', '', ''];

        foreach ($photoFields as $key => $photo) {
            if($photo->getError() == 4) {
                $photoName[$key] = $this->request->getPost($photoArray[$key] . '_old');
            } else {
                if(!empty($this->request->getPost($photoArray[$key] . '_old'))) {
                    unlink('storage/photos/' . $this->request->getPost($photoArray[$key] . '_old'));
                }
                $photoName[$key] = $photo->getRandomName();
                $photo->move('storage/photos', $photoName[$key]);
            }
        }

        $produkModel->update($id_produk, [
            'nama_produk' => $this->request->getPost('nama_produk'),
            'deskripsi_produk' => $this->request->getPost('deskripsi_produk'),
            'harga_produk' => $this->request->getPost('harga_produk'),
            'foto_1' => $photoName[0],
            'foto_2' => $photoName[1],
            'foto_3' => $photoName[2],
            'foto_4' => $photoName[3],
            'foto_5' => $photoName[4],
            'status_verifikasi' => 'pending',
        ]);

        return redirect()->to('/user/profile')->with('success_produk', 'Produk berhasil diubah');
    }

    /**
     * Hapus produk.
     */
    public function delete($id_produk)
    {
        $produkModel = new \App\Models\ProdukModel();
        $produk = $produkModel->find($id_produk);

        if (!$produk) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Produk dengan ID $id_produk tidak ditemukan.");
        }

        if(!empty($produk['foto_1'])) {
            unlink('storage/photos/' . $produk['foto_1']);
        } 
        
        if (!empty($produk['foto_2'])) {
            unlink('storage/photos/' . $produk['foto_2']);
        }
        
        if (!empty($produk['foto_3'])) {
            unlink('storage/photos/' . $produk['foto_3']);
        } 
        
        if (!empty($produk['foto_4'])) {
            unlink('storage/photos/' . $produk['foto_4']);
        }
        
        if (!empty($produk['foto_5'])) {
            unlink('storage/photos/' . $produk['foto_5']);
        }

        $produkModel->delete($id_produk);

        return redirect()->to('/user/profile')->with('success_produk', 'Produk berhasil dihapus');
    }
}