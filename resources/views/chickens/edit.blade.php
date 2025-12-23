<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-2xl rounded-[2rem] p-10 border border-gray-100">
                <div class="mb-8 flex justify-between items-center">
                    <div>
                        <h2 class="text-3xl font-extrabold text-gray-900">Edit Stok Ayam</h2>
                        <p class="text-gray-500">Perbarui informasi populasi di kandang ini.</p>
                    </div>
                </div>

                <form action="{{ route('chickens.update', $chicken->id) }}" method="POST">
                    @csrf
                    @method('PUT') <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 uppercase">Nama / Kode Kandang</label>
                            <input type="text" name="nama_kandang" value="{{ $chicken->nama_kandang }}" required 
                                class="w-full px-5 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500 font-bold">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 uppercase">Jenis Ayam</label>
                            <input type="text" name="jenis_ayam" value="{{ $chicken->jenis_ayam }}" required 
                                class="w-full px-5 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500 font-bold">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2 uppercase">Jumlah Populasi (Ekor)</label>
                            <input type="number" name="jumlah_ekor" value="{{ $chicken->jumlah_ekor }}" required 
                                class="w-full px-5 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500 font-bold">
                        </div>

                        <div class="flex gap-3">
                            <button type="submit" class="w-full py-5 bg-blue-600 text-white font-black rounded-2xl shadow-lg hover:bg-blue-700 transition-all uppercase tracking-widest">
                                Simpan Perubahan
                            </button>
                            <a href="{{ route('chickens.index') }}" class="w-1/2 py-5 bg-gray-100 text-gray-500 text-center font-bold rounded-2xl hover:bg-gray-200 transition-all uppercase tracking-widest">
                                Batal
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>