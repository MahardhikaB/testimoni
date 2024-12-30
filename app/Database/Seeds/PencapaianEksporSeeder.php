<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PencapaianEksporSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'user_id_ekspor'   => 1,
                'tanggal_ekspor'   => '2024-12-01',
                'deskripsi'        => 'Ekspor kopi ke Jepang.',
                'bukti_gambar'     => 'kopi_jepang.jpg',
                'status_verifikasi' => 'verified',
                'created_at'       => date('Y-m-d H:i:s'),
                'updated_at'       => date('Y-m-d H:i:s'),
            ],
            [
                'user_id_ekspor'   => 2,
                'tanggal_ekspor'   => '2024-11-15',
                'deskripsi'        => 'Ekspor tekstil ke Eropa.',
                'bukti_gambar'     => 'tekstil_eropa.jpg',
                'status_verifikasi' => 'pending',
                'created_at'       => date('Y-m-d H:i:s'),
                'updated_at'       => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('pencapaian_ekspor')->insertBatch($data);
    }
}
