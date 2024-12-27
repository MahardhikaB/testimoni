<?php
namespace App\Controllers;

use App\Models\ProgressModel;
use App\Models\PerusahaanModel;
use App\Models\PengalamanEksporModel;
use DateTime;

class ProgressController extends BaseController
{
    protected $progressModel;
    protected $perusahaanModel;
    protected $pengalamanEksporModel; 

    public function __construct()
    {
        $this->progressModel = new ProgressModel();
        $this->perusahaanModel = new PerusahaanModel();
        $this->pengalamanEksporModel = new PengalamanEksporModel(); 
    }

    public function index()
    {
        $userId = session()->get('user_id'); // Ambil user_id dari session
        if (!$userId) {
            return redirect()->to('/login')->with('error', 'Harap login terlebih dahulu.');
        }

        // Ambil data perusahaan berdasarkan user_id
        $perusahaan = $this->perusahaanModel->getCompanyByUserId($userId);

        if (!$perusahaan) {
            return redirect()->to('/user/profile')->with('error', 'Anda belum terdaftar pada perusahaan manapun.');
        }

        // Ambil data progress berdasarkan id_perusahaan
        $progressData = $this->progressModel->where('id_perusahaan', $perusahaan['id_perusahaan'])->findAll();

        $data = [
            'title' => 'Progress Dashboard',
            'progress' => $progressData,
        ];

        return view('progress/dashboard_progress', $data);
    }

    public function add(): string
    {
        return view('progress/add_progress');
    }

    public function save()
{
    $userId = session()->get('user_id');
    if (!$userId) {
        return redirect()->to('/login')->with('error', 'Harap login terlebih dahulu.');
    }

    // Check if the user belongs to a company
    $perusahaan = $this->perusahaanModel->getCompanyByUserId($userId);
    if (!$perusahaan) {
        return redirect()->to('/user/profile')->with('error', 'Anda belum terdaftar pada perusahaan manapun.');
    }

    // Get the id_progress (if any) from the post request
    $idProgress = $this->request->getPost('id_progress');

    // If there's an id_progress, we are updating, else we are adding a new record
    $progressData = [];
    if ($idProgress) {
        $progressData = $this->progressModel->find($idProgress);
        if (!$progressData || $progressData['id_perusahaan'] !== $perusahaan['id_perusahaan']) {
            return redirect()->to('/user/progress')->with('error', 'Data tidak ditemukan atau Anda tidak memiliki akses.');
        }
    }

    // Validation
    if (!$this->validate([
        'bukti_ekspor' => [
            'rules' => 'uploaded[bukti_ekspor]|max_size[bukti_ekspor,10240]|mime_in[bukti_ekspor,application/pdf]',
            'errors' => [
                'max_size' => 'Ukuran file bukti ekspor terlalu besar. Maksimal 10MB.',
                'mime_in' => 'File yang Anda pilih bukan PDF.',
                'uploaded' => 'Harap pilih file bukti ekspor.',
            ]
        ],
    ])) {
        // If validation fails, return the form with errors and old input
        return view('progress/add_progress', [
            'errors' => $this->validator->getErrors(),
            'old' => $this->request->getPost()
        ]);
    }

    // Process the export file
    $fileBukti = $this->request->getFile('bukti_ekspor');
    $namaBukti = $fileBukti->getRandomName();
    $fileBukti->move('bukti_ekspor', $namaBukti);

    // Process export date
    $tanggalEkspor = $this->request->getPost('tanggal');
    if ($tanggalEkspor) {
        $dateObject = DateTime::createFromFormat('d/m/Y', $tanggalEkspor);
        $tanggalEkspor = $dateObject->format('Y-m-d');
    }

    // Get export description
    $deskripsiEkspor = $this->request->getPost('deskripsi');

    // Prepare the data for save/update
    $dataToSave = [
        'user_id' => $userId,  // Menambahkan user_id
        'id_perusahaan' => $perusahaan['id_perusahaan'],
        'tanggal_ekspor' => $tanggalEkspor,
        'negara_ekspor' => $this->request->getPost('negara'),
        'jenis_ekspor' => $this->request->getPost('jenis'),
        'produk_ekspor' => $this->request->getPost('produk'),
        'nama_importir' => $this->request->getPost('nama_importir'),
        'nilai_ekspor_rp' => preg_replace('/[^0-9]/', '', $this->request->getPost('nilai_ekspor_rp')),
        'nilai_ekspor_usd' => preg_replace('/[^0-9]/', '', $this->request->getPost('nilai_ekspor_usd')),
        'kuantitas_ekspor' => preg_replace('/[^0-9]/', '', $this->request->getPost('kuantitas')),
        'bukti_ekspor' => $namaBukti,
        'deskripsi_ekspor' => $deskripsiEkspor,
    ];

    // If it's a new entry, save it
    if (!$idProgress) {
        if ($this->progressModel->save($dataToSave)) {
            // Save corresponding data in PengalamanEkspor table
            $this->pengalamanEksporModel->addFromProgress($dataToSave);

            session()->setFlashdata('success', value: 'Progress berhasil ditambahkan.');
            return redirect()->to('/user/progress');
        }
    } else {
        // If updating an existing entry
        $dataToSave['id'] = $idProgress;
        if ($this->progressModel->save($dataToSave)) {
            // Save corresponding data in PengalamanEkspor table
            $this->pengalamanEksporModel->addFromProgress($dataToSave);

            session()->setFlashdata('success', 'Progress berhasil diubah.');
            return redirect()->to('/user/progress');
        }
    }

    session()->setFlashdata('error', 'Terjadi kesalahan saat menyimpan data.');
    return redirect()->to('/user/progress');
}

    
    
    


public function edit($id)
{
    $userId = session()->get('user_id');
    $perusahaan = $this->perusahaanModel->getCompanyByUserId($userId);

    $progress = $this->progressModel->find($id);
    if (!$progress || $progress['id_perusahaan'] !== $perusahaan['id_perusahaan']) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException("Data tidak ditemukan atau Anda tidak memiliki akses.");
    }

