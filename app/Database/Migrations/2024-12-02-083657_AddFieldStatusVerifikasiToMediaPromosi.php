<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldStatusVerifikasiToMediaPromosi extends Migration
{
    public function up()
    {
        $fields = [
            'status_verifikasi' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'accepted', 'rejected'],
                'default' => 'pending',
                'null' => false,
                'after' => 'deskripsi_media',
            ],
        ];

        // Tambahkan kolom ke tabel media_promosi
        $this->forge->addColumn('media_promosi', $fields);
    }

    public function down()
    {
        // Hapus kolom status_verifikasi dari tabel media_promosi
        $this->forge->dropColumn('media_promosi', 'status_verifikasi');
    }
}