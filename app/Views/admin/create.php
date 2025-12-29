<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk Baru - geewa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6 font-sans">

<div class="max-w-md mx-auto bg-white rounded-xl shadow-md p-8">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Tambah Produk Baru</h2>

    <?php if(session()->getFlashdata('errors')): ?>
        <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-4">
            <ul class="list-disc list-inside text-sm text-red-600">
            <?php foreach(session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="/produk/store" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2 text-sm">Nama Produk</label>
            <input type="text" name="nama_produk" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 transition" placeholder="Contoh: Gelang Manik Pink" value="<?= old('nama_produk') ?>" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2 text-sm">Kategori Produk</label>
            <div class="relative">
                <select name="kategori" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 appearance-none bg-white transition">
                    <option value="Gelang" <?= old('kategori') == 'Gelang' ? 'selected' : '' ?>>Gelang (Bracelets)</option>
                    <option value="Kalung" <?= old('kategori') == 'Kalung' ? 'selected' : '' ?>>Kalung (Necklaces)</option>
                    <option value="Gantungan Kunci" <?= old('kategori') == 'Gantungan Kunci' ? 'selected' : '' ?>>Gantungan Kunci (Keychain)</option>
                    <option value="Flower Lamp" <?= old('kategori') == 'Flower Lamp' ? 'selected' : '' ?>>Flower Lamp Pipe Cleaner</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2 text-sm">Harga (Rp)</label>
            <input type="number" name="harga" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 transition" placeholder="Contoh: 35000" value="<?= old('harga') ?>" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2 text-sm">Deskripsi</label>
            <textarea name="deskripsi" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500 transition" rows="4" placeholder="Jelaskan detail produk..."><?= old('deskripsi') ?></textarea>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2 text-sm">Foto Produk</label>
            <input type="file" name="gambar" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-pink-50 file:text-pink-700 hover:file:bg-pink-100 transition" required>
        </div>

        <button type="submit" class="w-full bg-pink-600 text-white font-bold py-3 px-4 rounded-lg hover:bg-pink-700 shadow-md transition transform hover:-translate-y-0.5">
            Simpan Produk
        </button>
        
        <a href="/produk" class="block text-center mt-4 text-sm text-gray-500 hover:text-gray-700">Batal & Kembali</a>
    </form>
</div>

</body>
</html>