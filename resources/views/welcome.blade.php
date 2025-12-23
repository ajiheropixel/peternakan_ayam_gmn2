<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FarmFresh - Peternakan Ayam Modern</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body class="bg-white text-gray-800">

    <nav class="flex justify-between items-center p-6 max-w-7xl mx-auto">
        <h1 class="text-2xl font-bold text-green-700 italic">FarmFresh.</h1>
        <div class="space-x-6 font-medium">
            <a href="#about" class="hover:text-green-600">Tentang</a>
            <a href="#products" class="hover:text-green-600">Katalog</a>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="bg-green-600 text-white px-4 py-2 rounded-lg">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-gray-600">Login</a>
                @endauth
            @endif
        </div>
    </nav>

    <header class="bg-green-50 py-20 px-6">
        <div class="max-w-7xl mx-auto text-center" data-aos="zoom-in">
            <h2 class="text-5xl font-extrabold text-gray-900 mb-4">Ayam Segar Langsung Dari <span class="text-green-600">Kandang.</span></h2>
            <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto">Kami menyediakan ayam kualitas terbaik dengan perawatan modern dan pakan organik untuk konsumsi sehat keluarga Anda.</p>
            <a href="#products" class="bg-green-600 text-white px-8 py-3 rounded-full text-lg font-bold shadow-lg shadow-green-200 hover:bg-green-700 transition">Lihat Produk</a>
        </div>
    </header>

    <section id="products" class="py-20 max-w-7xl mx-auto px-6">
        <h3 class="text-3xl font-bold text-center mb-12">Produk Unggulan Kami</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($products as $p)
                <div class="bg-white border rounded-2xl overflow-hidden hover:shadow-xl transition" data-aos="fade-up">
                    <img src="{{ asset('storage/' . $p->gambar) }}" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <h4 class="text-xl font-bold mb-2">{{ $p->nama_produk }}</h4>
                        <p class="text-gray-500 text-sm mb-4">{{ $p->deskripsi }}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-green-700 font-bold text-lg">Rp {{ number_format($p->harga) }}</span>
                            <button class="bg-yellow-500 text-white px-4 py-2 rounded-lg font-bold hover:bg-yellow-600">Beli Sekarang</button>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center col-span-3 text-gray-400">Belum ada produk yang dipajang.</p>
            @endforelse
        </div>
    </section>

    <footer class="bg-gray-900 text-white py-12 text-center">
        <p class="mb-4">&copy; 2023 FarmFresh Peternakan Ayam Modern. Semua Hak Dilindungi.</p>
        <div class="text-gray-500 text-sm">Dibuat untuk Tugas UAS Pemrograman Web</div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init();</script>
</body>
</html>