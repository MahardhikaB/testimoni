<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdatePengalamanPameranTable extends Migration
{
    public function up()
    {
        // Menambahkan kolom baru untuk foto pengalaman pameran setelah kolom deskripsi pengalaman pameran
        $this->forge->addColumn('pengalaman_pameran', [
            'foto_pengalaman_pameran' => [
                'type'       => 'TEXT',
                'null'       => false,
                'comment'    => 'Foto pengalaman pameran',
                'after'      => 'deskripsi_pameran',
            ],
        ]);
    }

    public function down()
    {
        // Hapus kolom 'foto_pengalaman_pameran'
        $this->forge->dropColumn('pengalaman_pameran', 'foto_pengalaman_pameran');
    }
}
