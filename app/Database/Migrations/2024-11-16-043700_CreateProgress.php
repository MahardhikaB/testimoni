<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProgress extends Migration
{
    public function up()
    {
        // Membuat tabel progress
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_perusahaan' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => false,
            ],
            'tanggal_ekspor' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'nilai_ekspor_rp' => [
                'type'       => 'DECIMAL',
                'constraint' => '15,2',
                'null'       => false,
            ],
            'nilai_ekspor_usd' => [
                'type'       => 'DECIMAL',
                'constraint' => '15,2',
                'null'       => false,
            ],
            'negara_ekspor' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => false,
            ],
            'jenis_ekspor' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => false,
            ],
            'kuantitas_ekspor' => [
                'type' => 'INT',
                'null' => false,
            ],
            'produk_ekspor' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'bukti_ekspor' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'nama_importir' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'updated_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
        ]);

        // Menambahkan primary key
        $this->forge->addKey('id', true);

        // Menghubungkan foreign key ke kolom id_perusahaan di tabel perusahaan
        $this->forge->addForeignKey('id_perusahaan', 'perusahaan', 'id_perusahaan', 'CASCADE', 'CASCADE');

        // Membuat tabel progress
        $this->forge->createTable('progress', true);
    }

    public function down()
    {
        // Menghapus tabel progress
        $this->forge->dropTable('progress', true);
    }
}
