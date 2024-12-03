<?php

namespace App\Database\Seeds;

use App\Models\ProgramPembinaanModel;
use CodeIgniter\Database\Seeder;
use CodeIgniter\Test\Fabricator;
use Tests\Support\Models\ProgramPembinaanFabricator;

class UserProgramPembinaanSeeder extends Seeder
{
    public function run()
    {
        $programPembinaanModel = new ProgramPembinaanModel();
        $fabricator = new Fabricator(ProgramPembinaanFabricator::class, null, 'id_ID');

        $programPembinaan = $fabricator->make(10);

        $programPembinaanModel->insertBatch($programPembinaan);
    }
}