<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldStatusVerifikasiLegalitas extends Migration
{
    public function up()
    {
        $fields = [
            'status_verifikasi' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'accepted', 'rejected'],
                'default' => 'pending',
                'null' => false,
                'after' => 'tipe',
            ],
        ];

        // Tambahkan kolom ke tabel legalitas
        $this->forge->addColumn('legalitas', $fields);
    }

    public function down()
    {
        // Hapus kolom status_verifikasi dari tabel legalitas
        $this->forge->dropColumn('legalitas', 'status_verifikasi');
    }
}