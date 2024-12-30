<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProgramPembinaanModel;
use CodeIgniter\HTTP\ResponseInterface;

class ProgramController extends BaseController
{
    public function index()
    {
        $programModel = new ProgramPembinaanModel();
        $programs = $programModel->getAllProgramsByUserId(session()->get('user_id'));

        return view('user/profile', [
            'programs' => $programs,
        ]);
    }

    public function create()
    {
        return view('program/add_program');
    }

    public function store()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_program' => 'required',
            'tahun_program' => 'required|numeric',
            'penyelenggara_program' => 'required',
            'deskripsi_program' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $programModel = new ProgramPembinaanModel();
        $programModel->insert([
            'user_id_pembinaan' => session()->get('user_id'),
            'nama_program' => $this->request->getPost('nama_program'),
            'tahun_program' => $this->request->getPost('tahun_program'),
            'penyelenggara_program' => $this->request->getPost('penyelenggara_program'),
            'deskripsi_program' => $this->request->getPost('deskripsi_program'),
            'status_verifikasi' => 'pending',
        ]);

        return redirect()->to('user/profile')->with('success', 'Program berhasil ditambahkan dan sedang dalam proses verifikasi.');
    }

    public function edit($id_program)
    {
        $programModel = new ProgramPembinaanModel();
        $program = $programModel->find($id_program);

        if (!$program) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Program dengan ID $id_program tidak ditemukan.");
        }

        return view('program/edit_program', [
            'program' => $program,
        ]);
    }

    public function update($id_program)
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_program' => 'required',
            'tahun_program' => 'required|numeric',
            'penyelenggara_program' => 'required',
            'deskripsi_program' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $programModel = new ProgramPembinaanModel();
        $data = [
            'nama_program' => $this->request->getPost('nama_program'),
            'tahun_program' => $this->request->getPost('tahun_program'),
            'penyelenggara_program' => $this->request->getPost('penyelenggara_program'),
            'deskripsi_program' => $this->request->getPost('deskripsi_program'),
        ];

        $programModel->update($id_program, $data);

        return redirect()->to('user/profile')->with('success', 'Program berhasil diubah.');
    }

    public function delete($id_program)
    {
        $programModel = new ProgramPembinaanModel();
        $program = $programModel->find($id_program);

        if (!$program) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Program dengan ID $id_program tidak ditemukan.");
        }

        $programModel->delete($id_program);

        return redirect()->to('user/profile')->with('success', 'Program berhasil dihapus.');
    }

    public function unverified()
    {
        $programModel = new ProgramPembinaanModel();
        $unverifiedPrograms = $programModel->getUnverifiedProgramPembinaan();

        return view('program/unverified', [
            'programs' => $unverifiedPrograms,
        ]);
    }
}
