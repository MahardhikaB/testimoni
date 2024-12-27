<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUserIdToProgress extends Migration
{
    public function up()
    {
        // Menambahkan kolom user_id ke tabel progress
        $this->forge->addColumn('progress', [
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'after' => 'id_perusahaan',  // Menempatkan kolom setelah id_perusahaan
                'null' => false,  // Kolom ini tidak boleh null
            ],
        ]);
    }

    public function down()
    {
        // Menghapus kolom user_id jika migration dibatalkan
        $this->forge->dropColumn('progress', 'user_id');
    }
}
