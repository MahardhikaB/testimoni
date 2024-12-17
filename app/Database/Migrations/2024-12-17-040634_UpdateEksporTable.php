<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateEksporTable extends Migration
{
    public function up()
    {
        // Rename columns
        $this->forge->modifyColumn('pengalaman_ekspor', [
            'destinasi_ekspor' => [
                'name'       => 'negara_tujuan',
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
                'comment'    => 'Negara tujuan ekspor',
            ],
            'tahun_ekspor' => [
                'name'    => 'tanggal',
                'type'    => 'DATE',
                'null'    => false,
                'comment' => 'Tanggal ekspor dilakukan',
            ],
        ]);

        // Add new columns after 'negara_tujuan'
        $this->forge->addColumn('pengalaman_ekspor', [
            'kuantitas' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
                'comment'    => 'Jumlah barang yang diekspor',
                'after'      => 'negara_tujuan',
            ],
            'nilai' => [
                'type'       => 'DOUBLE',
                'null'       => false,
                'default'    => 0,
                'comment'    => 'Nilai ekspor',
                'after'      => 'kuantitas',
            ],
        ]);
    }

    public function down()
    {
        // Reverse changes
        $this->forge->modifyColumn('pengalaman_ekspor', [
            'negara_tujuan' => [
                'name'       => 'destinasi_ekspor',
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
                'comment'    => 'Negara tujuan ekspor',
            ],
            'tanggal' => [
                'name'    => 'tahun_ekspor',
                'type'    => 'YEAR',
                'null'    => false,
                'comment' => 'Tahun ekspor dilakukan',
            ],
        ]);

        $this->forge->dropColumn('pengalaman_ekspor', ['kuantitas', 'nilai']);
    }
}
