<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SertifikatModel;

class AdminController extends BaseController
{
    public function dashboard()
    {
        $session = session();
        $userData = [
            'nama_user' => $session->get('nama_user'),
            'role' => $session->get('role'),
            'section' => 'dashboard',
            'title' => 'Admin | Dashboard'
        ];

        return view('admin/dashboard', ['user' => $userData]);
    }

    public function detail() {
        $session = session();
        $userData = [
            'nama_user' => $session->get('nama_user'),
            'role' => $session->get('role'),
            'section' => 'detail',
            'title' => 'Admin | Detail Member'
        ];
        return view('admin/member/detail', ['user' => $userData]);
    }

    public function verifikasi()
    {
        $session = session();
        $userData = [
            'nama_user' => $session->get('nama_user'),
            'role' => $session->get('role'),
            'section' => 'member-verifikasi', // Penanda untuk sidebar
            'title' => 'Admin | Verifikasi Upload Member'
        ];

        // Ambil data sertifikat dengan status 'waiting'
        $sertifikatModel = new SertifikatModel();
        $sertifikat = $sertifikatModel->where('status_verifikasi', 'waiting')->findAll();

        // Kirim data pengguna dan sertifikat ke tampilan
        return view('admin/member/verifikasi', [
            'user' => $userData,
            'sertifikat' => $sertifikat,
        ]);
    }
    public function updateVerifikasi($id, $status)
{
    log_message('info', "updateVerifikasi called with ID: {$id}, Status: {$status}");

    $sertifikatModel = new SertifikatModel();

    // Pastikan status valid
    if (!in_array($status, ['accepted', 'rejected'])) {
        log_message('error', "Invalid status: {$status}");
        return redirect()->back()->with('error', 'Status tidak valid.');
    }

    // Periksa apakah ID ada di database
    $sertifikat = $sertifikatModel->find($id);
    if (!$sertifikat) {
        log_message('error', "Sertifikat with ID {$id} not found");
        return redirect()->back()->with('error', 'Sertifikat tidak ditemukan.');
    }

    // Update status
    $update = $sertifikatModel->update($id, ['status_verifikasi' => $status]);
    if (!$update) {
        log_message('error', "Failed to update status for ID: {$id}");
        return redirect()->back()->with('error', 'Gagal memperbarui status verifikasi.');
    }

    log_message('info', "Status updated successfully for ID: {$id}");
    return redirect()->to('/admin/dashboard/verifikasi')->with('success', 'Status verifikasi berhasil diperbarui.');
}

    
}
