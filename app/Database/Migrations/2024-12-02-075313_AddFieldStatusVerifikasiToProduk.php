<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldStatusVerifikasiToProduk extends Migration
{
    public function up()
    {
        $fields = [
            'status_verifikasi' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'accepted', 'rejected'],
                'default' => 'pending',
                'null' => false,
                'after' => 'tipe',
            ],
        ];

        // Tambahkan kolom ke tabel produk
        $this->forge->addColumn('produk', $fields);
    }

    public function down()
    {
        // Hapus kolom status_verifikasi dari tabel produk
        $this->forge->dropColumn('produk', 'status_verifikasi');
    }
}