<?php

namespace App\Database\Seeds;

use App\Models\PengalamanEksporModel;
use CodeIgniter\Database\Seeder;
use CodeIgniter\Test\Fabricator;
use Tests\Support\Models\PengalamanEksporFabricator;

class UserPengalamanEksporSeeder extends Seeder
{
    public function run()
    {
        $pengalamanEksporModel = new PengalamanEksporModel();
        $fabricator = new Fabricator(PengalamanEksporFabricator::class, null, 'id_ID');

        $pengalamanEkspor = $fabricator->make(10);

        $pengalamanEksporModel->insertBatch($pengalamanEkspor);
    }
}