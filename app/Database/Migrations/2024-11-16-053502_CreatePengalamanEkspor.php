<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePengalamanEkspor extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_ekspor' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id_ekspor' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => false,
                'comment'    => 'Foreign key ke tabel users',
            ],
            'destinasi_ekspor' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
                'comment'    => 'Negara tujuan ekspor',
            ],
            'tahun' => [
                'type' => 'YEAR',
                'null' => false,
                'comment' => 'Tahun ekspor dilakukan',
            ],
            'produk' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
                'comment'    => 'Produk yang diekspor',
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                'null' => true,
                'comment' => 'Deskripsi pengalaman ekspor',
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
        $this->forge->addKey('id_ekspor', true);

        // Foreign key user_id_ekspor -> users.user_id
        $this->forge->addForeignKey('user_id_ekspor', 'users', 'user_id', 'CASCADE', 'CASCADE');

        // Buat tabel
        $this->forge->createTable('pengalaman_ekspor');
    }

    public function down()
    {
        $this->forge->dropTable('pengalaman_ekspor');
    }
}
