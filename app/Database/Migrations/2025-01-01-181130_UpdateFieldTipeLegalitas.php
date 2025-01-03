<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateFieldTipeLegalitas extends Migration
{
    public function up()
    {
        $this->forge->modifyColumn('legalitas', [
            'tipe' => [
                'type' => 'ENUM',
                'constraint' => ['0', '1'],
                'default' => '0',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->modifyColumn('legalitas', [
            'tipe' => [
                'type' => 'ENUM',
                'constraint' => ['0', '1', '2'],
                'default' => '0',
            ],
        ]);
    }
}