<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - geewa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans p-6">

<div class="max-w-6xl mx-auto">
    <div class="flex justify-between items-center mb-8 bg-white p-6 rounded-xl shadow-sm">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Dashboard Produk</h1>
            <p class="text-sm text-gray-500">Kelola katalog produk geewa</p>
        </div>
        <div class="flex gap-3">
            <a href="/" class="px-4 py-2 text-sm text-gray-600 hover:text-pink-600 font-medium">Lihat Web</a>
            <a href="/logout" class="px-4 py-2 text-sm text-red-600 hover:text-red-800 font-medium border border-red-200 rounded-lg hover:bg-red-50">Logout</a>
            
            <a href="/produk/create" class="bg-pink-600 hover:bg-pink-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Produk
            </a>
        </div>
    </div>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
            <p><?= session()->getFlashdata('success') ?></p>
        </div>
    <?php endif; ?>

    <div class="bg-white shadow-md rounded-xl overflow-hidden">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Gambar</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama Produk & Kategori</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Harga</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-50 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($produk as $p): ?>
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <img src="/uploads/<?= $p['gambar'] ?>" alt="" class="w-16 h-16 object-cover rounded-lg border border-gray-200">
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 font-bold"><?= $p['nama_produk'] ?></p>
                        <span class="bg-pink-100 text-pink-600 text-xs px-2 py-1 rounded-full mt-1 inline-block">
                            <?= $p['kategori'] ?? '-' ?>
                        </span>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <p class="text-gray-900 font-medium">Rp <?= number_format($p['harga'], 0, ',', '.') ?></p>
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                        <div class="flex justify-center gap-3">
                            <a href="/produk/edit/<?= $p['id'] ?>" class="text-blue-600 hover:text-blue-900 font-medium">Edit</a>
                            
                            <a href="/produk/delete/<?= $p['id'] ?>" onclick="return confirm('Yakin mau hapus?')" class="text-red-600 hover:text-red-900 font-medium">Hapus</a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>