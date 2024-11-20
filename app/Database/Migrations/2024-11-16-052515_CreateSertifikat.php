<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSertifikat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_sertifikat' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id_sertifikat' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => false,
                'comment'    => 'Foreign key ke tabel users',
            ],
            'judul_sertifikat' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
                'comment'    => 'Judul sertifikat',
            ],
            'no_sertifikat' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
                'comment'    => 'Nomor sertifikat',
            ],
            'tanggal_terbit_sertifikat' => [
                'type' => 'DATE',
                'null' => false,
                'comment' => 'Tanggal terbit sertifikat',
            ],
            'penerbit_sertifikat' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
                'comment'    => 'Penerbit sertifikat',
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
        $this->forge->addKey('id_sertifikat', true);

        // Foreign key user_id_sertifikat -> users.user_id
        $this->forge->addForeignKey('user_id_sertifikat', 'users', 'user_id', 'CASCADE', 'CASCADE');

        // Buat tabel
        $this->forge->createTable('sertifikat');
    }

    public function down()
    {
        $this->forge->dropTable('sertifikat');
    }
}
