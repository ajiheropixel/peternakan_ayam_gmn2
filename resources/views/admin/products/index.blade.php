<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 gap-4">
                <div>
                    <h2 class="text-4xl font-extrabold text-gray-900 tracking-tight italic">Manajemen Produk</h2>
                    <p class="text-sm text-gray-500 mt-1">Kelola daftar produk jual dengan tampilan modern.</p>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-5 py-2.5 bg-white border border-gray-200 rounded-2xl shadow-sm text-gray-600 font-semibold hover:bg-gray-50 transition">
                        ← Dashboard
                    </a>
                    <button onclick="toggleModal()" class="inline-flex items-center px-5 py-2.5 bg-green-600 text-white font-bold rounded-2xl shadow-lg shadow-green-200 hover:bg-green-700 transition">
                        + Tambah Produk
                    </button>
                </div>
            </div>

            <div class="bg-white shadow-xl rounded-[2rem] overflow-hidden border border-gray-100 p-2">
                <table class="min-w-full divide-y divide-gray-100">
                    <thead class="bg-gray-50/50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-widest">Gambar</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-widest">Nama Produk</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-widest">Harga</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-widest">Stok</th>
                            <th class="px-10 py-4 text-right text-xs font-bold text-gray-500 uppercase tracking-widest">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach($products as $p)
                        <tr class="hover:bg-blue-50/20 transition">
                            <td class="px-6 py-5">
                                <img src="{{ asset('storage/' . $p->gambar) }}" class="w-16 h-16 object-cover rounded-2xl border border-gray-100 shadow-sm">
                            </td>
                            <td class="px-6 py-5">
                                <div class="font-bold text-gray-800 uppercase tracking-tight">{{ $p->nama_produk }}</div>
                                <div class="text-[10px] text-gray-400">Tersedia untuk dijual</div>
                            </td>
                            <td class="px-6 py-5 text-center">
                                <span class="text-green-600 font-black text-lg">Rp {{ number_format($p->harga) }}</span>
                            </td>
                            <td class="px-6 py-5 text-center font-bold text-gray-700">
                                {{ $p->stok }} <span class="text-xs text-gray-400">Pcs</span>
                            </td>
                            <td class="px-6 py-5 text-right">
                                <div class="flex justify-end items-center gap-6">
                                    <form action="{{ route('products.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Hapus produk ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-red-600 font-bold text-sm transition">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="mt-8 text-center text-gray-400 text-[10px] font-medium tracking-[0.2em] uppercase">
                UAS Pemrograman Web - Sistem Peternakan Ayam © 2025
            </div>
        </div>
    </div>

    <div id="modalTambah" class="fixed inset-0 bg-black/60 backdrop-blur-sm hidden items-center justify-center z-50 transition-all">
        <div class="bg-white rounded-[2.5rem] p-10 max-w-md w-full mx-4 shadow-2xl">
            <h2 class="text-3xl font-extrabold text-gray-900 mb-2">Tambah Produk</h2>
            <p class="text-gray-500 mb-8 text-sm">Isi detail produk untuk katalog jualan.</p>
            
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-5">
                    <input type="text" name="nama_produk" placeholder="Nama Produk" class="w-full bg-gray-50 border-none rounded-2xl p-4 font-bold focus:ring-2 focus:ring-green-500" required>
                    <textarea name="deskripsi" placeholder="Deskripsi Singkat" class="w-full bg-gray-50 border-none rounded-2xl p-4 focus:ring-2 focus:ring-green-500"></textarea>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <input type="number" name="harga" placeholder="Harga" class="w-full bg-gray-50 border-none rounded-2xl p-4 font-bold focus:ring-2 focus:ring-green-500 text-green-600" required>
                        <input type="number" name="stok" placeholder="Stok" class="w-full bg-gray-50 border-none rounded-2xl p-4 font-bold focus:ring-2 focus:ring-green-500" required>
                    </div>
                    
                    <div class="bg-gray-50 p-4 rounded-2xl border-2 border-dashed border-gray-200">
                        <label class="block text-xs font-bold text-gray-400 uppercase mb-2">Upload Gambar</label>
                        <input type="file" name="gambar" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100" required>
                    </div>
                </div>
                
                <div class="mt-8 flex gap-3">
                    <button type="button" onclick="toggleModal()" class="flex-1 bg-gray-100 text-gray-500 py-4 rounded-2xl font-bold hover:bg-gray-200 transition">Batal</button>
                    <button type="submit" class="flex-1 bg-green-600 text-white py-4 rounded-2xl font-bold shadow-lg shadow-green-200 hover:bg-green-700 transition">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleModal() {
            const modal = document.getElementById('modalTambah');
            modal.classList.toggle('hidden');
            modal.classList.toggle('flex');
        }
    </script>
</x-app-layout>