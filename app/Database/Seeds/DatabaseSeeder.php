<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('UserSeeder');
        $this->call('PerusahaanSeeder');
        $this->call('ProgressSeeder');
        $this->call('UserLegalitasSeeder');
        $this->call('UserMediaPromosiSeeder');
        $this->call('UserPengalamanEksporSeeder');
        $this->call('UserPengalamanPameranSeeder');
        
        $this->call('UserProgramPembinaanSeeder');
        $this->call('UserSertifikatSeeder');
    }
}