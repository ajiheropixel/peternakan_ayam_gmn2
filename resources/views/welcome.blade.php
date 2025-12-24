<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FreshFarm - Modern Poultry Solution</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus+Jakarta+Sans', sans-serif; }
    </style>
</head>
<body class="bg-white text-gray-900">

    <nav class="fixed w-full z-50 bg-white/70 backdrop-blur-lg border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-6 h-20 flex justify-between items-center">
            <div class="text-2xl font-black text-green-600 italic tracking-tighter">FRESH<span class="text-black">FARM.</span></div>
            <div class="hidden md:flex gap-8 text-sm font-bold uppercase tracking-widest text-gray-500">
                <a href="#home" class="hover:text-green-600 transition">Beranda</a>
                <a href="#produk" class="hover:text-green-600 transition">Produk</a>
                <a href="#tentang" class="hover:text-green-600 transition">Tentang Kami</a>
            </div>
            <div class="flex items-center gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="px-6 py-2.5 bg-black text-white rounded-2xl text-sm font-bold hover:bg-green-600 transition">Dashboard</a>
                @else
                    <a href="{{ route('register') }}" class="text-sm font-bold">Register</a>
                    <a href="{{ route('login') }}" class="px-6 py-2.5 bg-green-600 text-white rounded-2xl text-sm font-bold shadow-lg shadow-green-200 hover:bg-green-700 transition">Masuk Sekarang</a>
                @endauth
            </div>
        </div>
    </nav>

    <section id="home" class="pt-32 pb-20 px-6">
        <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-12 items-center">
            <div>
                <span class="inline-block px-4 py-2 bg-green-50 text-green-700 rounded-full text-xs font-black uppercase tracking-widest mb-6">Farm-to-Table Experience</span>
                <h1 class="text-6xl md:text-8xl font-black leading-[0.9] tracking-tighter mb-8">
                    Protein <span class="text-green-600">Terbaik</span> <br> Untuk Keluarga.
                </h1>
                <p class="text-lg text-gray-500 mb-10 max-w-md">Kami mengintegrasikan teknologi IoT pada peternakan untuk memastikan setiap ayam dan telur yang sampai ke tangan Anda memiliki kualitas Grade A.</p>
                <div class="flex gap-4">
                    <a href="#produk" class="px-8 py-4 bg-black text-white rounded-2xl font-bold hover:scale-105 transition">Belanja Sekarang</a>
                    <div class="flex -space-x-3 items-center ml-4">
                        <div class="w-10 h-10 rounded-full bg-gray-200 border-2 border-white"></div>
                        <div class="w-10 h-10 rounded-full bg-gray-300 border-2 border-white"></div>
                        <p class="pl-6 text-xs font-bold text-gray-400 uppercase">DIPERCAYA 2K+ IBU RUMAH TANGGA</p>
                    </div>
                </div>
            </div>
            <div class="relative">
                <div class="w-full aspect-square bg-green-100 rounded-[3rem] overflow-hidden rotate-3 shadow-2xl">
                    <img src="https://images.unsplash.com/photo-1548550023-2bdb3c5beed7?q=80&w=1000&auto=format&fit=crop" class="w-full h-full object-cover -rotate-3 scale-110">
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-12">
            <div class="p-10 bg-white rounded-[2.5rem] shadow-sm">
                <div class="w-14 h-14 bg-green-100 rounded-2xl flex items-center justify-center mb-6 text-green-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="text-xl font-black mb-4 uppercase italic">100% Organik</h3>
                <p class="text-gray-500 text-sm leading-relaxed">Tanpa suntikan hormon atau bahan kimia berbahaya. Ayam tumbuh secara alami dengan pakan bernutrisi tinggi.</p>
            </div>
            <div class="p-10 bg-white rounded-[2.5rem] shadow-sm">
                <div class="w-14 h-14 bg-blue-100 rounded-2xl flex items-center justify-center mb-6 text-blue-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <h3 class="text-xl font-black mb-4 uppercase italic">Pengiriman Cepat</h3>
                <p class="text-gray-500 text-sm leading-relaxed">Sistem logistik terintegrasi memastikan produk sampai ke rumah Anda maksimal 3 jam setelah dipanen.</p>
            </div>
            <div class="p-10 bg-white rounded-[2.5rem] shadow-sm">
                <div class="w-14 h-14 bg-orange-100 rounded-2xl flex items-center justify-center mb-6 text-orange-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="text-xl font-black mb-4 uppercase italic">Harga Petani</h3>
                <p class="text-gray-500 text-sm leading-relaxed">Memotong rantai distribusi panjang, sehingga Anda mendapatkan harga terbaik langsung dari sumbernya.</p>
            </div>
        </div>
    </section>

    <section id="produk" class="py-24">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-black italic tracking-tighter uppercase mb-2">Produk Unggulan Kami</h2>
                <p class="text-gray-400 uppercase text-xs font-bold tracking-[0.3em]">Terbatas & Selalu Segar Setiap Hari</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-10">
                @foreach($products as $product)
                <div class="group relative">
                    <div class="aspect-[4/5] bg-gray-100 rounded-[2.5rem] overflow-hidden mb-6">
                        <img src="{{ asset('storage/'.$product->gambar) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-5 left-5">
                            <span class="px-4 py-1.5 bg-white/90 backdrop-blur rounded-full text-[10px] font-black uppercase tracking-widest">Tersedia</span>
                        </div>
                    </div>
                    <h4 class="text-lg font-black uppercase italic mb-1">{{ $product->nama_produk }}</h4>
                    <p class="text-2xl font-black text-green-600 mb-4">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                    <button class="w-full py-4 border-2 border-black rounded-2xl font-black uppercase text-xs tracking-widest hover:bg-black hover:text-white transition">Tambah ke Keranjang</button>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-24 bg-black text-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-20 items-center">
            <div>
                <h2 class="text-5xl font-black tracking-tighter italic mb-8 uppercase leading-none">Apa Kata <br> Pelanggan Kami?</h2>
                <div class="p-8 border-l-4 border-green-500 bg-white/5">
                    <p class="text-xl italic mb-6 text-gray-300">"Kualitas ayamnya beda banget sama di pasar. Lebih bersih, nggak bau, dan pas dimasak dagingnya empuk banget. Langganan terus tiap minggu!"</p>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-green-500"></div>
                        <div>
                            <p class="font-bold">Sarah Wijaya</p>
                            <p class="text-xs text-gray-500 uppercase font-bold">Food Blogger</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="aspect-square bg-white/10 rounded-3xl"></div>
                <div class="aspect-square bg-green-600 rounded-3xl mt-12"></div>
            </div>
        </div>
    </section>
