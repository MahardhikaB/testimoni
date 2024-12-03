<?php

namespace App\Database\Seeds;

use App\Models\PengalamanPameranModel;
use CodeIgniter\Database\Seeder;
use CodeIgniter\Test\Fabricator;
use Tests\Support\Models\PengalamanPameranFabricator;

class UserPengalamanPameranSeeder extends Seeder
{
    public function run()
    {
        $pengalamanPameranModel = new PengalamanPameranModel();
        $fabricator = new Fabricator(PengalamanPameranFabricator::class, null, 'id_ID');

        $pengalamanPameran = $fabricator->make(10);

        $pengalamanPameranModel->insertBatch($pengalamanPameran);
    }
}