<?php

namespace Tests\Support\Models;

use App\Models\ProgramPembinaanModel;
use Faker\Generator;

class ProgramPembinaanFabricator extends ProgramPembinaanModel
{
    public function fake(Generator &$faker) {
        return [
            'user_id_pembinaan' => '2',
            'nama_program' => 'Program ' . $faker->unique()->sentence(2),
            'tahun_program' => $faker->dateTimeThisDecade()->format('Y'),
            'penyelenggara_program' => $faker->company(),
            'deskripsi_program' => $faker->text(100),
            'status_verifikasi' => $faker->randomElement(['pending', 'accepted', 'rejected']),
        ];
    }
}