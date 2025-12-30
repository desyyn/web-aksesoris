<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="container mx-auto px-6 py-6">
        <div class="text-sm breadcrumbs text-gray-500">
            <a href="/" class="hover:text-lilac-dark">Beranda</a> 
            <span class="mx-2">/</span> 
            <a href="/katalog" class="hover:text-lilac-dark">Katalog</a>
            <span class="mx-2">/</span> 
            <span class="text-gray-800 font-medium"><?= $item['nama_produk']; ?></span>
        </div>
    </div>

    <section class="container mx-auto px-6 pb-16 mb-auto">
        <div class="bg-white rounded-3xl shadow-sm border border-cream-dark overflow-hidden">
            <div class="flex flex-col md:flex-row">
                
                <div class="md:w-1/2 bg-gray-50 relative p-8 flex items-center justify-center">
                    <img src="/uploads/<?= $item['gambar']; ?>" 
                         alt="<?= $item['nama_produk']; ?>" 
                         class="max-h-[500px] w-auto object-contain rounded-xl shadow-lg">
                </div>

                <div class="md:w-1/2 p-8 md:p-12 flex flex-col justify-center">
                    
                    <span class="inline-block px-3 py-1 bg-cream text-lilac-dark text-xs font-bold rounded-full w-max mb-4">
                        <?= $item['kategori'] ?? 'Aksesoris' ?>
                    </span>

                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 leading-tight">
                        <?= $item['nama_produk']; ?>
                    </h1>
                    
                    <div class="text-3xl font-bold text-lilac-dark mb-8">
                        Rp <?= number_format($item['harga'], 0, ',', '.'); ?>
                    </div>

                    <div class="border-t border-b border-gray-100 py-6 mb-8">
                        <h3 class="font-bold text-gray-900 mb-3 text-sm uppercase tracking-wide">Deskripsi Produk</h3>
                        <div class="prose text-gray-600 leading-relaxed text-sm">
                            <?= nl2br(esc($item['deskripsi'])); ?>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <?php 
                            // Persiapan Data untuk Script
                            $textIG = "Halo Admin Geewa, saya tertarik order:%0A" . 
                                      "Produk: " . $item['nama_produk'] . "%0A" . 
                                      "Harga: Rp " . number_format($item['harga'], 0, ',', '.') . "%0A" . 
                                      "Link: " . base_url('home/detail/' . $item['id']);
                            
                            $linkIG = "https://ig.me/m/geewa.a";
                        ?>

                        <a href="#" 
                           onclick="handleOrder(event, '<?= $textIG; ?>', '<?= $linkIG; ?>')"
                           class="w-full btn-gradient-geewa text-white font-bold py-4 px-6 rounded-xl text-center transition shadow-lg flex items-center justify-center gap-3 transform hover:-translate-y-1 cursor-pointer">
                            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                            Pesan via Instagram DM 
                        </a>

                        <a href="/katalog" class="block w-full text-center text-gray-500 font-medium py-3 hover:text-lilac-dark transition text-sm border border-gray-200 rounded-xl hover:bg-cream">
                            Kembali ke Katalog
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <script>
        function handleOrder(e, textEncoded, url) {
            // 1. Matikan fungsi link bawaan agar tidak langsung pindah tab
            e.preventDefault();

            // 2. Decode teks agar rapi
            const text = decodeURIComponent(textEncoded);

            // 3. Salin ke Clipboard
            navigator.clipboard.writeText(text).then(function() {
                
                // 4. Tampilkan Alert Cantik (SweetAlert2)
                Swal.fire({
                    title: 'Berhasil Disalin! ✨',
                    text: 'Detail pesanan sudah disalin. Silakan "Tempel" (Paste) di chat Instagram ya!',
                    icon: 'success',
                    confirmButtonText: 'Buka Instagram Sekarang',
                    confirmButtonColor: '#C08BAB', // Warna Lilac sesuai tema
                    background: '#fff',
                    timer: 4000, // Otomatis tutup dalam 4 detik jika user diam
                    timerProgressBar: true
                }).then((result) => {
                    // 5. Setelah user klik OK atau Timer habis -> Buka Link
                    window.open(url, '_blank');
                });

            }, function(err) {
                // Error handling (Jaga-jaga)
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Gagal menyalin otomatis. Mohon screenshot halaman ini.',
                });
            });
        }
    </script>

<?= $this->endSection(); ?>