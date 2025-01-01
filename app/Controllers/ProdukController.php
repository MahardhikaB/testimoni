<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ProdukController extends BaseController
{
    public function index()
    {
        $produkModel = new \App\Models\ProdukModel();
        $produk = $produkModel->findAll();

        return view('produk/index', [
            'produk' => $produk,
        ]);
    }

    public function create()
    {
        return view('produk/add_produk');
    }

    public function store()
    {
        $validation = \Config\Services::validation();

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

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('produk_errors', $validation->getErrors());
        }

        $userId = session()->get('user_id');

        $uploadedFiles = [];
        $photoFields = ['foto_1', 'foto_2', 'foto_3', 'foto_4', 'foto_5'];
        foreach ($photoFields as $field) {
            $file = $this->request->getFile($field);
            if ($file && $file->isValid() && !$file->hasMoved()) {
                $randomName = $file->getRandomName();
                $file->move('storage/photos', $randomName);
                $uploadedFiles[$field] = $randomName;
            } else {
                $uploadedFiles[$field] = null;
            }
        }

        $produkModel = new \App\Models\ProdukModel();
        $tipe = $this->request->getPost('tipe');

        if($tipe == '0'){
            $produkModel->insert([
                'user_id_produk' => $userId,
                'nama_produk' => $this->request->getPost('nama_produk'),
                'deskripsi_produk' => $this->request->getPost('deskripsi_produk'),
                'harga_produk' => $this->request->getPost('harga_produk'),
                'tipe' => '0',
                'foto_1' => $uploadedFiles['foto_1'],
                'foto_2' => $uploadedFiles['foto_2'],
                'foto_3' => $uploadedFiles['foto_3'],
                'foto_4' => $uploadedFiles['foto_4'],
                'foto_5' => $uploadedFiles['foto_5'],
            ]);
            $produkModel->insert([
                'user_id_produk' => $userId,
                'nama_produk' => $this->request->getPost('nama_produk'),
                'deskripsi_produk' => $this->request->getPost('deskripsi_produk'),
                'harga_produk' => $this->request->getPost('harga_produk'),
                'tipe' => '1',
                'foto_1' => $uploadedFiles['foto_1'],
                'foto_2' => $uploadedFiles['foto_2'],
                'foto_3' => $uploadedFiles['foto_3'],
                'foto_4' => $uploadedFiles['foto_4'],
                'foto_5' => $uploadedFiles['foto_5'],
            ]);
        } else if ($tipe == '1'){
            $produkModel->insert([
                'user_id_produk' => $userId,
                'nama_produk' => $this->request->getPost('nama_produk'),
                'deskripsi_produk' => $this->request->getPost('deskripsi_produk'),
                'harga_produk' => $this->request->getPost('harga_produk'),
                'tipe' => $tipe,
                'foto_1' => $uploadedFiles['foto_1'],
                'foto_2' => $uploadedFiles['foto_2'],
                'foto_3' => $uploadedFiles['foto_3'],
                'foto_4' => $uploadedFiles['foto_4'],
                'foto_5' => $uploadedFiles['foto_5'],
            ]);
        }
        
        return redirect()->to('/user/profile')->with('success_produk', 'Produk berhasil ditambahkan');
    }

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

    public function update($id_produk)
    {
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

        $foto_1 = $this->request->getFile('foto_1');
        $foto_2 = $this->request->getFile('foto_2');
        $foto_3 = $this->request->getFile('foto_3');
        $foto_4 = $this->request->getFile('foto_4');
        $foto_5 = $this->request->getFile('foto_5');
        $photoFields = [$foto_1, $foto_2, $foto_3, $foto_4, $foto_5];
        $photoArray = ['foto_1', 'foto_2', 'foto_3', 'foto_4', 'foto_5'];
        $photoName = ['', '', '', '', ''];

        foreach ($photoFields as $key => $photo) {
            $photoTemp = $this->request->getPost($photoArray[$key] . '_old');
            if($photo->getError() == 4) {
                $photoName[$key] = $photoTemp;
            } else {
                if(!empty($photoTemp)) {
                    if(!$produkModel->isDoubleFotoProduk($photoTemp, $photoArray[$key]) && 
                        file_exists('storage/photos/' . $photoTemp)){
                        unlink('storage/photos/' . $photoTemp);
                    }
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

    public function delete($id_produk)
    {
        $produkModel = new \App\Models\ProdukModel();
        $produk = $produkModel->find($id_produk);

        if (!$produk) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Produk dengan ID $id_produk tidak ditemukan.");
        }

        $photoFields = ['foto_1', 'foto_2', 'foto_3', 'foto_4', 'foto_5'];

        foreach ($photoFields as $field) {
            if (!empty($produk[$field]) && 
                !$produkModel->isDoubleFotoProduk($produk[$field], $field) && 
                file_exists('storage/photos/' . $produk[$field])){
                    unlink('storage/photos/' . $produk[$field]);
            }
        }

        $produkModel->delete($id_produk);

        return redirect()->to('/user/profile')->with('success_produk', 'Produk berhasil dihapus');
    }
}