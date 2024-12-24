<?php

namespace Tests\Support\Models;

use App\Models\ProdukModel;
use Faker\Generator;

class ProdukFabricator extends ProdukModel
{
    public function fake(Generator &$faker) {
        return [
            'user_id_produk' => '2',
            'nama_produk' => 'Produk ' . $faker->unique()->numberBetween(1, 25),
            'deskripsi_produk' => $faker->text(100),
            'harga_produk' => $faker->numberBetween(50000, 250000),
            // 'ketersediaan_produk' => $faker->randomElement(['tersedia', 'tidak tersedia']),
            'tipe' => $faker->randomElement(['0', '1']),
            'status_verifikasi' => $faker->randomElement(['pending', 'accepted', 'rejected']),
        ];
    }
}