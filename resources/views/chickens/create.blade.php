<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen font-sans">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h2 class="text-3xl font-extrabold text-green-800 tracking-tight">Tambah Stok Ayam</h2>
                    <p class="text-sm text-gray-500 mt-1">Masukkan data populasi ayam baru ke dalam sistem.</p>
                </div>
                <a href="{{ route('chickens.index') }}" class="px-5 py-2.5 bg-white border border-gray-200 rounded-2xl shadow-sm text-gray-600 font-semibold hover:bg-gray-50 transition">
                    ← Kembali
                </a>
            </div>

            <div class="bg-white shadow-xl rounded-[2rem] overflow-hidden border border-gray-100 p-8">
                <form action="{{ route('chickens.store') }}" method="POST">
                    @csrf
                    
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-widest">Kandang</label>
                            <input type="text" name="nama_kandang" required 
                                class="w-full px-5 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-green-500 font-bold text-gray-800 placeholder-gray-400"
                                placeholder="Contoh: KANDANG-A01">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-widest">Jenis Ayam</label>
                            <input type="text" name="jenis_ayam" required 
                                class="w-full px-5 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-green-500 font-bold text-gray-800 placeholder-gray-400"
                                placeholder="Contoh: Ayam Broiler / Kampung">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-widest">Jumlah (Ekor)</label>
                            <input type="number" name="jumlah_ekor" required 
                                class="w-full px-5 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-green-500 font-bold text-gray-800 placeholder-gray-400"
                                placeholder="0">
                        </div>

                        <div class="pt-4">
                            <button type="submit" 
                                class="w-full py-4 bg-green-600 text-white font-black rounded-2xl shadow-lg shadow-green-200 hover:bg-green-700 transition-all transform hover:scale-[1.02] active:scale-95 uppercase tracking-widest">
                                Simpan Data Stok
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="mt-8 text-center text-gray-400 text-[10px] font-medium tracking-[0.2em] uppercase">
                Sistem Peternakan Ayam © 2025
            </div>
        </div>
    </div>
</x-app-layout>