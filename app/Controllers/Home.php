<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class Home extends BaseController
{
    protected $produkModel;

    public function __construct() {
        // Memuat Model Produk agar bisa dipakai di semua fungsi
        $this->produkModel = new ProdukModel();
    }

    public function index()
    {
        $data = [
            'title' => 'geewa - Aksesoris Fashion',
            // PERBAIKAN DI SINI: 
            // orderBy('id', 'DESC') artinya urutkan ID dari Besar ke Kecil (Terbaru ke Terlama)
            // findAll(4) artinya ambil cuma 4 biji
            'produk_terbaru' => $this->produkModel->orderBy('id', 'DESC')->findAll(4)
        ];
        return view('etalase/index', $data);
    }

    public function katalog()
    {
        // Ambil data pencarian & filter dari URL
        $keyword = $this->request->getGet('keyword');
        $kategori = $this->request->getGet('kategori');

        $model = $this->produkModel;

        // 1. Logika Pencarian (Jika ada keyword)
        if ($keyword) {
            $model->like('nama_produk', $keyword);
        }

        // 2. Logika Filter Kategori (Jika ada kategori dipilih)
        if ($kategori) {
            $model->where('kategori', $kategori);
        }

        $data = [
            'title' => 'Katalog Lengkap - geewa',
            
            // PERBAIKAN DI SINI JUGA:
            // Katalog juga harus diurutkan dari yang terbaru
            'produk' => $model->orderBy('id', 'DESC')->paginate(12, 'default'),
            
            'pager' => $model->pager,
            'current_kategori' => $kategori
        ];
        
        return view('etalase/katalog', $data);
    }

    public function detail($id)
    {
        // Ambil data produk berdasarkan ID
        $data['item'] = $this->produkModel->find($id);
        
        // Cek jika produk tidak ditemukan (misal ID ngawur)
        if (empty($data['item'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Produk tidak ditemukan');
        }
        
        $data['title'] = $data['item']['nama_produk'] . ' - geewa';

        return view('etalase/detail', $data);
    }
}