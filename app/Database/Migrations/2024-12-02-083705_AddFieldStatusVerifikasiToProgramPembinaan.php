<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldStatusVerifikasiToProgramPembinaan extends Migration
{
    public function up()
    {
        $fields = [
            'status_verifikasi' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'accepted', 'rejected'],
                'default' => 'pending',
                'null' => false,
                'after' => 'deskripsi_program',
            ],
        ];

        // Tambahkan kolom ke tabel program_pembinaan
        $this->forge->addColumn('program_pembinaan', $fields);
    }

    public function down()
    {
        // Hapus kolom status_verifikasi dari tabel program_pembinaan
        $this->forge->dropColumn('program_pembinaan', 'status_verifikasi');
    }
}