<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'geewa - Aksesoris Fashion'; ?></title> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                fontFamily: { 'sans': ['Poppins', 'sans-serif'] },
                extend: {
                    colors: {
                        'cream': '#FAF1DC',
                        'cream-dark': '#F5E6C6',
                        'lilac': '#D8AFC8',
                        'lilac-dark': '#C08BAB',
                    },
                    boxShadow: {
                        'soft': '0 10px 40px -10px rgba(0,0,0,0.08)',
                    }
                }
            }
        }
    </script>
    <style>
        .product-img { height: 250px; width: 100%; object-fit: cover; }
        
        .text-gradient-geewa { 
            background: linear-gradient(to right, #C08BAB, #8B2F97); 
            -webkit-background-clip: text; 
            -webkit-text-fill-color: transparent; 
        }
        
        .btn-gradient-geewa { 
            background: linear-gradient(to right, #D8AFC8, #C08BAB); 
        }
        .btn-gradient-geewa:hover { 
            background: linear-gradient(to right, #C08BAB, #A67593); 
        }
        
        .blob-bg { 
            position: absolute; right: -50px; top: 50%; transform: translateY(-50%); 
            width: 500px; height: 500px; 
            background-color: #D8AFC8;
            border-radius: 50%; z-index: -1; 
        }

        /* ANIMASI DROPDOWN CANTIK */
        .nav-item .dropdown-menu {
            opacity: 0;
            visibility: hidden;
            transform: translateY(15px) scale(0.95);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .nav-item:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0) scale(1);
        }
    </style>
</head>
<body class="bg-white text-gray-800 font-sans min-h-screen flex flex-col">

    <?php $uri = service('uri'); ?>

    <nav class="bg-white/90 backdrop-blur-md sticky top-0 z-50 border-b border-gray-100 transition-all duration-300">
        <div class="container mx-auto px-6 py-2 flex flex-col md:flex-row justify-between items-center gap-4">
            
            <a href="/" class="flex items-center group">
                <img src="/uploads/logo.jpg" alt="geewa logo" class="h-16 md:h-20 object-contain transition transform group-hover:scale-105 duration-300">
            </a>
            
            <div class="hidden md:flex items-center gap-2 text-sm font-semibold text-gray-600">
                
                <a href="/" class="px-4 py-2 rounded-full transition-colors hover:text-lilac-dark hover:bg-gray-50 <?= $uri->getSegment(1) == '' ? 'text-lilac-dark font-bold bg-gray-50' : '' ?>">
                    BERANDA
                </a>

                <div class="relative nav-item h-full flex items-center">
                    <a href="/katalog" class="flex items-center gap-1 px-4 py-2 rounded-full transition-colors hover:text-lilac-dark hover:bg-gray-50 <?= $uri->getSegment(1) == 'katalog' ? 'text-lilac-dark font-bold bg-gray-50' : '' ?>">
                        KATALOG PRODUK
                        <svg class="w-4 h-4 transition-transform duration-300 nav-item:hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </a>

                    <div class="dropdown-menu absolute top-full left-1/2 -translate-x-1/2 pt-4 w-56 z-50">
                        <div class="bg-white rounded-2xl shadow-soft border border-gray-100 overflow-hidden p-2">
                            
                            <a href="/katalog" class="block px-4 py-2.5 rounded-xl hover:bg-cream text-gray-700 hover:text-lilac-dark transition-colors font-medium">
                                ✨ Lihat Semua
                            </a>
                            
                            <div class="h-px bg-gray-100 my-1 mx-2"></div>
                            
                            <a href="/katalog?kategori=Gelang" class="flex items-center gap-3 px-4 py-2.5 rounded-xl hover:bg-cream text-gray-600 hover:text-lilac-dark transition-colors">
                                <span class="w-1.5 h-1.5 rounded-full bg-lilac"></span> Gelang
                            </a>
                            <a href="/katalog?kategori=Kalung" class="flex items-center gap-3 px-4 py-2.5 rounded-xl hover:bg-cream text-gray-600 hover:text-lilac-dark transition-colors">
                                <span class="w-1.5 h-1.5 rounded-full bg-lilac"></span> Kalung
                            </a>
                            <a href="/katalog?kategori=Gantungan%20Kunci" class="flex items-center gap-3 px-4 py-2.5 rounded-xl hover:bg-cream text-gray-600 hover:text-lilac-dark transition-colors">
                                <span class="w-1.5 h-1.5 rounded-full bg-lilac"></span> Gantungan Kunci
                            </a>
                            <a href="/katalog?kategori=Flower%20Lamp" class="flex items-center gap-3 px-4 py-2.5 rounded-xl hover:bg-cream text-gray-600 hover:text-lilac-dark transition-colors">
                                <span class="w-1.5 h-1.5 rounded-full bg-lilac"></span> Flower Lamp
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="flex items-center gap-4">
                <?php if(session()->get('logged_in')): ?>
                    <a href="/produk" class="flex items-center gap-2 bg-lilac hover:bg-lilac-dark text-white text-xs font-bold px-5 py-2.5 rounded-full shadow-md transition transform hover:-translate-y-0.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                        Dashboard
                    </a>
                    <a href="/logout" class="text-xs font-bold text-red-400 hover:text-red-600 border border-red-200 hover:bg-red-50 px-4 py-2.5 rounded-full transition">
                        Logout
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <?= $this->renderSection('content'); ?>

    <footer class="bg-white border-t border-gray-100 pt-16 pb-8 mt-auto">
        <div class="container mx-auto px-6 text-center">
            
            <img src="/uploads/logo.jpg" alt="geewa logo" class="h-16 mb-4 object-contain mx-auto opacity-90">
            
            <p class="text-gray-500 text-sm mb-6 max-w-md mx-auto">Menyediakan berbagai pilihan aksesoris handmade berkualitas dengan sentuhan modern untuk menyempurnakan gayamu.</p>
            
            <div class="flex justify-center gap-8 text-sm font-medium text-gray-600">
                <a href="/" class="hover:text-lilac-dark transition">Beranda</a>
                <a href="/katalog" class="hover:text-lilac-dark transition">Katalog</a>
                <a href="https://instagram.com/geewa.a" target="_blank" class="hover:text-lilac-dark text-lilac-dark font-bold transition flex items-center gap-1">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    @geewa.a
                </a>
            </div>
            
            <p class="text-xs text-gray-400 mt-8 flex justify-center items-center gap-1">
                &copy; <?= date('Y'); ?> geewa. All rights reserved. 
                
                <?php if(!session()->get('logged_in')): ?>
                    <span class="mx-1 text-gray-300">|</span>
                    <a href="/login" class="text-gray-300 hover:text-lilac-dark transition font-medium" title="Login Admin">
                        Login Admin
                    </a>
                <?php endif; ?>
            </p>
        </div>
    </footer>
</body>
</html>