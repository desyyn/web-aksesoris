<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyShop - Aksesoris Fashion</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script>
        tailwind.config = {
            theme: {
                fontFamily: {
                    'sans': ['Poppins', 'sans-serif'],
                },
                extend: {
                    colors: {
                        'primary': '#ff47a9',      // Pink Tua (Tombol/Link)
                        'primary-hover': '#e03690',
                        'soft-pink': '#fff0f7',    // Background Section
                        'card-bg': '#ffffff',
                    }
                }
            }
        }
    </script>
    
    <style>
        /* Agar gambar produk tingginya rata */
        .product-img { 
            height: 250px; 
            width: 100%; 
            object-fit: cover; 
        }
        /* Dekorasi Lingkaran di Banner */
        .blob-bg {
            position: absolute;
            right: -50px;
            top: 50%;
            transform: translateY(-50%);
            width: 500px;
            height: 500px;
            background-color: #fff0f7;
            border-radius: 50%;
            z-index: -1;
        }
    </style>
</head>
<body class="bg-white text-gray-800 font-sans">

    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-gray-100">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold tracking-tight">
                My<span class="text-primary">Shop</span>.
            </a>

            <div class="hidden md:flex space-x-8 text-sm font-semibold">
                <a href="/" class="text-primary">BERANDA</a>
                <a href="#katalog" class="hover:text-primary transition">PRODUK</a>
            </div>

            <div class="flex items-center gap-4">
                <a href="/produk" class="text-xs font-medium bg-gray-100 px-3 py-1 rounded-full text-gray-500 hover:bg-gray-200 transition">
                    Login Admin
                </a>
                <button class="relative text-gray-600 hover:text-primary transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <span class="absolute -top-1 -right-1 bg-primary text-white text-[10px] w-4 h-4 flex items-center justify-center rounded-full">0</span>
                </button>
            </div>
        </div>
    </nav>

    <header class="container mx-auto px-6 py-12 md:py-24 relative overflow-hidden">
        <div class="flex flex-col-reverse md:flex-row items-center">
            <div class="md:w-1/2 mt-10 md:mt-0 z-10">
                <span class="inline-block py-1 px-3 rounded-full bg-pink-100 text-primary text-xs font-bold mb-4 tracking-wider">
                    NEW COLLECTION 2024
                </span>
                <h1 class="text-4xl md:text-6xl font-bold leading-tight mb-6">
                    Aksesoris Cantik <br>
                    Untuk <span class="text-primary">Gayamu</span>
                </h1>
                <p class="text-gray-500 text-lg mb-8 leading-relaxed max-w-md">
                    Temukan berbagai koleksi aksesoris kekinian. Kualitas premium dengan harga yang ramah di kantong.
                </p>
                <div class="flex gap-4">
                    <a href="#katalog" class="bg-primary hover:bg-primary-hover text-white font-bold py-3 px-8 rounded-full shadow-lg shadow-pink-200 transition transform hover:-translate-y-1">
                        Belanja Sekarang
                    </a>
                    <a href="#testimoni" class="bg-white border-2 border-gray-200 text-gray-600 hover:border-primary hover:text-primary font-bold py-3 px-8 rounded-full transition">
                        Lihat Review
                    </a>
                </div>
            </div>

            <div class="md:w-1/2 relative flex justify-center md:justify-end">
                <div class="blob-bg hidden md:block"></div>
                <img src="https://images.unsplash.com/photo-1515934751635-c81c6bc9a2d8?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                     alt="Model Fashion" 
                     class="relative z-10 rounded-3xl shadow-2xl w-3/4 object-cover transform rotate-2 hover:rotate-0 transition duration-500">
            </div>
        </div>
    </header>

    <section class="bg-white py-12 border-y border-gray-50">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="flex items-center p-6 bg-soft-pink rounded-xl">
                    <div class="p-3 bg-white rounded-full text-primary shadow-sm mr-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg">Produk Original</h3>
                        <p class="text-sm text-gray-500">100% Kualitas Terjamin</p>
                    </div>
                </div>
                <div class="flex items-center p-6 bg-soft-pink rounded-xl">
                    <div class="p-3 bg-white rounded-full text-primary shadow-sm mr-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg">Pengiriman Cepat</h3>
                        <p class="text-sm text-gray-500">Dikirim di hari yang sama</p>
                    </div>
                </div>
                <div class="flex items-center p-6 bg-soft-pink rounded-xl">
                    <div class="p-3 bg-white rounded-full text-primary shadow-sm mr-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg">Support 24/7</h3>
                        <p class="text-sm text-gray-500">Siap melayani via WA</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="katalog" class="container mx-auto px-6 py-16">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900">Koleksi Terpopuler</h2>
            <p class="text-gray-500 mt-2">Pilih yang paling cocok untuk melengkapi OOTD kamu</p>
        </div>

        <?php if(empty($produk)): ?>
            <div class="flex flex-col items-center justify-center py-20 text-center bg-gray-50 rounded-2xl border-2 border-dashed border-gray-200">
                <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                <h3 class="text-lg font-medium text-gray-900">Produk Belum Tersedia</h3>
                <p class="text-gray-500 mb-4">Admin belum menginput data produk.</p>
                <a href="/produk/create" class="text-primary font-bold hover:underline">Tambah Produk Sekarang &rarr;</a>
            </div>
        <?php else: ?>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                <?php foreach ($produk as $p) : ?>
                <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition duration-300 border border-gray-100 overflow-hidden flex flex-col">
                    <div class="relative overflow-hidden bg-gray-100">
                        <img src="/uploads/<?= $p['gambar']; ?>" alt="<?= $p['nama_produk']; ?>" class="product-img group-hover:scale-110 transition duration-500">
                        
                        <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                            <a href="/home/detail/<?= $p['id']; ?>" class="bg-white text-gray-900 font-bold py-2 px-6 rounded-full hover:bg-primary hover:text-white transition transform hover:scale-105 shadow-lg">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                    
                    <div class="p-5 flex flex-col flex-grow">
                        <h3 class="font-bold text-gray-900 mb-1 truncate"><?= $p['nama_produk']; ?></h3>
                        <p class="text-primary font-bold text-lg mb-2">Rp <?= number_format($p['harga'], 0, ',', '.'); ?></p>
                        <p class="text-xs text-gray-400 line-clamp-2 mb-4 flex-grow"><?= $p['deskripsi']; ?></p>
                        
                        <a href="/home/detail/<?= $p['id']; ?>" class="block w-full text-center bg-gray-50 text-gray-600 font-semibold py-2 rounded-lg hover:bg-primary hover:text-white transition">
                            Beli Sekarang
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>

    <section id="testimoni" class="bg-soft-pink py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Kata Mereka <span class="text-primary">Tentang Kami</span></h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-2xl shadow-sm relative">
                    <span class="absolute top-4 right-6 text-6xl text-gray-100 font-serif">"</span>
                    <div class="flex text-yellow-400 mb-4">★★★★★</div>
                    <p class="text-gray-600 italic mb-6 relative z-10">"Suka banget sama kalungnya! Bahannya bagus, nggak gatel dipake, dan packaging-nya aman banget."</p>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center font-bold text-gray-500">D</div>
                        <div>
                            <h4 class="font-bold text-sm">Dina Wulandari</h4>
                            <p class="text-xs text-gray-400">Jakarta Selatan</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm relative transform md:-translate-y-4 border-b-4 border-primary">
                    <span class="absolute top-4 right-6 text-6xl text-gray-100 font-serif">"</span>
                    <div class="flex text-yellow-400 mb-4">★★★★★</div>
                    <p class="text-gray-600 italic mb-6 relative z-10">"Pengiriman super cepat! Kemarin pesen hari ini udah sampe. Barangnya realpict banget sesuai foto."</p>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center font-bold text-gray-500">S</div>
                        <div>
                            <h4 class="font-bold text-sm">Sarah Amalia</h4>
                            <p class="text-xs text-gray-400">Bandung</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm relative">
                    <span class="absolute top-4 right-6 text-6xl text-gray-100 font-serif">"</span>
                    <div class="flex text-yellow-400 mb-4">★★★★★</div>
                    <p class="text-gray-600 italic mb-6 relative z-10">"Adminnya ramah banget diajak konsultasi. Gelangnya lucu, cocok buat kado ulang tahun temen."</p>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center font-bold text-gray-500">R</div>
                        <div>
                            <h4 class="font-bold text-sm">Rini Puspita</h4>
                            <p class="text-xs text-gray-400">Surabaya</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-white pt-16 pb-8 border-t border-gray-100">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center mb-8">
                <div class="mb-6 md:mb-0 text-center md:text-left">
                    <h2 class="text-2xl font-bold">My<span class="text-primary">Shop</span>.</h2>
                    <p class="text-gray-400 text-sm mt-2">Official Store Accessories Terlengkap.</p>
                </div>
                <div class="flex gap-6 text-gray-500">
                    <a href="#" class="hover:text-primary transition">Instagram</a>
                    <a href="#" class="hover:text-primary transition">Shopee</a>
                    <a href="#" class="hover:text-primary transition">WhatsApp</a>
                </div>
            </div>
            <div class="border-t border-gray-100 pt-8 text-center">
                <p class="text-sm text-gray-400">&copy; <?= date('Y'); ?> MyShop Indonesia. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>