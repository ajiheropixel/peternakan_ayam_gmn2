<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-4xl font-extrabold text-green-800 tracking-tight">Stok Ayam</h2>
                <div class="flex gap-3">
                    <a href="{{ route('dashboard') }}" class="px-5 py-2.5 bg-white border border-gray-200 rounded-2xl shadow-sm text-gray-600 font-semibold hover:bg-gray-50 transition">← Dashboard</a>
                    <a href="{{ route('chickens.create') }}" class="px-5 py-2.5 bg-green-600 text-white font-bold rounded-2xl shadow-lg shadow-green-200 hover:bg-green-700 transition">+ Tambah</a>
                </div>
            </div>
            <div class="bg-white shadow-xl rounded-3xl overflow-hidden border border-gray-100 p-2">
                <table class="min-w-full">
                    <thead class="bg-green-50/50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-green-700 uppercase tracking-widest">Kandang</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-green-700 uppercase tracking-widest">Jenis</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-green-700 uppercase tracking-widest text-center">Jumlah</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-green-700 uppercase tracking-widest">Aksi</th>
                        </tr>
                    </thead>
                  <tbody class="divide-y divide-gray-100">
    @foreach($chickens as $chicken)
    <tr class="hover:bg-green-50/20 transition">
        <td class="px-6 py-5 font-bold text-gray-800 uppercase">{{ $chicken->nama_kandang }}</td>
        <td class="px-6 py-5 text-gray-600 font-medium italic">{{ $chicken->jenis_ayam }}</td>
        <td class="px-6 py-5 font-black text-gray-900 text-center text-lg">
            {{ number_format($chicken->jumlah_ekor) }} <span class="text-xs text-gray-400">Ekor</span>
        </td>
        
        <td class="px-6 py-5">
            <div class="flex justify-end items-center gap-6">
                <a href="{{ route('chickens.edit', $chicken->id) }}" class="text-blue-500 hover:text-blue-700 font-bold text-sm transition">
                    Edit
                </a>
                <form action="{{ route('chickens.destroy', $chicken->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                    @csrf 
                    @method('DELETE')
                    <button type="submit" class="text-red-400 hover:text-red-600 font-bold text-sm transition">
                        Hapus
                    </button>
                </form>
            </div>
        </td>
    </tr>
    @endforeach
</tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>