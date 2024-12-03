<?php

namespace Tests\Support\Models;

use App\Models\MediaPromosiModel;
use Faker\Generator;

class MediaPromosiFabricator extends MediaPromosiModel
{
    public function fake(Generator &$faker) {
        return [
            'user_id_media' => '2',
            'nama_media' => 'Media ' . $faker->unique()->sentence(2),
            'tahun_media' => $faker->dateTimeThisDecade()->format('Y'),
            'deskripsi_media' => $faker->text(100),
            'status_verifikasi' => $faker->randomElement(['pending', 'accepted', 'rejected']),
        ];
    }
}