<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    // Nama tabel di database (sesuai yang ada di file Migration tadi)
    protected $table            = 'produk';
    
    // Primary Key
    protected $primaryKey       = 'id';
    
    // Agar id otomatis bertambah
    protected $useAutoIncrement = true;
    
    // Tipe data kembalian (array atau object)
    protected $returnType       = 'array'; 
    
    // Fitur soft delete (opsional, set false saja dulu)
    protected $useSoftDeletes   = false;

    // KOLOM YANG BOLEH DIISI (PENTING!)
    // Ini harus sesuai dengan kolom yang kamu buat di Migration
    protected $allowedFields = ['nama_produk', 'kategori', 'harga', 'deskripsi', 'gambar'];

    // Mengaktifkan fitur created_at dan updated_at otomatis
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}