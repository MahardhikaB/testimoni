<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldStatusVerifikasiToPengalamanPameran extends Migration
{
    public function up()
    {
        $fields = [
            'status_verifikasi' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'accepted', 'rejected'],
                'default' => 'pending',
                'null' => false,
                'after' => 'deskripsi_pameran',
            ],
        ];

        // Tambahkan kolom ke tabel pengalaman_pameran
        $this->forge->addColumn('pengalaman_pameran', $fields);
    }

    public function down()
    {
        // Hapus kolom status_verifikasi dari tabel pengalaman_pameran
        $this->forge->dropColumn('pengalaman_pameran', 'status_verifikasi');
    }
}