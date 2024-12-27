<?php

namespace Tests\Support\Models;

use App\Models\ProgressModel;
use Faker\Generator;

class ProgressFabricator extends ProgressModel
{
    public function fake(Generator &$faker)
    {
        return [
            'user_id'           => $faker->randomNumber(1, true),  // ID pengguna acak
            'id_perusahaan'     => $faker->randomNumber(1, true),  // ID perusahaan acak
            'tanggal_ekspor'    => $faker->dateTimeThisYear()->format('Y-m-d'), // Tanggal ekspor
            'nilai_ekspor_rp'   => $faker->randomNumber(6), // Nilai ekspor dalam Rupiah
            'nilai_ekspor_usd'  => $faker->randomFloat(2, 1000, 100000), // Nilai ekspor dalam USD
            'negara_ekspor'     => $faker->country(), // Negara tujuan ekspor
            'jenis_ekspor'      => $faker->word(), // Jenis ekspor (misalnya "barang" atau "jasa")
            'kuantitas_ekspor'  => $faker->randomNumber(3), // Kuantitas ekspor dalam angka acak
            'produk_ekspor'     => $faker->word(), // Nama produk ekspor
            'bukti_ekspor'      => $faker->word() . '.pdf', // Nama file bukti ekspor (misalnya "dokumen.pdf")
            'nama_importir'     => $faker->company(), // Nama importir
            'deskripsi_ekspor'  => $faker->text(200), // Deskripsi ekspor (bisa lebih panjang)
        ];
    }
}
