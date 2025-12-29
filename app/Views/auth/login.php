<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 h-screen flex justify-center items-center">

<div class="bg-white p-8 rounded-lg shadow-lg w-96">
    <h2 class="text-2xl font-bold text-center mb-6 text-pink-600">Login Admin</h2>

    <?php if(session()->getFlashdata('msg')):?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <?= session()->getFlashdata('msg') ?>
        </div>
    <?php endif;?>

    <form action="/login/auth" method="post">
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Username</label>
            <input type="text" name="username" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-pink-500" required>
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">Password</label>
            <input type="password" name="password" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-pink-500" required>
        </div>
        <button type="submit" class="w-full bg-pink-600 text-white font-bold py-2 rounded hover:bg-pink-700 transition">
            Masuk
        </button>
    </form>
    
    <div class="mt-4 text-center">
        <a href="/" class="text-sm text-gray-500 hover:underline">Kembali ke Web Utama</a>
    </div>
</div>

</body>
</html> 