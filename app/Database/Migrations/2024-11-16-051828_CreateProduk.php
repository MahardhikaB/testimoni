<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProduk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_produk' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id_produk' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => false,
                'comment'    => 'Foreign key ke tabel users',
            ],
            'nama_produk' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
                'comment'    => 'Nama produk',
            ],
            'deskripsi_produk' => [
                'type' => 'TEXT',
                'null' => true,
                'comment' => 'Deskripsi produk',
            ],
            'harga_produk' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'null'       => false,
                'comment'    => 'Harga produk',
            ],
            'ketersediaan_produk' => [
                'type'       => 'ENUM',
                'constraint' => ['tersedia', 'tidak tersedia'],
                'default'    => 'tersedia',
                'null'       => false,
                'comment'    => 'Status ketersediaan produk',
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
        $this->forge->addKey('id_produk', true);

        // Foreign key user_id_produk -> users.user_id
        $this->forge->addForeignKey('user_id_produk', 'users', 'user_id', 'CASCADE', 'CASCADE');

        // Buat tabel
        $this->forge->createTable('produk');
    }

    public function down()
    {
        $this->forge->dropTable('produk');
    }
}
