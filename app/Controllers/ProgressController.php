<?php

namespace App\Controllers;

use DateTime;


class ProgressController extends BaseController
{

    protected $progressModel;

    public function __construct()
    {
        $this->progressModel = new \App\Models\ProgressModel();
        helper('form');
    }
    
    public function index(): string
    {
        $data['progress'] = $this->progressModel->findAll();
        return view('progress/dashboard_progress', $data);
    }

    public function save() {
        
        if(!$this->validate([
            'bukti_ekspor' => [
                'rules' => 'uploaded[bukti_ekspor]|max_size[bukti_ekspor,2048]|is_image[bukti_ekspor]|mime_in[bukti_ekspor,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar bukti ekspor terlalu besar.',
                    'is_image' => 'Yang anda pilih bukan gambar.',
                    'mime_in' => 'Yang anda pilih bukan gambar.'
                ]
            ],
        ])) {
            return view('progress/add_progress', [
                'errors' => $this->validator->getErrors(),
            ]);
        }

        $fileBukti = $this->request->getFile('bukti_ekspor');
        
        $namaBukti = $fileBukti->getRandomName();
        
        $fileBukti->move('bukti_ekspor', $namaBukti);

        $tanggalEkspor = $this->request->getPost('tanggal');

        if($tanggalEkspor != null){
            $dateObject = DateTime::createFromFormat('d/m/Y', $tanggalEkspor);
            $tanggalEkspor = $dateObject->format('Y-m-d');
        }

        if($this->progressModel->save([
            'id_perusahaan' => 1,
            'tanggal_ekspor' => $tanggalEkspor,
            'negara_ekspor' => $this->request->getPost('negara'),
            'jenis_ekspor' => $this->request->getPost('jenis'),
            'produk_ekspor' => $this->request->getPost('produk'),
            'nama_importir' => $this->request->getPost('nama_importir'),
            'nilai_ekspor_rp' => $this->request->getPost('nilai_ekspor_rp'),
            'nilai_ekspor_usd' => $this->request->getPost('nilai_ekspor_usd'),
            'kuantitas_ekspor' => $this->request->getPost('kuantitas'),
            'bukti_ekspor' => $namaBukti
        ]) == false){
            unlink('bukti_ekspor/' . $namaBukti);
            return view('progress/add_progress', ['errors' => $this->progressModel->errors()]);
        }

        session()->setFlashdata('message', 'Progress berhasil ditambahkan.');

        return redirect()->to('user/progress');
    }

    public function add(): string
    {
        return view('progress/add_progress');
    }

    public function edit($id): string
    {
                // Membuat instance dari model ProgressModel
        
                // Mengambil data berdasarkan ID
                $data['progress'] = $this->progressModel->getProgress($id);  // Mengambil satu data berdasarkan ID
                
                // Pastikan data ditemukan, jika tidak, tampilkan error atau redirect
                if (empty($data['progress'])) {
                    throw new \CodeIgniter\Exceptions\PageNotFoundException("Data tidak ditemukan.");
                }
        return view('progress/edit_progress',$data);
    }

    public function detail($id): string
    {
        
        // Mengambil data berdasarkan ID
        $data['progress'] = $this->progressModel->getProgress($id);  // Mengambil satu data berdasarkan ID
        // Pastikan data ditemukan, jika tidak, tampilkan error atau redirect
        if (empty($data['progress'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Data tidak ditemukan.");
        }
        return view('progress/detail_progress',$data);
    }

    
    public function update($id)
    {
        $fileBukti = $this->request->getFile('bukti_ekspor');
        $buktiLama = $this->request->getPost('fotoBuktiLama');
        
        if ($fileBukti->getError() == 4) {
            $namaBukti = $buktiLama;
        } else {
            if(!$this->validate([
                'bukti_ekspor' => [
                    'rules' => 'uploaded[bukti_ekspor]|max_size[bukti_ekspor,2048]|is_image[bukti_ekspor]|mime_in[bukti_ekspor,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'Ukuran gambar bukti ekspor terlalu besar.',
                        'is_image' => 'Yang anda pilih bukan gambar.',
                        'mime_in' => 'Yang anda pilih bukan gambar.'
                    ]
                ],
            ])) {
                return view('/progress/edit_progress', [
                    'progress' => $this->progressModel->getProgress($id),
                    'errors' => $this->validator->getErrors(),
                ]);
            }   
            $namaBukti = $fileBukti->getRandomName();
            $fileBukti->move('bukti_ekspor', $namaBukti);
        }
        
        $tanggalEkspor = $this->request->getPost('tanggal');

        if($tanggalEkspor != null){
            $dateObject = DateTime::createFromFormat('d-m-Y', $tanggalEkspor);
            $tanggalEkspor = $dateObject->format('Y-m-d');
        }

        if($this->progressModel->save([
            'id' => $id,
            'id_perusahaan' => 1,
            'tanggal_ekspor' => $tanggalEkspor,
            'negara_ekspor' => $this->request->getPost('negara'),
            'jenis_ekspor' => $this->request->getPost('jenis'),
            'produk_ekspor' => $this->request->getPost('produk'),
            'nama_importir' => $this->request->getPost('nama_importir'),
            'nilai_ekspor_rp' => $this->request->getPost('nilai_ekspor_rp'),
            'nilai_ekspor_usd' => $this->request->getPost('nilai_ekspor_usd'),
            'kuantitas_ekspor' => $this->request->getPost('kuantitas'),
            'bukti_ekspor' => $namaBukti
        ]) == false){
            if($namaBukti != $buktiLama){
                unlink('bukti_ekspor/' . $namaBukti);
            }
            return view('progress/edit_progress', ['progress' => $this->progressModel->getProgress($id), 'errors' => $this->progressModel->errors()]);
        } else {
            unlink('bukti_ekspor/' . $buktiLama);
        }

        session()->setFlashdata('message', 'Progress berhasil diubah.');

        return redirect()->to('/user/progress');
    }
}