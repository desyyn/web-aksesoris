<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddKategoriToProduk extends Migration
{
public function up()
{
    $fields = [
        'kategori' => ['type' => 'VARCHAR', 'constraint' => 100, 'after' => 'nama_produk']
    ];
    $this->forge->addColumn('produk', $fields);
}

public function down()
{
    $this->forge->dropColumn('produk', 'kategori');
}
}
