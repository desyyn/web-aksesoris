<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrator - Geewa</title>
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
                        'soft': '0 10px 40px -10px rgba(0,0,0,0.1)',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gradient-to-br from-cream via-white to-gray-50 h-screen flex justify-center items-center p-6">

    <div class="w-full max-w-md bg-white/80 backdrop-blur-xl rounded-3xl shadow-soft border border-white p-8 md:p-10 relative overflow-hidden">
        
        <div class="absolute -top-10 -right-10 w-32 h-32 bg-lilac/20 rounded-full blur-2xl"></div>
        <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-cream-dark/30 rounded-full blur-2xl"></div>

        <div class="text-center mb-8 relative z-10">
            <img src="/uploads/logo.jpg" alt="Geewa Logo" class="h-20 mx-auto object-contain mb-4 drop-shadow-sm">
            <h2 class="text-2xl font-bold text-gray-800">Welcome Back!</h2>
            <p class="text-gray-500 text-sm mt-1">Silakan login untuk mengelola toko.</p>
        </div>

        <?php if(session()->getFlashdata('msg')):?>
            <div class="flex items-center bg-red-50 border-l-4 border-red-400 text-red-600 px-4 py-3 rounded-lg mb-6 shadow-sm animate-pulse">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span class="text-sm font-medium"><?= session()->getFlashdata('msg') ?></span>
            </div>
        <?php endif;?>

        <form action="/login/auth" method="post" class="space-y-5 relative z-10">
            
            <div>
                <label class="block text-gray-600 text-sm font-bold mb-2 ml-1">Username</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <input type="text" name="username" 
                           class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-lilac focus:border-transparent transition text-gray-700 placeholder-gray-400" 
                           placeholder="Masukkan username admin" required>
                </div>
            </div>

            <div>
                <label class="block text-gray-600 text-sm font-bold mb-2 ml-1">Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <input type="password" name="password" id="passwordInput"
                           class="w-full pl-10 pr-10 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-lilac focus:border-transparent transition text-gray-700 placeholder-gray-400" 
                           placeholder="Masukkan password" required>
                    
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer" onclick="togglePassword()">
                        <svg id="eyeIcon" class="h-5 w-5 text-gray-400 hover:text-lilac-dark transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </div>
                </div>
            </div>

            <button type="submit" class="w-full bg-gradient-to-r from-lilac to-lilac-dark text-white font-bold py-3 rounded-xl shadow-lg hover:shadow-xl hover:opacity-90 transition transform hover:-translate-y-0.5">
                Masuk Dashboard
            </button>

        </form>
        
        <div class="mt-8 text-center border-t border-gray-100 pt-6">
            <a href="/" class="text-sm font-medium text-gray-400 hover:text-lilac-dark transition flex items-center justify-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Web Utama
            </a>
        </div>
    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('passwordInput');
            const icon = document.getElementById('eyeIcon');
            
            if (input.type === "password") {
                input.type = "text";
                // Icon mata dicoret (Hidden state visual) - optional, for simplicity we just keep same icon or change color
                icon.classList.add('text-lilac-dark');
            } else {
                input.type = "password";
                icon.classList.remove('text-lilac-dark');
            }
        }
    </script>

</body>
</html>