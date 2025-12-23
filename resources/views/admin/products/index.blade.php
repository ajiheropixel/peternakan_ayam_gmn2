<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-4xl font-extrabold text-blue-900 tracking-tight">Katalog Produk</h2>
                <div class="flex gap-3">
                    <a href="{{ route('dashboard') }}" class="px-5 py-2.5 bg-white border border-gray-200 rounded-2xl shadow-sm text-gray-600 font-semibold hover:bg-gray-50 transition">← Dashboard</a>
                    <button class="px-5 py-2.5 bg-blue-600 text-white font-bold rounded-2xl shadow-lg shadow-blue-200 hover:bg-blue-700 transition">+ Tambah Produk</button>
                </div>
            </div>
            <div class="bg-white shadow-xl rounded-3xl overflow-hidden border border-gray-100 p-2 text-center">
                <table class="min-w-full">
                    <thead class="bg-blue-50/50">
                        <tr>
                            <th class="px-6 py-4 text-xs font-bold text-blue-700 uppercase tracking-widest text-left">Produk</th>
                            <th class="px-6 py-4 text-xs font-bold text-blue-700 uppercase tracking-widest text-center">Harga</th>
                            <th class="px-6 py-4 text-xs font-bold text-blue-700 uppercase tracking-widest text-center">Stok</th>
                            <th class="px-6 py-4 text-xs font-bold text-blue-700 uppercase tracking-widest text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($products as $product)
                        <tr class="hover:bg-blue-50/20 transition">
                            <td class="px-6 py-5 text-left">
                                <div class="flex items-center gap-4">
                                    <img src="{{ asset('storage/'.$product->gambar) }}" class="w-14 h-14 rounded-2xl shadow-sm object-cover">
                                    <span class="font-bold text-gray-800 uppercase">{{ $product->nama_produk }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-5 font-bold text-green-600">Rp {{ number_format($product->harga) }}</td>
                            <td class="px-6 py-5 font-medium text-gray-500">{{ $product->stok }} Pcs</td>
                            <td class="px-6 py-5">
                                <button class="text-red-400 font-bold hover:text-red-600">Hapus</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>