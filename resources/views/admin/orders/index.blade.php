<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 gap-4">
                <div>
                    <h2 class="text-4xl font-extrabold text-gray-900 tracking-tight italic">Pesanan Masuk</h2>
                    <p class="text-sm text-gray-500 mt-1">Pantau dan kelola semua transaksi pelanggan secara real-time.</p>
                </div>
                <div>
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-5 py-2.5 bg-white border border-gray-200 rounded-2xl shadow-sm text-gray-600 font-semibold hover:bg-gray-50 transition-all duration-200">
                        <span class="mr-2">←</span> Kembali ke Dashboard
                    </a>
                </div>
            </div>

            <div class="bg-white shadow-xl rounded-[2rem] overflow-hidden border border-gray-100 p-2">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-100">
                        <thead class="bg-gray-50/50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-widest">ID Pesanan</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-widest">Pelanggan</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-widest">Produk</th>
                                <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-widest">Total Harga</th>
                                <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-widest">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @forelse($orders as $order)
                            <tr class="hover:bg-blue-50/30 transition-colors duration-200">
                                <td class="px-6 py-5">
                                    <span class="text-blue-600 font-bold tracking-tighter">#ORD-{{ str_pad($order->id, 3, '0', STR_PAD_LEFT) }}</span>
                                </td>
                                <td class="px-6 py-5">
                                    <div class="font-bold text-gray-800 uppercase text-sm">
                                        {{ $order->user->name ?? 'User Umum' }}
                                    </div>
                                    <div class="text-xs text-gray-400">Terdaftar di Sistem</div>
                                </td>
                                <td class="px-6 py-5">
                                    <div class="font-bold text-gray-900">{{ $order->product->nama_produk ?? 'Produk Dihapus' }}</div>
                                    <div class="text-xs text-gray-500">{{ $order->jumlah }} Qty</div>
                                </td>
                                <td class="px-6 py-5">
                                    <span class="text-lg font-black text-gray-900">
                                        Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                                    </span>
                                </td>
                                <td class="px-6 py-5 text-center">
                                    <span class="px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest 
                                        {{ $order->status == 'pending' ? 'bg-yellow-100 text-yellow-700' : 'bg-green-100 text-green-700' }}">
                                        {{ $order->status }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-20 text-center">
                                    <div class="flex flex-col items-center">
                                        <p class="text-gray-400 italic">Belum ada pesanan masuk saat ini.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-8 text-center text-gray-400 text-[10px] font-medium tracking-[0.2em] uppercase">
                - Sistem Peternakan Ayam © 2025
            </div>
        </div>
    </div>
</x-app-layout>