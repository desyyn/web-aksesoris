<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Produk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nama_produk' => ['type' => 'VARCHAR', 'constraint' => 255],
            'harga'       => ['type' => 'DECIMAL', 'constraint' => '10,0'], // atau INT
            'deskripsi'   => ['type' => 'TEXT', 'null' => true],
            'gambar'      => ['type' => 'VARCHAR', 'constraint' => 255], // Nama file gambar
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('produk');
    }

    public function down()
    {
        $this->forge->dropTable('produk');
    }
}
