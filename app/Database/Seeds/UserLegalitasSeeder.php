<?php

namespace App\Database\Seeds;

use App\Models\LegalitasModel;
use CodeIgniter\Database\Seeder;
use CodeIgniter\Test\Fabricator;
use Tests\Support\Models\LegalitasFabricator;

class UserLegalitasSeeder extends Seeder
{
    public function run()
    {
        $legalitasModel = new LegalitasModel();
        $fabricator = new Fabricator(LegalitasFabricator::class);

        $legalitas = $fabricator->create(10);
    }
}