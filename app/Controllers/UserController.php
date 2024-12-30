<?php

namespace App\Controllers;

use App\Models\LegalitasModel;
use App\Models\UserModel;
use App\Models\PerusahaanModel;
use App\Models\ProdukModel;
use App\Models\SertifikatModel;
use App\Models\PengalamanPameranModel;
use App\Models\PengalamanEksporModel;
use App\Models\MediaPromosiModel;
use App\Models\ProgramPembinaanModel;
use App\Models\PencapaianEksporModel;
 // Tambahkan model pencapaian ekspor

class UserController extends BaseController
{
    // Dashboard
    public function dashboard()
    {
        $session = session();

        // Ambil user_id dari session
        $userId = $session->get('user_id');
        if (!$userId) {
            return redirect()->to('/login')->with('error', 'Harap login terlebih dahulu.');
        }

        // Instansiasi model
        $userModel = new UserModel();
        $perusahaanModel = new PerusahaanModel();

        // Ambil data pengguna dari database
        $user = $userModel->find($userId);

        if (!$user) {
            return redirect()->to('/login')->with('error', 'Data pengguna tidak ditemukan.');
        }

        // Ambil data perusahaan berdasarkan user_id
        $perusahaan = $perusahaanModel->getCompanyByUserId($userId);

        // Data yang akan dikirim ke view
        $userData = [
            'user' => $user,
            'perusahaan' => $perusahaan,
        ];

        // Return view
        return view('user/dashboard', $userData);
    }

    // Profile
    public function profile()
    {
        $session = session();

        // Ambil user_id dari session
        $userId = $session->get('user_id');
        if (!$userId) {
            return redirect()->to('/login')->with('error', 'Harap login terlebih dahulu.');
        }

        // Instansiasi model
        $userModel = new UserModel();
        $perusahaanModel = new PerusahaanModel();
        $legalitasModel = new LegalitasModel();
        $produkModel = new ProdukModel();
        $sertifikatModel = new SertifikatModel();
        $pameranModel = new PengalamanPameranModel();
        $eksporModel = new PengalamanEksporModel();
        $mediaPromosiModel = new MediaPromosiModel();
        $pembinaanModel = new ProgramPembinaanModel();
        $pencapaianEksporModel = new PencapaianEksporModel(); // Tambahkan model pencapaian ekspor

        // Ambil data pengguna dari database
        $user = $userModel->find($userId);

        if (!$user) {
            return redirect()->to('/login')->with('error', 'Data pengguna tidak ditemukan.');
        }

        $legalitas = $legalitasModel->getLegalitasByUserIdExceptRejected($userId);
        $perusahaan = $perusahaanModel->getCompanyByUserId($userId);
        $produk = $produkModel->getProdukByUserId($userId);
        $sertifikat = $sertifikatModel->getSertifikatByUserId($userId);
        $pameran = $pameranModel->getPameranByUserId($userId);
        $ekspor = $eksporModel->getEksporByUserId($userId);
        $mediaPromosi = $mediaPromosiModel->getMediaByUserId($userId);
        $pembinaan = $pembinaanModel->getPembinaanByUserId($userId);
        $pencapaianEkspor = $pencapaianEksporModel->getPencapaianByUserId($userId); // Ambil data pencapaian ekspor

        // Data yang akan dikirim ke view
        $userData = [
            'user' => $user,
            'perusahaan' => $perusahaan,
            'legalitas' => $legalitas,
            'produk' => $produk,
            'sertifikat' => $sertifikat,
            'pameran' => $pameran,
            'ekspor' => $ekspor,
            'mediaPromosi' => $mediaPromosi,
            'pembinaan' => $pembinaan,
            'pencapaianEkspor' => $pencapaianEkspor, // Kirim ke view
        ];

        // Return view
        return view('user/profile', $userData);
    }
}
