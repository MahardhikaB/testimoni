<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldStatusVerifikasiToPengalamanEkspor extends Migration
{
    public function up()
    {
        $fields = [
            'status_verifikasi' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'accepted', 'rejected'],
                'default' => 'pending',
                'null' => false,
                'after' => 'deskripsi_ekspor',
            ],
        ];

        // Tambahkan kolom ke tabel pengalaman_ekspor
        $this->forge->addColumn('pengalaman_ekspor', $fields);
    }

    public function down()
    {
        // Hapus kolom status_verifikasi dari tabel pengalaman_ekspor
        $this->forge->dropColumn('pengalaman_ekspor', 'status_verifikasi');
    }
}