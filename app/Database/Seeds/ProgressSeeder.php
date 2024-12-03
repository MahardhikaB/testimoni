<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProgressSeeder extends Seeder
{
    public function run()
    {
        $this->call('UserLegalitasSeeder');
        $this->call('UserProdukSeeder');
        $this->call('UserSertifikatSeeder');
        $this->call('UserPengalamanPameranSeeder');
        $this->call('UserPengalamanEksporSeeder');
        $this->call('UserMediaPromosiSeeder');
        $this->call('UserProgramPembinaanSeeder');
    }
}