<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProgressSeeder extends Seeder
{
    public function run()
    {
        $this->call('UserLegalitasSeeder');
        $this->call('UserProdukSeeder');
    }
}