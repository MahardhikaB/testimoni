<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLegalitas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_legalitas' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id_legalitas' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'legalitas' => [
                'type' => 'TEXT',
                'null' => true, // Bisa kosong
            ],
            'tipe' => [
                'type' => 'ENUM',
                'constraint' => ['0', '1'],
                'default' => '0',
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
        $this->forge->addKey('id_legalitas', true);

        // Foreign key ke tabel users
        $this->forge->addForeignKey('user_id_legalitas', 'users', 'user_id', 'CASCADE', 'CASCADE');

        // Buat tabel
        $this->forge->createTable('legalitas');
    }

    public function down()
    {
        $this->forge->dropTable('legalitas');
    }
}
