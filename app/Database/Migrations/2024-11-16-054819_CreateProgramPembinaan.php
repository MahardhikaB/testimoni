<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProgramPembinaan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_program' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id_pembinaan' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => false,
                'comment'    => 'Foreign key ke tabel users',
            ],
            'nama_program' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
                'comment'    => 'Nama program pembinaan',
            ],
            'tahun_program' => [
                'type' => 'YEAR',
                'null' => false,
                'comment' => 'Tahun pelaksanaan program pembinaan',
            ],
            'penyelenggara_program' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
                'comment'    => 'Penyelenggara program pembinaan',
            ],
            'deskripsi_program' => [
                'type' => 'TEXT',
                'null' => true,
                'comment' => 'Deskripsi program pembinaan',
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
        $this->forge->addKey('id_program', true);

        // Foreign key user_id_pembinaan -> users.user_id
        $this->forge->addForeignKey('user_id_pembinaan', 'users', 'user_id', 'CASCADE', 'CASCADE');

        // Buat tabel
        $this->forge->createTable('program_pembinaan');
    }

    public function down()
    {
        $this->forge->dropTable('program_pembinaan');
    }
}
