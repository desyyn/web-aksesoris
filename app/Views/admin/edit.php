<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">

<div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-8">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Produk</h2>

    <form action="/produk/update/<?= $produk['id']; ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="gambarLama" value="<?= $produk['gambar']; ?>">

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Nama Produk</label>
            <input type="text" name="nama_produk" value="<?= $produk['nama_produk']; ?>" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Kategori</label>
            <select name="kategori" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
                <option value="Gelang" <?= $produk['kategori'] == 'Gelang' ? 'selected' : '' ?>>Gelang (Bracelets)</option>
                <option value="Kalung" <?= $produk['kategori'] == 'Kalung' ? 'selected' : '' ?>>Kalung (Necklaces)</option>
                <option value="Gantungan Kunci" <?= $produk['kategori'] == 'Gantungan Kunci' ? 'selected' : '' ?>>Gantungan Kunci (Keychain)</option>
                <option value="Flower Lamp" <?= $produk['kategori'] == 'Flower Lamp' ? 'selected' : '' ?>>Flower Lamp</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Harga (Rp)</label>
            <input type="number" name="harga" value="<?= $produk['harga']; ?>" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Deskripsi</label>
            <textarea name="deskripsi" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500" rows="4"><?= $produk['deskripsi']; ?></textarea>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">Ganti Foto (Opsional)</label>
            <div class="flex items-center gap-4 mb-2">
                <img src="/uploads/<?= $produk['gambar'] ?>" class="w-16 h-16 rounded object-cover border">
                <span class="text-xs text-gray-500">Foto Saat Ini</span>
            </div>
            <input type="file" name="gambar" class="w-full text-gray-700 border rounded-lg p-2">
        </div>

        <button type="submit" class="w-full bg-pink-600 text-white font-bold py-2 px-4 rounded hover:bg-pink-700 transition">
            Update Produk
        </button>
        
        <a href="/produk" class="block text-center mt-4 text-gray-500 hover:text-gray-700">Batal</a>
    </form>
</div>

</body>
</html>