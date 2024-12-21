<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddBuktiEksporToPengalamanEkspor extends Migration
{
    public function up()
    {
        $this->forge->addColumn('pengalaman_ekspor', [
            'bukti_ekspor' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'after' => 'nilai', // Kolom baru ditambahkan setelah kolom 'nilai'
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('pengalaman_ekspor', 'bukti_ekspor');
    }
}
