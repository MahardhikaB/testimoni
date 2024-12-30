<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateSertifikatTable extends Migration
{
    public function up()
    {
        // Menambahkan kolom baru untuk file sertifikat setelah kolom penrbit sertifikat
        $this->forge->addColumn('sertifikat', [
            'file_sertifikat' => [
                'type'       => 'TEXT',
                'null'       => false,
                'comment'    => 'File sertifikat',
                'after'      => 'penerbit_sertifikat',
            ],
        ]);

    }

    public function down()
    {
        // Hapus kolom 'file_sertifikat'
        $this->forge->dropColumn('sertifikat', 'file_sertifikat');
    }
}