<section id="tentang" class="py-32 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-2 gap-24 items-center">
            
            <div class="relative">
                <div class="absolute -top-12 -left-12 w-64 h-64 bg-green-50 rounded-full blur-3xl opacity-70"></div>
                
                <div class="relative space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <img src="https://images.unsplash.com/photo-1706543051894-879487d26f4f?q=80&w=687&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                        <img src="https://images.unsplash.com/photo-1548550023-2bdb3c5beed7?q=80&w=500" class="rounded-[2rem] shadow-lg mt-8 hover:scale-105 transition duration-500">
                    </div>
                    <div class="bg-black p-8 rounded-[2.5rem] text-white">
                        <p class="text-3xl font-black italic mb-2">10+ Tahun</p>
                        <p class="text-xs uppercase tracking-[0.2em] font-bold text-gray-400">Pengalaman dalam Industri Peternakan Modern</p>
                    </div>
                </div>
            </div>

            <div>
                <span class="text-green-600 font-black uppercase text-xs tracking-[0.3em] mb-4 block">Our Story</span>
                <h2 class="text-5xl font-black tracking-tighter italic leading-none mb-8 uppercase">Dedikasi Untuk <br> Kualitas <span class="text-green-600 underline decoration-4 underline-offset-8">Terbaik.</span></h2>
                
                <div class="space-y-6 text-gray-500 leading-relaxed">
                    <p>Berawal dari keprihatinan kami terhadap sulitnya mendapatkan protein hewani yang benar-benar bersih dan tanpa hormon, **FreshFarm** hadir sebagai solusi peternakan transparan.</p>
                    
                    <p>Kami tidak hanya sekadar menjual ayam dan telur. Kami menjual hasil kerja keras para peternak lokal yang dibekali teknologi modern untuk memastikan setiap butir telur dan setiap gram daging yang Anda konsumsi adalah yang paling sehat di kelasnya.</p>
                </div>

                <div class="mt-12 grid grid-cols-2 gap-8 border-t border-gray-100 pt-12">
                    <div>
                        <h4 class="text-gray-900 font-black text-xl mb-1 italic uppercase">Visi</h4>
                        <p class="text-sm text-gray-400">Menjadi pemasok protein utama yang paling transparan di Indonesia.</p>
                    </div>
                    <div>
                        <h4 class="text-gray-900 font-black text-xl mb-1 italic uppercase">Misi</h4>
                        <p class="text-sm text-gray-400">Pemberdayaan peternak lokal dengan standar teknologi global.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="py-20 px-6">
    <div class="max-w-7xl mx-auto bg-green-600 rounded-[3.5rem] p-12 md:p-24 text-center relative overflow-hidden shadow-2xl shadow-green-200">
        <div class="absolute top-0 right-0 w-96 h-96 bg-white/10 rounded-full -mr-20 -mt-20 blur-3xl"></div>
        
        <div class="relative z-10">
            <h2 class="text-4xl md:text-6xl font-black text-white mb-8 tracking-tighter italic uppercase">Siap Menikmati <br> Hasil Ternak Segar?</h2>
            <div class="flex flex-col md:flex-row gap-4 justify-center items-center">
                <a href="{{ route('register') }}" class="px-12 py-5 bg-white text-green-600 rounded-2xl font-black uppercase tracking-widest hover:bg-black hover:text-white transition-all duration-300">
                    Daftar Sekarang
                </a>
                <p class="text-green-100 font-bold italic">Gratis pengiriman untuk 100 pendaftar pertama hari ini!</p>
            </div>
        </div>
    </div>
