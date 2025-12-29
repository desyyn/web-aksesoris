<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

    <header class="container mx-auto px-6 py-12 md:py-20 relative overflow-hidden">
        <div class="flex flex-col-reverse md:flex-row items-center">
            <div class="md:w-1/2 mt-10 md:mt-0 z-10">
                <span class="inline-block py-1 px-3 rounded-full bg-cream text-lilac-dark text-xs font-bold mb-4 tracking-wider border border-cream-dark">
                    NEW ARRIVALS
                </span>
                <h1 class="text-4xl md:text-6xl font-bold leading-tight mb-6 text-gray-800">
                    Handcrafts Things<br> Small Business
                    <span class="text-gradient-geewa">#GEEWA</span>,<br> Based in Banjarmasin, Indonesia.    
                </h1>
                <p class="text-gray-500 text-lg mb-8 max-w-md">Lengkapi penampilanmu dengan koleksi aksesoris terbaru dari geewa.</p>
                
                <a href="/katalog" class="btn-gradient-geewa text-white font-bold py-3 px-8 rounded-full shadow-lg transition transform hover:-translate-y-1 inline-block">
                    Lihat Semua Produk
                </a>
            </div>
            
            <div class="md:w-1/2 relative flex justify-center md:justify-end">
                <div class="absolute right-[-50px] top-[50%] translate-y-[-50%] w-[500px] h-[500px] bg-[#D8AFC8] rounded-full z-[-1] hidden md:block"></div>
                
                <img src="/uploads/logo.jpg" 
                     alt="geewa showcase"
                     class="relative z-10 rounded-3xl shadow-2xl w-3/4 object-contain transform rotate-2 hover:rotate-0 transition duration-500 bg-white">
            </div>
        </div>
    </header>

    <section class="container mx-auto px-6 py-16">
        <div class="flex justify-between items-end mb-12">
            <div>
                <h2 class="text-3xl font-bold text-gray-900">Produk Terbaru</h2>
                <p class="text-gray-500 mt-2">Intip koleksi yang baru saja masuk di geewa</p>
            </div>
            <a href="/katalog" class="hidden md:block text-lilac-dark font-bold hover:underline">Lihat Semua &rarr;</a>
        </div>

        <?php if(empty($produk_terbaru)): ?>
            <div class="text-center py-10 bg-cream/50 rounded-xl text-gray-500 border border-cream-dark">Belum ada produk yang ditampilkan.</div>
        <?php else: ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                <?php foreach ($produk_terbaru as $p) : ?>
                <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition border border-gray-100 overflow-hidden">
                    <div class="relative overflow-hidden bg-gray-50">
                        <img src="/uploads/<?= $p['gambar']; ?>" class="product-img group-hover:scale-110 transition duration-500">
                        <div class="absolute top-2 left-2 bg-white/90 px-2 py-1 rounded text-[10px] font-bold text-lilac-dark shadow-sm">
                            <?= $p['kategori'] ?? 'Aksesoris' ?>
                        </div>
                        <div class="absolute inset-0 bg-black/10 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                            <a href="/home/detail/<?= $p['id']; ?>" class="bg-white text-gray-900 font-bold py-2 px-6 rounded-full hover:text-lilac-dark transition shadow-md">Detail</a>
                        </div>
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-gray-900 mb-1 truncate"><?= $p['nama_produk']; ?></h3>
                        <p class="text-lilac-dark font-bold text-lg">Rp <?= number_format($p['harga'], 0, ',', '.'); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            
            <div class="mt-8 text-center md:hidden">
                <a href="/katalog" class="inline-block bg-cream text-lilac-dark font-bold py-3 px-8 rounded-full hover:bg-lilac hover:text-white transition">Lihat Semua Produk</a>
            </div>
        <?php endif; ?>
    </section>

    <section class="bg-cream/30 py-12 border-t border-cream">
        <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="flex items-center p-6 bg-white rounded-xl shadow-sm border border-cream-dark">
                <div class="p-3 bg-cream rounded-full text-lilac-dark mr-4">★</div>
                <div><h3 class="font-bold">Original</h3><p class="text-sm text-gray-500">Kualitas terjamin dari geewa</p></div>
            </div>
            <div class="flex items-center p-6 bg-white rounded-xl shadow-sm border border-cream-dark">
                <div class="p-3 bg-cream rounded-full text-lilac-dark mr-4">⚡</div>
                <div><h3 class="font-bold">Cepat</h3><p class="text-sm text-gray-500">Pengiriman Kilat</p></div>
            </div>
            <div class="flex items-center p-6 bg-white rounded-xl shadow-sm border border-cream-dark">
                <div class="p-3 bg-cream rounded-full text-lilac-dark mr-4">❤</div>
                <div><h3 class="font-bold">Ramah</h3><p class="text-sm text-gray-500">Pelayanan Terbaik</p></div>
            </div>
        </div>
    </section>

<?= $this->endSection(); ?>