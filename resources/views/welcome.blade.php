<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FreshFarm - Produk Peternakan Segar</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans">

    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-black text-green-600 italic tracking-tighter">FRESH<span class="text-gray-900">FARM.</span></h1>
            <div class="flex items-center gap-6">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm font-bold text-gray-700 hover:text-green-600 transition">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-bold text-gray-700">Masuk</a>
                        <a href="{{ route('register') }}" class="bg-green-600 text-white px-6 py-2.5 rounded-2xl text-sm font-bold shadow-lg shadow-green-200 hover:bg-green-700 transition">Daftar</a>
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <header class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <span class="bg-green-100 text-green-700 px-4 py-1.5 rounded-full text-xs font-black uppercase tracking-widest">Kualitas Terbaik</span>
            <h2 class="text-5xl md:text-7xl font-black text-gray-900 mt-6 mb-4 tracking-tight">Hasil Ternak Segar <br> <span class="text-green-600">Langsung ke Meja Anda.</span></h2>
            <p class="text-gray-500 max-w-2xl mx-auto text-lg">Kami menyediakan produk ayam dan telur berkualitas tinggi dari peternakan lokal yang dikelola dengan standar modern.</p>
        </div>
    </header>

    <section class="py-20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex items-end justify-between mb-12">
                <div>
                    <h3 class="text-3xl font-bold text-gray-900">Katalog Produk</h3>
                    <p class="text-gray-500 mt-1">Pilih produk segar untuk kebutuhan protein Anda.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @forelse($products as $product)
                <div class="group bg-white rounded-[2.5rem] overflow-hidden border border-gray-100 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                    <div class="relative aspect-square overflow-hidden">
                        <img src="{{ asset('storage/'.$product->gambar) }}" alt="{{ $product->nama_produk }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500" onerror="this.src='https://placehold.co/400x400?text=Produk+Segar'">
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-[10px] font-black uppercase text-gray-900">Stok: {{ $product->stok }}</div>
                    </div>
                    <div class="p-8">
                        <h4 class="text-xl font-bold text-gray-900 mb-1 capitalize">{{ $product->nama_produk }}</h4>
                        <p class="text-green-600 font-black text-2xl mb-6">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                        
                        <button class="w-full bg-gray-900 text-white py-4 rounded-2xl font-bold hover:bg-green-600 shadow-lg transition-colors duration-300 flex items-center justify-center gap-2">
                            <span>Beli Sekarang</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                        </button>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-20">
                    <p class="text-gray-400 italic">Mohon maaf, saat ini belum ada produk yang tersedia.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <footer class="bg-white border-t border-gray-100 py-12">
        <div class="text-center">
            <p class="text-gray-400 text-xs font-bold uppercase tracking-[0.3em]">© 2025 FreshFarm Peternakan Ayam Modern</p>
        </div>
    </footer>

</body>
</html>