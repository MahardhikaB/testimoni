<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class EksporController extends BaseController
{
    public function index()
    {
        $eksporModel = new \App\Models\PengalamanEksporModel();
        
        // Fetch only accepted export experiences, excluding 'pending' and 'rejected' statuses
        $ekspor = $eksporModel->getAcceptedEkspor(); // Use the method to filter only accepted ones
    
        return view('ekspor/index', [
            'ekspor' => $ekspor,
        ]);
    }

    public function create()
    {
        return view('ekspor/add_ekspor');
    }
}
