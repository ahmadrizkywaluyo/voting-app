<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Votely - Sistem Voting Digital Terpercaya</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <script src="https://cdn.tailwindcss.com"></script>
        @endif

        <style>
            body { font-family: 'Instrument Sans', sans-serif; }
        </style>
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] antialiased">
        
        <header class="fixed top-0 w-full z-50 bg-[#FDFDFC]/80 dark:bg-[#0a0a0a]/80 backdrop-blur-md border-b border-[#19140015] dark:border-[#3E3E3A]">
            <nav class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-[#F53003] rounded-lg flex items-center justify-center text-white font-bold">V</div>
                    <span class="font-bold text-xl tracking-tight">Votely</span>
                </div>

                <div class="flex items-center gap-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm font-medium px-4 py-2 bg-[#1b1b18] dark:bg-[#eeeeec] text-white dark:text-[#1C1C1A] rounded-full transition-all hover:opacity-90">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-medium hover:text-[#F53003] transition-colors">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-sm font-medium px-4 py-2 border border-[#1b1b18] dark:border-[#eeeeec] rounded-full hover:bg-[#1b1b18] hover:text-white dark:hover:bg-[#eeeeec] dark:hover:text-[#1b1b18] transition-all">Mulai Voting</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </nav>
        </header>

        <main class="pt-32 pb-20">
            <section class="max-w-7xl mx-auto px-6 text-center">
                <span class="inline-block px-4 py-1.5 mb-6 text-xs font-semibold tracking-wider uppercase bg-[#fff2f2] dark:bg-[#1d0002] text-[#F53003] rounded-full">
                    Aman • Cepat • Transparan
                </span>
                <h1 class="text-5xl lg:text-7xl font-bold tracking-tight mb-8 max-w-4xl mx-auto leading-[1.1]">
                    Suara Anda Menentukan <span class="text-[#F53003]">Masa Depan</span>
                </h1>
                <p class="text-lg text-[#706f6c] dark:text-[#A1A09A] max-w-2xl mx-auto mb-10">
                    Platform voting digital modern untuk pemilihan organisasi, sekolah, atau komunitas dengan sistem keamanan tingkat tinggi.
                </p>
                
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="{{ route('register') }}" class="w-full sm:w-auto px-8 py-4 bg-[#F53003] text-white rounded-xl font-semibold text-lg shadow-lg shadow-[#f5300340] hover:scale-105 transition-transform">
                        Buat Voting Sekarang
                    </a>
                    <a href="#features" class="w-full sm:w-auto px-8 py-4 bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-xl font-semibold text-lg hover:bg-gray-50 dark:hover:bg-[#1d1d1c] transition-colors">
                        Pelajari Fitur
                    </a>
                </div>
            </section>

            <section class="mt-24 border-y border-[#e3e3e0] dark:border-[#3E3E3A] py-12 bg-gray-50/50 dark:bg-[#161615]/30">
                <div class="max-w-7xl mx-auto px-6 flex flex-wrap justify-center gap-12 lg:gap-24">
                    <div class="text-center">
                        <div class="text-3xl font-bold">10k+</div>
                        <div class="text-sm text-[#706f6c]">Pemilih Aktif</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold">500+</div>
                        <div class="text-sm text-[#706f6c]">Instansi Terdaftar</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold">99.9%</div>
                        <div class="text-sm text-[#706f6c]">Real-time Accuracy</div>
                    </div>
                </div>
            </section>

            <section id="features" class="max-w-7xl mx-auto px-6 mt-32">
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="p-8 rounded-2xl bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A]">
                        <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 text-blue-600 rounded-lg flex items-center justify-center mb-6">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04kM12 20.944a11.955 11.955 0 01-8.618-3.04A11.952 11.952 0 0012 21.483c2.59 0 4.97-.818 6.908-2.213a11.954 11.954 0 01-8.618 3.04z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Enkripsi End-to-End</h3>
                        <p class="text-[#706f6c] dark:text-[#A1A09A]">Setiap suara yang masuk dienkripsi secara ketat untuk menjamin kerahasiaan pilihan pemilih.</p>
                    </div>

                    <div class="p-8 rounded-2xl bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A]">
                        <div class="w-12 h-12 bg-green-100 dark:bg-green-900/30 text-green-600 rounded-lg flex items-center justify-center mb-6">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Hasil Real-time</h3>
                        <p class="text-[#706f6c] dark:text-[#A1A09A]">Pantau perolehan suara secara langsung melalui dashboard interaktif yang transparan.</p>
                    </div>

                    <div class="p-8 rounded-2xl bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A]">
                        <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/30 text-purple-600 rounded-lg flex items-center justify-center mb-6">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Multi Perangkat</h3>
                        <p class="text-[#706f6c] dark:text-[#A1A09A]">Pemilih dapat memberikan suaranya dengan mudah melalui smartphone, tablet, maupun desktop.</p>
                    </div>
                </div>
            </section>
        </main>

        <footer class="py-12 border-t border-[#e3e3e0] dark:border-[#3E3E3A] text-center text-sm text-[#706f6c]">
            <p>&copy; 2025 Votely by Ahmad Rizky Waluyo. All rights reserved.</p>
        </footer>
    </body>
</html>