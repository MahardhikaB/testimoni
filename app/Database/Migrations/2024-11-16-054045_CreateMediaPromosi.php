<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMediaPromosi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_media' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id_media' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => false,
                'comment'    => 'Foreign key ke tabel users',
            ],
            'nama_media' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
                'comment'    => 'Nama media promosi',
            ],
            'tahun_media' => [
                'type' => 'YEAR',
                'null' => false,
                'comment' => 'Tahun penggunaan media promosi',
            ],
            'deskripsi_media' => [
                'type' => 'TEXT',
                'null' => true,
                'comment' => 'Deskripsi media promosi',
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
        $this->forge->addKey('id_media', true);

        // Foreign key user_id_media -> users.user_id
        $this->forge->addForeignKey('user_id_media', 'users', 'user_id', 'CASCADE', 'CASCADE');

        // Buat tabel
        $this->forge->createTable('media_promosi');
    }

    public function down()
    {
        $this->forge->dropTable('media_promosi');
    }
}
