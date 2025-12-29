<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">

<div class="max-w-4xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Daftar Produk</h1>
        <a href="/produk/create" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
            + Tambah Produk
        </a>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Gambar</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama Produk</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Harga</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($produk as $p): ?>
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <img src="/uploads/<?= $p['gambar'] ?>" alt="" class="w-16 h-16 object-cover rounded">
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap font-bold"><?= $p['nama_produk'] ?></p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 whitespace-no-wrap">Rp <?= number_format($p['harga'], 0, ',', '.') ?></p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <a href="/produk/delete/<?= $p['id'] ?>" onclick="return confirm('Yakin mau hapus?')" class="text-red-600 hover:text-red-900">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                
                <?php if(empty($produk)): ?>
                <tr>
                    <td colspan="4" class="text-center py-5 text-gray-500">Belum ada data produk. Silakan tambah baru.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    
    <div class="mt-8 text-center">
        <a href="/" class="text-blue-500 hover:underline">Lihat Halaman Depan (Website) &rarr;</a>
    </div>
</div>

</body>
</html>