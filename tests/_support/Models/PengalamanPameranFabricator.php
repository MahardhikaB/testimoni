<?php

namespace Tests\Support\Models;

use App\Models\PengalamanPameranModel;
use Faker\Generator;

class PengalamanPameranFabricator extends PengalamanPameranModel
{
    public function fake(Generator &$faker) {
        return [
            'user_id_pameran' => '2',
            'nama_pameran' => 'Pameran ' . $faker->unique()->sentence(3),
            'tanggal_pameran' => $faker->dateTimeThisDecade()->format('Y-m-d'),
            'lokasi_pameran' => $faker->city(),
            'deskripsi_pameran' => $faker->text(100),
            'status_verifikasi' => $faker->randomElement(['pending', 'accepted', 'rejected']),
        ];
    }
}