<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePencapaianEksporTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id_ekspor' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'tanggal_ekspor' => [
                'type' => 'DATE',
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'bukti_gambar' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'status_verifikasi' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'accepted', 'rejected'],
                'default' => 'pending',
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

        $this->forge->addKey('id', true); // Primary Key
        $this->forge->addForeignKey('user_id_ekspor', 'users', 'user_id', 'CASCADE', 'CASCADE'); // Foreign Key
        $this->forge->createTable('pencapaian_ekspor');
    }

    public function down()
    {
        $this->forge->dropTable('pencapaian_ekspor');
    }
}
