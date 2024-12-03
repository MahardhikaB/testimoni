<?php

namespace Tests\Support\Models;

use App\Models\SertifikatModel;
use Faker\Generator;

class SertifikatFabricator extends SertifikatModel
{
    public function fake(Generator &$faker) {
        return [
            'user_id_sertifikat' => '2',
            'judul_sertifikat' => 'Sertifikat ' . $faker->unique()->sentence(3),
            'no_sertifikat' => $faker->unique()->numerify('SERTIFICATE/###/##/###'),
            'tanggal_terbit_sertifikat' => $faker->dateTimeThisDecade()->format('Y-m-d'),
            'penerbit_sertifikat' => $faker->company(),
            'tipe' => $faker->randomElement(['0', '1']),
            'status_verifikasi' => $faker->randomElement(['pending', 'accepted', 'rejected']),
        ];
    }
}