<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePengalamanPameran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pameran' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id_pameran' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => false,
                'comment'    => 'Foreign key ke tabel users',
            ],
            'nama_pameran' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
                'comment'    => 'Nama pameran',
            ],
            'tanggal_pameran' => [
                'type' => 'DATE',
                'null' => false,
                'comment' => 'Tanggal pameran',
            ],
            'lokasi_pameran' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
                'comment'    => 'Lokasi pameran',
            ],
            'deskripsi_pameran' => [
                'type' => 'TEXT',
                'null' => true,
                'comment' => 'Deskripsi pengalaman pameran',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        // Primary key
        $this->forge->addKey('id_pameran', true);

        // Foreign key user_id_pameran -> users.id_user
        $this->forge->addForeignKey('user_id_pameran', 'users', 'user_id', 'CASCADE', 'CASCADE');

        // Buat tabel
        $this->forge->createTable('pengalaman_pameran');
    }

    public function down()
    {
        $this->forge->dropTable('pengalaman_pameran');
    }
}
