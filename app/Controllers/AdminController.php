<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LegalitasModel;
use App\Models\MediaPromosiModel;
use App\Models\PengalamanEksporModel;
use App\Models\PengalamanPameranModel;
use App\Models\ProdukModel;
use App\Models\ProgramPembinaanModel;
use App\Models\SertifikatModel;
use App\Models\UserModel;

class AdminController extends BaseController
{

    protected $userModel;
    protected $legalitasModel;
    protected $produkModel;
    protected $sertifikatModel;
    protected $pengalamanPameranModel;
    protected $pengalamanEksporModel;
    protected $mediaPromosiModel;
    protected $programPembinaanModel;

    public function __construct()
    {
        $this->legalitasModel = new LegalitasModel();
        $this->produkModel = new ProdukModel();
        $this->sertifikatModel = new SertifikatModel();
        $this->userModel = new UserModel();
        $this->pengalamanPameranModel = new PengalamanPameranModel();
        $this->pengalamanEksporModel = new PengalamanEksporModel();
        $this->mediaPromosiModel = new MediaPromosiModel();
        $this->programPembinaanModel = new ProgramPembinaanModel();
        helper('form');
    }

    public function dashboard()
    {
        $session = session();
        $userData = [
            'nama_user' => $session->get('nama_user'),
            'role' => $session->get('role'),
            'mainSection' => '',
            'title' => 'Admin | Dashboard'
        ];

        return view('admin/dashboard', ['user' => $userData, 'section' => 'dashboard']);
    }

    public function verifikasi($tipe = null)
    {
        // dd($tipe);
        $session = session();
        $tipeTitle = '';
        if(strlen($tipe) > 10){
            $tipeTitle = explode('-', $tipe);
            $tipeTitle = array_map(function($tipe){
                return strtoupper(substr($tipe, 0, 1)) . substr($tipe, 1);
            }, $tipeTitle);
            $tipeTitle = implode(' ', $tipeTitle);
        } else {
            $tipeTitle = strtoupper(substr($tipe, 0, 1)) . substr($tipe, 1);
        }
        $userData = [
            'nama_user' => $session->get('nama_user'),
            'role' => $session->get('role'),
            'mainSection' => 'verifikasi',
            'title' => 'Admin | Verifikasi ' . $tipeTitle . ' Member'
        ];

        $verifikasiData = [];

        if (!in_array($tipe, ['legalitas', 'produk', 'sertifikat', 'pengalaman-pameran', 'pengalaman-ekspor', 'media-promosi', 'program-pembinaan'])) {
            return redirect()->back()->with('error', 'Tipe verifikasi tidak valid.');
        } else {
            if ($tipe == 'legalitas') {
                $verifikasiData = $this->legalitasModel->getUnverifiedLegalitas();
            } else if ($tipe == 'produk') {
                $verifikasiData = $this->produkModel->getUnverifiedProduk();
            } else if ($tipe == 'sertifikat') {
                $verifikasiData = $this->sertifikatModel->getUnverifiedSertifikat();
            } else if ($tipe == 'pengalaman-pameran') {
                $verifikasiData = $this->pengalamanPameranModel->getUnverifiedPameran();
            } else if ($tipe == 'pengalaman-ekspor') {
                $verifikasiData = $this->pengalamanEksporModel->getUnverifiedEkspor();
            } else if ($tipe == 'media-promosi') {
                $verifikasiData = $this->mediaPromosiModel->getUnverifiedMedia();
            } else if ($tipe == 'program-pembinaan') {
                $verifikasiData = $this->programPembinaanModel->getUnverifiedProgramPembinaan();
            }
        }

        // Kirim data pengguna dan sertifikat ke tampilan
        return view('admin/member/verifikasi', [
            'user' => $userData,
            'verifikasiData' => $verifikasiData,
            'section' => $tipe,
            'tipeTitle' => $tipeTitle
        ]);
    }
//     public function updateVerifikasi($id, $status)
// {

//     log_message('info', "updateVerifikasi called with ID: {$id}, Status: {$status}");

//     $sertifikatModel = new SertifikatModel();

//     // Pastikan status valid
//     if (!in_array($status, ['accepted', 'rejected'])) {
//         log_message('error', "Invalid status: {$status}");
//         return redirect()->back()->with('error', 'Status tidak valid.');
//     }

//     // Periksa apakah ID ada di database
//     $sertifikat = $sertifikatModel->find($id);
//     if (!$sertifikat) {
//         log_message('error', "Sertifikat with ID {$id} not found");
//         return redirect()->back()->with('error', 'Sertifikat tidak ditemukan.');
//     }

//     // Update status
//     $update = $sertifikatModel->update($id, ['status_verifikasi' => $status]);
//     if (!$update) {
//         log_message('error', "Failed to update status for ID: {$id}");
//         return redirect()->back()->with('error', 'Gagal memperbarui status verifikasi.');
//     }

//     log_message('info', "Status updated successfully for ID: {$id}");
//     return redirect()->to('/admin/dashboard/verifikasi')->with('success', 'Status verifikasi berhasil diperbarui.');
// }

    public function updateVerifikasi(){
        // dd($this->request->getVar('id') . ', ' . $this->request->getVar('aksi') . ', ' . $this->request->getVar('section'));
        if(!$this->validate([
            'aksi' => [
                'rules' => 'required|in_list[terima,tolak]',
                'errors' => [
                    'required' => 'Aksi harus ada.'
                ]
            ],
            'section' => [
                'rules' => 'required|in_list[legalitas,produk,sertifikat,pengalaman-pameran,pengalaman-ekspor,media-promosi,program-pembinaan]',
                'errors' => [
                    'required' => 'Section harus ada.'
                ]
                ],
            'id' => [
                'rules' => 'required|numeric|if_exist',
                'errors' => [
                    'required' => 'ID harus ada.',
                    'numeric' => 'ID harus berupa angka.',
                    'if_exist' => 'ID tidak ditemukan.'
                ]
            ]
        ])){
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $id = $this->request->getVar('id');
        $aksi = $this->request->getVar('aksi');
        $section = $this->request->getVar('section');

        $model = $this->getModelBySection($section);
        $hasil = $model->updateVerifikasi($id, $aksi);

        dd($hasil);

        if(!$hasil){
            return redirect()->back()->with('error', 'Gagal memperbarui status verifikasi.');
        }else {
            return redirect()->back()->with('success', 'Status verifikasi berhasil diperbarui.');
        }
    }

    public function getModelBySection($section){
        $model = null;
        switch($section){
            case 'legalitas':
                $model = $this->legalitasModel;
                break;
            case 'produk':
                $model = $this->produkModel;
                break;
            case 'sertifikat':
                $model = $this->sertifikatModel;
                break;
            case 'pengalaman-pameran':
                $model = $this->pengalamanPameranModel;
                break;
            case 'pengalaman-ekspor':
                $model = $this->pengalamanEksporModel;
                break;
            case 'media-promosi':
                $model = $this->mediaPromosiModel;
                break;
            case 'program-pembinaan':
                $model = $this->programPembinaanModel;
                break;
        }

        return $model;
    }

    public function memberList(){
        $session = session();
        
        $users = $this->userModel->getUsersListWithPerusahaan();

        return view('admin/member/list', [
            'user' => [
                'nama_user' => $session->get('nama_user'),
                'role' => $session->get('role'),
                'mainSection' => 'member',
                'title' => 'Admin | List Member'
            ],
            'users' => $users,
            'section' => 'list-member'
        ]);
    }

    
}