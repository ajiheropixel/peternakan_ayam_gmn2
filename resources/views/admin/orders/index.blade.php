<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-600 text-white rounded-2xl font-bold text-xs uppercase tracking-[0.2em] shadow-lg animate-pulse">
                    ✨ {{ session('success') }}
                </div>
            @endif

            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 gap-4">
                <div>
                    <h2 class="text-4xl font-extrabold text-gray-900 tracking-tight italic uppercase">Pesanan Masuk</h2>
                    <p class="text-sm text-gray-500 mt-1 font-medium">Panel Manajemen Transaksi FreshFarm</p>
                </div>
                <a href="{{ route('dashboard') }}" class="inline-flex items-center px-6 py-3 bg-white border border-gray-200 rounded-2xl shadow-sm text-gray-600 font-bold hover:bg-gray-50 transition-all text-xs uppercase tracking-widest">
                    ← Dashboard
                </a>
            </div>

            <div class="bg-white shadow-2xl rounded-[2.5rem] overflow-hidden border border-gray-100 p-2">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-100">
                        <thead class="bg-gray-50/50">
                            <tr>
                                <th class="px-6 py-5 text-left text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Invoice</th>
                                <th class="px-6 py-5 text-left text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Pelanggan</th>
                                <th class="px-6 py-5 text-left text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Produk</th>
                                <th class="px-6 py-5 text-left text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Total Nominal</th>
                                <th class="px-6 py-5 text-center text-[10px] font-black text-gray-400 uppercase tracking-[0.2em]">Aksi & Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @forelse($orders as $order)
                            <tr class="hover:bg-blue-50/20 transition-colors duration-200">
                                <td class="px-6 py-6">
                                    <span class="text-blue-600 font-black italic tracking-tighter text-lg">#ORD-{{ str_pad($order->id, 3, '0', STR_PAD_LEFT) }}</span>
                                </td>
                                <td class="px-6 py-6">
                                    <div class="font-black text-gray-800 uppercase text-sm italic">{{ $order->user->name ?? 'Pelanggan Umum' }}</div>
                                    <div class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">{{ $order->created_at->format('d M Y') }}</div>
                                </td>
                                <td class="px-6 py-6">
                                    <div class="font-bold text-gray-900 uppercase text-sm tracking-tight">{{ $order->nama_produk }}</div>
                                    <div class="text-[10px] text-gray-500 font-bold uppercase italic">{{ $order->jumlah ?? 1 }} Unit</div>
                                </td>
                                <td class="px-6 py-6">
                                    <span class="text-xl font-black text-gray-900 italic">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</span>
                                </td>
                                <td class="px-6 py-6">
                                    <div class="flex flex-col items-center gap-3">
                                        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                                            @csrf @method('PATCH')
                                            <select name="status" onchange="this.form.submit()" 
                                                class="text-[10px] font-black uppercase tracking-widest rounded-full border-gray-200 py-1.5 px-6 cursor-pointer shadow-sm
                                                {{ $order->status == 'pending' ? 'bg-yellow-100 text-yellow-700' : ($order->status == 'proses' ? 'bg-blue-100 text-blue-700' : 'bg-green-100 text-green-700') }}">
                                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="proses" {{ $order->status == 'proses' ? 'selected' : '' }}>Proses</option>
                                                <option value="selesai" {{ $order->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                            </select>
                                        </form>

                                        <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Hapus data pesanan ini selamanya?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-[9px] font-black text-red-400 uppercase tracking-[0.3em] hover:text-red-600 transition duration-300">
                                                [ Delete Entry ]
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-32 text-center">
                                    <div class="text-gray-300 font-black italic uppercase tracking-[0.5em]">No Data Entry Found</div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-12 text-center text-gray-300 text-[10px] font-black tracking-[0.5em] uppercase italic">
                - Terminal Monitoring System v1.0 -
            </div>
        </div>
    </div>
</x-app-layout>