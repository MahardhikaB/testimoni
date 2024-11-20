<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

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
            'harga_produk' => 'required',
            'ketersediaan_produk' => 'required',
            'tipe' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $produkModel = new \App\Models\ProdukModel();
        $produkModel->insert([
            // 'user_id_produk' => session()->get('user_id'),
            'user_id_produk' => 2,
            'nama_produk' => $this->request->getPost('nama_produk'),
            'deskripsi_produk' => $this->request->getPost('deskripsi_produk'),
            'harga_produk' => $this->request->getPost('harga_produk'),
            'ketersediaan_produk' => $this->request->getPost('ketersediaan_produk'),
            'tipe' => $this->request->getPost('tipe'),
        ]);

        return redirect()->to('/produk')->with('success', 'Produk berhasil ditambahkan');
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
            'ketersediaan_produk' => 'required',
            'tipe' => 'required',
        ]);
    
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
    
        $produkModel = new \App\Models\ProdukModel();
        $produkModel->update($id_produk, [
            'nama_produk' => $this->request->getPost('nama_produk'),
            'deskripsi_produk' => $this->request->getPost('deskripsi_produk'),
            'harga_produk' => $this->request->getPost('harga_produk'),
            'ketersediaan_produk' => $this->request->getPost('ketersediaan_produk'),
            'tipe' => $this->request->getPost('tipe'),
        ]);
    
        return redirect()->to('/produk')->with('success', 'Produk berhasil diubah');
    }
    
}
