<?php

namespace App\Database\Seeds;

use App\Models\SertifikatModel;
use CodeIgniter\Database\Seeder;
use CodeIgniter\Test\Fabricator;
use Tests\Support\Models\SertifikatFabricator;

class UserSertifikatSeeder extends Seeder
{
    public function run()
    {
        $sertifikatModel = new SertifikatModel();
        $fabricator = new Fabricator(SertifikatFabricator::class, null, 'en_US');

        $sertifikat = $fabricator->make(10);

        $sertifikatModel->insertBatch($sertifikat);
    }
}