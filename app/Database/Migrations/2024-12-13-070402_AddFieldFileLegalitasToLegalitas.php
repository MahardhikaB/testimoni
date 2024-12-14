<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldFileLegalitasToLegalitas extends Migration
{
    public function up()
    {
        $fields = [
            'file_legalitas' => [
                'type' => 'TEXT',
                'null' => false,
                'after' => 'legalitas',
            ],
        ];

        // Tambahkan kolom ke tabel legalitas
        $this->forge->addColumn('legalitas', $fields);
    }

    public function down()
    {
        // Hapus kolom status_verifikasi dari tabel legalitas
        $this->forge->dropColumn('legalitas', 'file_legalitas');
    }
}