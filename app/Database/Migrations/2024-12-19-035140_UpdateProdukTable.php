<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateProdukTable extends Migration
{
    public function up()
    {
        // Modifikasi kolom 'harga_produk'
        $this->forge->modifyColumn('produk', [
            'harga_produk' => [
                'type'    => 'TEXT',
                'null'    => false,
                'comment' => 'Harga produk',
            ],
        ]);

        // Menambahkan kolom baru untuk foto
        $this->forge->addColumn('produk', [
            'foto_1' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'comment'    => 'Foto produk 1',
                'after'      => 'harga_produk',
            ],
            'foto_2' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'comment'    => 'Foto produk 2',
                'after'      => 'foto_1',
            ],
            'foto_3' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'comment'    => 'Foto produk 3',
                'after'      => 'foto_2',
            ],
            'foto_4' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'comment'    => 'Foto produk 4',
                'after'      => 'foto_3',
            ],
            'foto_5' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'comment'    => 'Foto produk 5',
                'after'      => 'foto_4',
            ],
        ]);

        // Menghapus kolom 'ketersediaan_produk'
        $this->forge->dropColumn('produk', 'ketersediaan_produk');
    }

    public function down()
    {
        // Membalikkan perubahan pada kolom 'harga_produk'
        $this->forge->modifyColumn('produk', [
            'harga_produk' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'null'       => false,
                'comment'    => 'Harga produk',
            ],
        ]);

        // Menghapus kolom foto
        $this->forge->dropColumn('produk', ['foto_1', 'foto_2', 'foto_3', 'foto_4', 'foto_5']);

        // Menambahkan kembali kolom 'ketersediaan_produk'
        $this->forge->addColumn('produk', [
            'ketersediaan_produk' => [
                'type'       => 'ENUM',
                'constraint' => ['tersedia', 'tidak tersedia'],
                'default'    => 'tersedia',
                'null'       => false,
                'comment'    => 'Status ketersediaan produk',
            ],
        ]);
    }
}