    return view('progress/edit_progress', ['progress' => $progress]);
}

public function update($id)
{
    $userId = session()->get('user_id');
    $perusahaan = $this->perusahaanModel->getCompanyByUserId($userId);

    $fileBukti = $this->request->getFile('bukti_ekspor');
    $buktiLama = $this->request->getPost('fotoBuktiLama');

    if ($fileBukti->getError() == 4) {
        // Jika tidak ada file yang di-upload, gunakan file lama
        $namaBukti = $buktiLama;
    } else {
        // Validasi file agar hanya PDF
        if (!$this->validate([
            'bukti_ekspor' => [
                'rules' => 'uploaded[bukti_ekspor]|max_size[bukti_ekspor,2048]|mime_in[bukti_ekspor,application/pdf]',
                'errors' => [
                    'max_size' => 'Ukuran file bukti ekspor terlalu besar. Maksimal 2MB.',
                    'mime_in' => 'File yang Anda pilih bukan PDF.',
                    'uploaded' => 'Harap pilih file bukti ekspor.',
                ]
            ],
        ])) {
            // Jika validasi gagal, kembalikan dengan error dan data lama
            return view('progress/edit_progress', [
                'errors' => $this->validator->getErrors(),
            ]);
        }

        // Jika file valid, proses file PDF
        $namaBukti = $fileBukti->getRandomName();
        $fileBukti->move('bukti_ekspor', $namaBukti);

        // Hapus file lama jika ada
        if ($buktiLama) {
            unlink('bukti_ekspor/' . $buktiLama);
        }
    }

    // Proses tanggal ekspor
    $tanggalEkspor = $this->request->getPost('tanggal');
    if ($tanggalEkspor) {
        $dateObject = DateTime::createFromFormat('d-m-Y', $tanggalEkspor);
        $tanggalEkspor = $dateObject->format('Y-m-d');
    }

    // Ambil deskripsi ekspor
    $deskripsiEkspor = $this->request->getPost('deskripsi');

    // Simpan data progress
    $this->progressModel->save([
        'id' => $id,
        'id_perusahaan' => $perusahaan['id_perusahaan'],
        'tanggal_ekspor' => $tanggalEkspor,
        'negara_ekspor' => $this->request->getPost('negara'),
        'jenis_ekspor' => $this->request->getPost('jenis'),
        'produk_ekspor' => $this->request->getPost('produk'),
        'nama_importir' => $this->request->getPost('nama_importir'),
        'nilai_ekspor_rp' => $this->request->getPost('nilai_ekspor_rp'),
        'nilai_ekspor_usd' => $this->request->getPost('nilai_ekspor_usd'),
        'kuantitas_ekspor' => $this->request->getPost('kuantitas'),
        'bukti_ekspor' => $namaBukti,
        'deskripsi_ekspor' => $deskripsiEkspor,  // Menambahkan deskripsi ekspor
    ]);

    session()->setFlashdata('success', 'Progress berhasil diubah.');
    return redirect()->to('/user/progress');
}



    public function detail($id): string
    {
        $userId = session()->get('user_id');
        $perusahaan = $this->perusahaanModel->getCompanyByUserId($userId);

        $progress = $this->progressModel
            ->where('id', $id)
            ->where('id_perusahaan', $perusahaan['id_perusahaan'])
            ->first();

        if (!$progress) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Data tidak ditemukan atau Anda tidak memiliki akses.");
        }

        return view('progress/detail_progress', ['progress' => $progress]);
    }
}
