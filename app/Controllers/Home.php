<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class Home extends BaseController
{
    protected $produkModel;

    public function __construct() {
        $this->produkModel = new ProdukModel();
    }

    public function index()
    {
        // Ambil semua data produk dari database
        $data['produk'] = $this->produkModel->findAll();
        
        // Tampilkan ke view 'etalase/index'
        return view('etalase/index', $data);
    }

    public function detail($id)
    {
        // Cari produk berdasarkan ID
        $data['item'] = $this->produkModel->find($id);
        
        // Jika produk tidak ditemukan (misal ID salah)
        if (empty($data['item'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Produk tidak ditemukan');
        }

        return view('etalase/detail', $data);
    }
}