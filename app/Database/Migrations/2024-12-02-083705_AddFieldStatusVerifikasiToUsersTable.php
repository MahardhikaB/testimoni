<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldStatusVerifikasiToUsersTable extends Migration
{
    public function up()
    {
        $fields = [
            'status_verifikasi' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'accepted', 'rejected'],
                'default' => 'pending',
                'null' => false,
                'after' => 'password',
            ],
        ];

        // Tambahkan kolom ke tabel program_pembinaan
        $this->forge->addColumn('users', $fields);
    }

    public function down()
    {
        // Hapus kolom status_verifikasi dari tabel program_pembinaan
        $this->forge->dropColumn('users', columnNames: 'status_verifikasi');
    }
}