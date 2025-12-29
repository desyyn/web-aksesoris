<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

    <div class="bg-white py-8 border-b border-cream-dark">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Katalog Lengkap</h1>
            <p class="text-gray-500 mb-6">Temukan koleksi aksesoris favoritmu</p>
            
            <div class="flex justify-center items-center gap-3">
                <span class="text-sm font-bold text-gray-600">Pilih Kategori:</span>
                
                <?php 
                    // 1. Definisi Data Kategori
                    $cats = [
                        'Gelang' => 'Gelang', 
                        'Kalung' => 'Kalung', 
                        'Gantungan Kunci' => 'Gantungan Kunci', 
                        'Flower Lamp' => 'Flower Lamp'
                    ];

                    // 2. Menentukan Label Tombol saat ini
                    $currentLabel = 'Semua Kategori';
                    if (!empty($current_kategori) && array_key_exists($current_kategori, $cats)) {
                        $currentLabel = $cats[$current_kategori];
                    }
                ?>

                <div class="relative inline-block text-left w-64 z-30">
                    
                    <button type="button" onclick="toggleDropdown()" id="menu-button" 
                            class="inline-flex justify-between items-center w-full rounded-xl border border-cream-dark shadow-sm px-4 py-3 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lilac transition-all duration-200">
                        <span><?= $currentLabel ?></span>
                        <svg class="-mr-1 ml-2 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <div id="dropdown-menu" class="hidden origin-top-right absolute right-0 mt-2 w-full rounded-xl shadow-[0_10px_40px_-15px_rgba(0,0,0,0.1)] bg-white ring-1 ring-black ring-opacity-5 focus:outline-none overflow-hidden transform transition-all duration-200 z-50">
                        <div class="py-1">
                            
                            <?php $isAllActive = empty($current_kategori); ?>
                            <a href="/katalog" 
                               class="block px-4 py-3 text-sm transition-colors duration-200 <?= $isAllActive ? 'bg-[#FFF0F0] text-[#D97777] font-bold' : 'text-gray-700 hover:bg-[#FFF0F0] hover:text-[#D97777]' ?>">
                                Semua Kategori
                            </a>
                            
                            <?php foreach($cats as $key => $label): ?>
                                <?php $isActive = ($current_kategori == $key); ?>
                                <a href="/katalog?kategori=<?= $key ?>" 
                                   class="block px-4 py-3 text-sm transition-colors duration-200 <?= $isActive ? 'bg-[#FFF0F0] text-[#D97777] font-bold' : 'text-gray-700 hover:bg-[#FFF0F0] hover:text-[#D97777]' ?>">
                                    <?= $label ?>
                                </a>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
            </div>
            </div>
    </div>

    <section class="container mx-auto px-6 py-12 mb-auto">
        <?php if(empty($produk)): ?>
            <div class="text-center py-20 bg-cream/30 rounded-2xl border-2 border-dashed border-cream-dark">
                <p class="text-gray-500 text-lg">Tidak ada produk ditemukan untuk kategori ini.</p>
                <a href="/katalog" class="text-lilac-dark font-bold mt-2 inline-block hover:underline">Lihat Semua Produk</a>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                <?php foreach ($produk as $p) : ?>
                <div class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition duration-300 border border-gray-100 overflow-hidden flex flex-col">
                    <div class="relative overflow-hidden bg-gray-50">
                        <img src="/uploads/<?= $p['gambar']; ?>" class="product-img w-full object-cover aspect-square group-hover:scale-110 transition duration-500">
                        <div class="absolute top-2 left-2 bg-white/90 backdrop-blur px-2 py-1 rounded text-xs font-bold text-lilac-dark shadow-sm">
                            <?= $p['kategori'] ?? 'Aksesoris' ?>
                        </div>
                        <div class="absolute inset-0 bg-black/10 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                            <a href="/home/detail/<?= $p['id']; ?>" class="bg-white text-gray-900 font-bold py-2 px-6 rounded-full hover:text-lilac-dark transition shadow-lg">Lihat Detail</a>
                        </div>
                    </div>
                    <div class="p-5 flex flex-col flex-grow">
                        <h3 class="font-bold text-gray-900 mb-1 truncate"><?= $p['nama_produk']; ?></h3>
                        <p class="text-lilac-dark font-bold text-lg mb-2">Rp <?= number_format($p['harga'], 0, ',', '.'); ?></p>
                        <p class="text-xs text-gray-400 line-clamp-2 mb-4 flex-grow"><?= $p['deskripsi']; ?></p>
                        
                        <a href="/home/detail/<?= $p['id']; ?>" class="block w-full text-center bg-cream text-lilac-dark font-bold py-2 rounded-lg hover:bg-lilac hover:text-white transition">Beli Sekarang</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            
            <div class="mt-8">
                <?= $pager->links('default', 'geewa_pagination') ?>
            </div>
        <?php endif; ?>
    </section>

    <script>
        function toggleDropdown() {
            document.getElementById('dropdown-menu').classList.toggle('hidden');
        }

        // Menutup dropdown jika klik di luar area
        window.onclick = function(event) {
            if (!event.target.closest('.relative')) {
                var dropdowns = document.getElementById("dropdown-menu");
                if (!dropdowns.classList.contains('hidden')) {
                    dropdowns.classList.add('hidden');
                }
            }
        }
    </script>

<?= $this->endSection(); ?>