<?php

namespace Tests\Support\Models;

use App\Models\PengalamanEksporModel;
use Faker\Generator;

class PengalamanEksporFabricator extends PengalamanEksporModel
{
    public function fake(Generator &$faker) {
        return [
            'user_id_ekspor'   => '2',
            'negara_tujuan'     => $faker->country(),
            'tanggal'           => $faker->dateTimeThisDecade()->format('Y-m-d'),
            'produk_ekspor'     => 'Produk ' . $faker->unique()->sentence(1, 2),
            'deskripsi_ekspor'  => $faker->text(100),
            'status_verifikasi' => $faker->randomElement(['pending', 'accepted', 'rejected']),
            'kuantitas'         => $faker->randomNumber(3) . ' kg', // Kuantitas dalam kilogram
            'nilai'             => $faker->randomFloat(2, 1000, 100000), // Nilai dalam USD
        ];
    }
}