</section>
    <footer class="pt-24 pb-12 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-12 mb-20">
                <div class="col-span-2">
                    <div class="text-3xl font-black text-green-600 italic tracking-tighter mb-6">FRESH<span class="text-black">FARM.</span></div>
                    <p class="text-gray-400 max-w-sm">Membangun masa depan peternakan Indonesia dengan teknologi dan integritas. Segar dari kandang, langsung ke piring Anda.</p>
                </div>
                <div>
                    <h5 class="font-black uppercase text-xs tracking-widest mb-6">Menu</h5>
                    <ul class="text-gray-500 space-y-4 text-sm font-bold">
                        <li><a href="#" class="hover:text-black">Katalog Produk</a></li>
                        <li><a href="#" class="hover:text-black">Tentang Kami</a></li>
                        <li><a href="#" class="hover:text-black">Hubungi Kami</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="font-black uppercase text-xs tracking-widest mb-6">Kontak</h5>
                    <ul class="text-gray-500 space-y-4 text-sm font-bold">
                        <li>hello@freshfarm.id</li>
                        <li>+62 812 3456 7890</li>
                        <li>Jakarta, Indonesia</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-100 pt-12 text-center">
                <p class="text-gray-400 text-[10px] font-black uppercase tracking-[0.4em]">© 2025 UAS PEMROGRAMAN WEB - ALL RIGHTS RESERVED</p>
            </div>
        </div>
    </footer>

</body>
</html>