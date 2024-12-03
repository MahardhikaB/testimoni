<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldStatusVerifikasiToSertifikat extends Migration
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

        // Tambahkan kolom ke tabel sertifikat
        $this->forge->addColumn('sertifikat', $fields);
    }

    public function down()
    {
        // Hapus kolom status_verifikasi dari tabel sertifikat
        $this->forge->dropColumn('sertifikat', 'status_verifikasi');
    }
}