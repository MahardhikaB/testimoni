<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PencapaianEksporModel;

class ProgressLainnyaController extends BaseController
{
    protected $pencapaianEksporModel;

    public function __construct()
    {
        $this->pencapaianEksporModel = new PencapaianEksporModel();
    }

    // Menampilkan semua data pencapaian ekspor
    public function index()
    {
        $pencapaianEkspor = $this->pencapaianEksporModel->getPencapaianByUserId(session()->get('user_id'));
        return view('progress_lainnya/index', [
            'pencapaianEkspor' => $pencapaianEkspor,
        ]);
    }

    public function create()
    {
        return view('progress_lainnya/add');
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
            'tanggal_ekspor' => 'required',
            'deskripsi' => 'required',
            'bukti_gambar' => 'uploaded[bukti_gambar]|max_size[bukti_gambar,4096]|ext_in[bukti_gambar,jpg,jpeg,png]',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fileBukti = $this->request->getFile('bukti_gambar');
        $namaFile = $fileBukti->getRandomName();
        $fileBukti->move('storage', $namaFile);

        $this->pencapaianEksporModel->insert([
            'user_id_ekspor' => $userId,
            'tanggal_ekspor' => $this->request->getPost('tanggal_ekspor'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'bukti_gambar' => $namaFile,
            'status_verifikasi' => 'pending',
        ]);

        return redirect()->to('user/profile')->with('success', 'Pencapaian ekspor berhasil ditambahkan dan sedang dalam proses verifikasi.');
    }

    public function edit($id)
    {
        $pencapaianEkspor = $this->pencapaianEksporModel->find($id);

        if (!$pencapaianEkspor) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Pencapaian ekspor dengan ID $id tidak ditemukan.");
        }

        return view('progress_lainnya/edit', [
            'pencapaianEkspor' => $pencapaianEkspor,
        ]);
    }

    public function update($id)
    {
        // Validasi input
        $validationRules = [
            'tanggal_ekspor' => 'required',
            'deskripsi' => 'required',
            'bukti_gambar' => 'max_size[bukti_gambar,4096]|ext_in[bukti_gambar,jpg,jpeg,png]',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fileBukti = $this->request->getFile('bukti_gambar');
        if ($fileBukti->getError() == 4) {
            $namaFile = $this->request->getPost('bukti_gambar_lama');
        } else {
            $namaFile = $fileBukti->getRandomName();
            $fileBukti->move('storage', $namaFile);

            // Hapus file lama
            $pencapaianEksporLama = $this->pencapaianEksporModel->find($id);
            if (!empty($pencapaianEksporLama['bukti_gambar'])) {
                unlink('storage/' . $pencapaianEksporLama['bukti_gambar']);
            }
        }

        $this->pencapaianEksporModel->update($id, [
            'tanggal_ekspor' => $this->request->getPost('tanggal_ekspor'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'bukti_gambar' => $namaFile,
            'status_verifikasi' => 'pending',
        ]);

        return redirect()->to('user/profile')->with('success', 'Pencapaian ekspor berhasil diperbarui dan sedang dalam proses verifikasi.');
    }

    public function delete($id)
    {
        $pencapaianEkspor = $this->pencapaianEksporModel->find($id);

        if (!$pencapaianEkspor) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Pencapaian ekspor dengan ID $id tidak ditemukan.");
        }

        if (!empty($pencapaianEkspor['bukti_gambar'])) {
            unlink('storage/' . $pencapaianEkspor['bukti_gambar']);
        }

        $this->pencapaianEksporModel->delete($id);

        return redirect()->to('user/profile')->with('success', 'Pencapaian ekspor berhasil dihapus.');
    }
}