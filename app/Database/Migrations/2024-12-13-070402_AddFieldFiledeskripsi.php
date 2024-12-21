<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldFiledeskripsi extends Migration
{
        public function up()
    {
        $fields = [
            'deskripsi_ekspor' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'bukti_ekspor', // Menempatkan kolom setelah `bukti_ekspor`
            ],
        ];
        $this->forge->addColumn('progress', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('progress', 'deskripsi_ekspor');
    }

}