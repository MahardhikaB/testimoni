<?php

namespace App\Database\Seeds;

use App\Models\ProdukModel;
use CodeIgniter\Database\Seeder;
use CodeIgniter\Test\Fabricator;
use Tests\Support\Models\ProdukFabricator;

class UserProdukSeeder extends Seeder
{
    public function run()
    {
        $produkModel = new ProdukModel();
        $fabricator = new Fabricator(ProdukFabricator::class, null, 'id_ID');

        $produk = $fabricator->make(10);

        $produkModel->insertBatch($produk);
    }
}