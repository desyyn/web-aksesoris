<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class Produk extends BaseController
{
    protected $produkModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
        helper(['form', 'url']);
    }

    // Halaman Utama Admin (List Produk)
    public function index()
    {
        $data['produk'] = $this->produkModel->findAll();
        return view('admin/index', $data);
    }

    // Halaman Form Tambah Barang
    public function create()
    {
        return view('admin/create');
    }

    // Proses Simpan Data ke Database
    public function store()
    {
        // 1. Validasi Input
        if (!$this->validate([
            'nama_produk' => 'required',
            'harga'       => 'required|numeric',
            'gambar'      => [
                'rules' => 'uploaded[gambar]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih gambar produk terlebih dahulu',
                    'is_image' => 'File yang dipilih bukan gambar',
                    'mime_in'  => 'Format gambar harus jpg, jpeg, atau png'
                ]
            ]
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // 2. Handle Upload Gambar
        $fileGambar = $this->request->getFile('gambar');
        // Generate nama random agar tidak bentrok
        $namaGambar = $fileGambar->getRandomName();
        // Pindahkan file ke folder public/uploads
        $fileGambar->move('uploads', $namaGambar);

        // 3. Simpan ke Database
        $this->produkModel->save([
            'nama_produk' => $this->request->getVar('nama_produk'),
            'kategori'    => $this->request->getVar('kategori'),
            'harga'       => $this->request->getVar('harga'),
            'deskripsi'   => $this->request->getVar('deskripsi'),
            'gambar'      => $namaGambar
        ]);

        return redirect()->to('/produk')->with('success', 'Data berhasil ditambahkan');
    }

    // Fitur Hapus
    public function delete($id)
    {
        // Cari data berdasarkan ID
        $data = $this->produkModel->find($id);
        
        // Hapus file gambar di folder (opsional, biar hemat storage)
        if($data['gambar'] != ''){
            $path = 'uploads/' . $data['gambar'];
            if(file_exists($path)){
                unlink($path); 
            }
        }

        $this->produkModel->delete($id);
        return redirect()->to('/produk')->with('success', 'Data berhasil dihapus');
    }

    public function edit($id)
    {
        $data['produk'] = $this->produkModel->find($id);
        
        if (empty($data['produk'])) {
            return redirect()->to('/produk')->with('error', 'Produk tidak ditemukan');
        }

        return view('admin/edit', $data);
    }

    // 2. Proses Update ke Database
    public function update($id)
    {
        // Validasi
        if (!$this->validate([
            'nama_produk' => 'required',
            'harga'       => 'required|numeric',
            // Gambar opsional saat edit (kalau tidak diganti, pakai yg lama)
            'gambar'      => [
                'rules' => 'is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'is_image' => 'File yang dipilih bukan gambar',
                    'mime_in'  => 'Format gambar harus jpg, jpeg, atau png'
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }

        // Ambil file gambar baru
        $fileGambar = $this->request->getFile('gambar');
        
        // Cek apakah user upload gambar baru?
        if ($fileGambar->getError() == 4) {
            // Jika tidak upload, pakai nama gambar lama
            $namaGambar = $this->request->getVar('gambarLama');
        } else {
            // Jika upload baru, generate nama & pindahkan
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('uploads', $namaGambar);
            
            // Hapus gambar lama agar hemat memori (opsional)
            $produkLama = $this->produkModel->find($id);
            if ($produkLama['gambar'] != '' && file_exists('uploads/' . $produkLama['gambar'])) {
                unlink('uploads/' . $produkLama['gambar']);
            }
        }

        // Simpan Perubahan
        $this->produkModel->update($id, [
            'nama_produk' => $this->request->getVar('nama_produk'),
            'kategori'    => $this->request->getVar('kategori'),
            'harga'       => $this->request->getVar('harga'),
            'deskripsi'   => $this->request->getVar('deskripsi'),
            'gambar'      => $namaGambar
        ]);

        return redirect()->to('/produk')->with('success', 'Data berhasil diperbarui');
    }
}