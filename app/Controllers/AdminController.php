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
use App\Models\PencapaianEksporModel;

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
    protected $pencapaianEksporModel;

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
        $this->pencapaianEksporModel = new PencapaianEksporModel();
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

        if (!in_array($tipe, ['legalitas', 'produk', 'sertifikat', 'pengalaman-pameran', 'pengalaman-ekspor', 'media-promosi', 'program-pembinaan', 'verifikasi-user', 'lainnya'])) {
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
            } else if ($tipe == 'verifikasi-user') {
                $verifikasiData = $this->userModel->getUnverifiedUser();
            } else if ($tipe == 'lainnya') {
                $verifikasiData = $this->pencapaianEksporModel->getUnverifiedLainnya();
            }
        }

        return view('admin/member/verifikasi', [
            'user' => $userData,
            'verifikasiData' => $verifikasiData,
            'section' => $tipe,
            'tipeTitle' => $tipeTitle
        ]);
    }
    
    public function updateVerifikasi(){
        if(!$this->validate([
            'aksi' => [
                'rules' => 'required|in_list[accepted,rejected]',
                'errors' => [
                    'required' => 'Aksi harus ada.'
                ]
            ],
            'section' => [
                'rules' => 'required|in_list[legalitas,produk,sertifikat,pengalaman-pameran,pengalaman-ekspor,media-promosi,program-pembinaan,verifikasi-user,lainnya]',
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
        $controller = $this->getControllerBySection($section);

        if($aksi == 'accepted'){
            $hasil = $model->updateVerifikasi($id, $aksi);
        } else if($aksi == 'rejected'){
            $hasil = $controller->delete($id);
        }

        // dd($hasil);

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
            case 'verifikasi-user':
                $model = $this->userModel;
                break;
            case 'lainnya':
                $model = $this->pencapaianEksporModel;
                break;    
        }

        return $model;
    }

    public function getControllerBySection($section){
        $controller = null;
        switch($section){
            case 'legalitas':
                $controller = new LegalitasController();
                break;
            case 'produk':
                $controller = new ProdukController();
                break;
            case 'sertifikat':
                $controller = new SertifikatController();
                break;
            case 'pengalaman-pameran':
                $controller = new PameranController();
                break;
            case 'pengalaman-ekspor':
                $controller = new EksporController();
                break;
            case 'media-promosi':
                $controller = new MediaController();
                break;
            case 'program-pembinaan':
                $controller = new ProgramController();
                break;
            case 'verifikasi-user':
                $controller = new UserController();
                break;
            case 'lainnya':
                $controller = new ProgressLainnyaController();
                break;
        }

        return $controller;
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