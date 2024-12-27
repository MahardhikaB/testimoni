<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PengalamanEksporModel;
use CodeIgniter\HTTP\ResponseInterface;

class EksporController extends BaseController
{
    public function index()
    {
        $eksporModel = new PengalamanEksporModel();
        $ekspor = $eksporModel->getEksporByUserId(session()->get('user_id'));

        return view('ekspor/index', [
            'ekspor' => $ekspor,
        ]);
    }

    public function create()
    {
        return view('ekspor/add_ekspor');
    }

    public function store()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'negara_tujuan' => 'required',
            'tanggal' => 'required|valid_date',
            'produk_ekspor' => 'required',
            'deskripsi_ekspor' => 'required',
            'kuantitas' => 'required|integer',
            'nilai' => 'required|numeric',
            'bukti_ekspor' => 'uploaded[bukti_ekspor]|max_size[bukti_ekspor,4096]|ext_in[bukti_ekspor,pdf]'
        ], [
            'negara_tujuan' => [
                'required' => 'Negara tujuan harus diisi.'
            ],
            'tanggal' => [
                'required' => 'Tanggal harus diisi.',
                'valid_date' => 'Tanggal tidak valid.'
            ],
            'bukti_ekspor' => [
                'uploaded' => 'File bukti ekspor harus diupload.',
                'max_size' => 'Ukuran file maksimal 4MB.',
                'ext_in' => 'File harus berformat PDF.'
            ],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $fileBukti = $this->request->getFile('bukti_ekspor');
        if ($fileBukti->isValid() && !$fileBukti->hasMoved()) {
            $namaFile = $fileBukti->getRandomName();
            $fileBukti->move('storage', $namaFile);

            $eksporModel = new PengalamanEksporModel();
            $eksporModel->insert([
                'user_id_ekspor' => session()->get('user_id'),
                'negara_tujuan' => $this->request->getPost('negara_tujuan'),
                'tanggal' => $this->request->getPost('tanggal'),
                'produk_ekspor' => $this->request->getPost('produk_ekspor'),
                'deskripsi_ekspor' => $this->request->getPost('deskripsi_ekspor'),
                'kuantitas' => $this->request->getPost('kuantitas'),
                'nilai' => $this->request->getPost('nilai'),
                'status_verifikasi' => 'pending',
                'bukti_ekspor' => $namaFile,
            ]);

            return redirect()->to('user/profile')->with('success', 'Pengalaman ekspor berhasil ditambahkan dan sedang dalam proses verifikasi.');
        } else {
            return redirect()->back()->withInput()->with('errors', ['bukti_ekspor' => 'File bukti ekspor tidak valid.']);
        }
    }

    public function edit($id_ekspor)
    {
        $eksporModel = new PengalamanEksporModel();
        $ekspor = $eksporModel->find($id_ekspor);

        if (!$ekspor) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Ekspor dengan ID $id_ekspor tidak ditemukan.");
        }

        return view('ekspor/edit_ekspor', [
            'ekspor' => $ekspor,
        ]);
    }

    public function update($id_ekspor)
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'negara_tujuan' => 'required',
            'tanggal' => 'required|valid_date',
            'produk_ekspor' => 'required',
            'deskripsi_ekspor' => 'required',
            'kuantitas' => 'required|integer',
            'nilai' => 'required|numeric',
        ], [
            'negara_tujuan' => [
                'required' => 'Negara tujuan harus diisi.'
            ],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $eksporModel = new PengalamanEksporModel();
        $data = [
            'negara_tujuan' => $this->request->getPost('negara_tujuan'),
            'tanggal' => $this->request->getPost('tanggal'),
            'produk_ekspor' => $this->request->getPost('produk_ekspor'),
            'deskripsi_ekspor' => $this->request->getPost('deskripsi_ekspor'),
            'kuantitas' => $this->request->getPost('kuantitas'),
            'nilai' => $this->request->getPost('nilai'),
        ];

        if ($this->request->getFile('bukti_ekspor')->isValid()) {
            $fileBukti = $this->request->getFile('bukti_ekspor');
            $namaFile = $fileBukti->getRandomName();
            $fileBukti->move('storage', $namaFile);
            $data['bukti_ekspor'] = $namaFile;
        }

        $eksporModel->update($id_ekspor, $data);

        return redirect()->to('user/profile')->with('success', 'Pengalaman ekspor berhasil diperbarui.');
    }

    public function delete($id_ekspor)
    {
        $eksporModel = new PengalamanEksporModel();
        $ekspor = $eksporModel->find($id_ekspor);

        if (!$ekspor) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Ekspor dengan ID $id_ekspor tidak ditemukan.");
        }

        if (!empty($ekspor['bukti_ekspor'])) {
            unlink('storage/' . $ekspor['bukti_ekspor']);
        }

        $eksporModel->delete($id_ekspor);

        return redirect()->to('user/profile')->with('success', 'Pengalaman ekspor berhasil dihapus.');
    }

    public function unverified()
    {
        $eksporModel = new PengalamanEksporModel();
        $unverifiedEkspor = $eksporModel->getUnverifiedEkspor();

        return view('ekspor/unverified', [
            'ekspor' => $unverifiedEkspor,
        ]);
    }
}
