<?php

namespace App\Controllers;

use App\Models\PencapaianEksporModel;
use CodeIgniter\Controller;

class PencapaianEksporController extends Controller
{
    // Menampilkan daftar pencapaian ekspor untuk pengguna tertentu
    public function index()
    {
        // Ambil session user_id
        $session = session();
        $userId = $session->get('user_id');

        if (!$userId) {
            return redirect()->to('/login')->with('error', 'Harap login terlebih dahulu.');
        }

        // Instansiasi model
        $pencapaianEksporModel = new PencapaianEksporModel();

        // Ambil data pencapaian ekspor berdasarkan user_id
        $pencapaianEkspor = $pencapaianEksporModel->getByUserId($userId);

        // Kirim data ke view
        return view('pencapaian_ekspor/index', [
            'pencapaianEkspor' => $pencapaianEkspor,
        ]);
    }

    // Menampilkan data pencapaian ekspor berdasarkan status verifikasi
    public function status($status)
    {
        // Validasi status verifikasi yang diperbolehkan
        $validStatuses = ['pending', 'verified', 'rejected'];
        if (!in_array($status, $validStatuses)) {
            return redirect()->to('/pencapaian-ekspor')->with('error', 'Status tidak valid.');
        }

        // Ambil session user_id
        $session = session();
        $userId = $session->get('user_id');

        if (!$userId) {
            return redirect()->to('/login')->with('error', 'Harap login terlebih dahulu.');
        }

        // Instansiasi model
        $pencapaianEksporModel = new PencapaianEksporModel();

        // Ambil data pencapaian ekspor berdasarkan status verifikasi
        $pencapaianEkspor = $pencapaianEksporModel->getByStatus($status);

        // Kirim data ke view
        return view('pencapaian_ekspor/status', [
            'status' => $status,
            'pencapaianEkspor' => $pencapaianEkspor,
        ]);
    }

    // Menampilkan detail pencapaian ekspor berdasarkan id
    public function detail($id)
    {
        // Instansiasi model
        $pencapaianEksporModel = new PencapaianEksporModel();

        // Ambil data pencapaian ekspor berdasarkan id
        $pencapaianEkspor = $pencapaianEksporModel->getWithUserDetails($id);

        // Jika data tidak ditemukan
        if (!$pencapaianEkspor) {
            return redirect()->to('/pencapaian-ekspor')->with('error', 'Data pencapaian ekspor tidak ditemukan.');
        }

        // Kirim data ke view
        return view('pencapaian_ekspor/detail', [
            'pencapaianEkspor' => $pencapaianEkspor,
        ]);
    }
}
