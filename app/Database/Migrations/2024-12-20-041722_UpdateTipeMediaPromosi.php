<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateTipeMediaPromosi extends Migration
{
    public function up()
    {
        $fields = [
            'tipe' => [
                'type' => 'ENUM',
                'constraint' => ['0', '1'],
                'default' => '0',
                'after' => 'deskripsi_media',
            ],
        ];

        // Tambahkan kolom ke tabel media promosi
        $this->forge->addColumn('media_promosi', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('media_promosi', 'tipe');
    }
}