<?php

namespace Tests\Support\Models;

use App\Models\PengalamanEksporModel;
use Faker\Generator;

class PengalamanEksporFabricator extends PengalamanEksporModel
{
    public function fake(Generator &$faker) {
        return [
            'user_id_ekspor' => '2',
            'destinasi_ekspor' => $faker->country(),
            'tahun_ekspor' => $faker->dateTimeThisDecade()->format('Y'),
            'produk_ekspor' => 'Produk ' . $faker->unique()->sentence(1, 2),
            'deskripsi_ekspor' => $faker->text(100),
            'status_verifikasi' => $faker->randomElement(['pending', 'accepted', 'rejected']),
        ];
    }
}