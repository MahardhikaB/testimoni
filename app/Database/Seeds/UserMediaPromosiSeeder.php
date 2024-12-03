<?php

namespace App\Database\Seeds;

use App\Models\MediaPromosiModel;
use CodeIgniter\Database\Seeder;
use CodeIgniter\Test\Fabricator;
use Tests\Support\Models\MediaPromosiFabricator;

class UserMediaPromosiSeeder extends Seeder
{
    public function run()
    {
        $mediaPromosiModel = new MediaPromosiModel();
        $fabricator = new Fabricator(MediaPromosiFabricator::class, null, 'id_ID');
        
        $mediaPromosi = $fabricator->make(10);

        $mediaPromosiModel->insertBatch($mediaPromosi);
    }
}