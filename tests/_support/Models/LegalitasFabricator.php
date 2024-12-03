<?php

namespace Tests\Support\Models;

use App\Models\LegalitasModel;
use Faker\Generator;

class LegalitasFabricator extends LegalitasModel
{
    public function fake(Generator &$faker) {
        return [
            'user_id_legalitas' => '2',
            'legalitas' => '/storage/dummy.pdf',
            'tipe' => $faker->randomElement(['0', '1']),
            'status_verifikasi' => $faker->randomElement(['pending', 'accepted', 'rejected']),
        ];
    }
}