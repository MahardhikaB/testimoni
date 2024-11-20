<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePerusahaan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_perusahaan' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id_perusahaan' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'nama_perusahaan' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'jenis_perusahaan' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'alamat' => [
                'type'       => 'TEXT',
            ],
            'telepon' => [
                'type'       => 'VARCHAR',
                'constraint' => 15,
            ],
            'pelatihan_mulai' => [
                'type' => 'DATE',
            ],
            'pelatihan_selesai' => [
                'type' => 'DATE',
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
        $this->forge->addKey('id_perusahaan', true);

        // Unique key untuk memastikan satu user hanya memiliki satu perusahaan
        $this->forge->addUniqueKey('user_id_perusahaan');

        // Foreign key
        $this->forge->addForeignKey('user_id_perusahaan', 'users', 'user_id', 'CASCADE', 'CASCADE');

        // Buat tabel
        $this->forge->createTable('perusahaan');
    }

    public function down()
    {
        $this->forge->dropTable('perusahaan');
    }
}
