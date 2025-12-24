<x-app-layout>
    <div class="py-12 bg-[#f8fafc] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(Auth::user()->is_admin == 1)
                <div class="mb-8">
                    <h2 class="text-3xl font-black italic uppercase text-gray-800">Admin Control Center</h2>
                </div>
                @else

                <div class="flex flex-col md:flex-row md:items-center justify-between mb-10 gap-6">
                    <div>
                        <h2 class="text-4xl font-black text-gray-900 tracking-tighter italic uppercase leading-tight">
                            Selamat Datang, <span class="text-green-600">{{ Auth::user()->name }}</span>!
                        </h2>
                        <p class="text-gray-500 font-medium mt-1">Berikut adalah ringkasan aktivitas peternakan Anda hari ini.</p>
                    </div>
                    <a href="{{ route('welcome') }}" class="inline-flex items-center px-8 py-4 bg-gray-900 text-white rounded-[1.5rem] font-bold shadow-2xl hover:bg-green-600 transition-all duration-300 hover:-translate-y-1 uppercase text-xs tracking-[0.2em]">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path></svg>
                        Pesan Ayam Baru
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                    <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-gray-100 relative overflow-hidden group">
                        <div class="relative z-10">
                            <div class="text-gray-400 text-[10px] font-black uppercase tracking-[0.2em] mb-4">Total Belanja</div>
                            <div class="text-3xl font-black text-gray-900 italic">Rp {{ number_format($myOrders->sum('total_harga'), 0, ',', '.') }}</div>
                            <div class="mt-2 text-xs font-bold text-green-500 uppercase">Investasi Gizi Sehat</div>
                        </div>
                        <div class="absolute -right-4 -bottom-4 opacity-[0.03] group-hover:scale-110 transition-transform duration-500">
                            <svg class="w-32 h-32 text-black" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1.41 16.09V20h-2.82v-1.91c-2.47-.22-4.59-1.54-4.59-4.11h2.24c0 1.25 1.01 1.94 2.35 1.94 1.32 0 2.25-.56 2.25-1.52 0-.91-.72-1.39-2.37-1.78-2.52-.59-4.38-1.38-4.38-3.77 0-2.18 1.83-3.52 4.14-3.77V5h2.82v1.92c2.18.23 3.86 1.41 3.94 3.52h-2.25c-.11-1.07-.84-1.63-2-1.63-1.12 0-1.89.51-1.89 1.34 0 .81.71 1.2 2.31 1.6 2.76.68 4.45 1.5 4.45 3.95 0 2.33-1.85 3.65-4.32 3.89z"/></svg>
                        </div>
                    </div>

                    <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-gray-100 relative overflow-hidden group">
                        <div class="relative z-10">
                            <div class="text-gray-400 text-[10px] font-black uppercase tracking-[0.2em] mb-4">Pesanan Aktif</div>
                            <div class="text-3xl font-black text-gray-900 italic">{{ $myOrders->whereIn('status', ['pending', 'proses'])->count() }} Pesanan</div>
                            <div class="mt-2 text-xs font-bold text-blue-500 uppercase italic tracking-widest">On Progress</div>
                        </div>
                        <div class="absolute -right-4 -bottom-4 opacity-[0.03] group-hover:scale-110 transition-transform duration-500">
                            <svg class="w-32 h-32 text-black" fill="currentColor" viewBox="0 0 24 24"><path d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-green-600 to-green-700 p-8 rounded-[2.5rem] shadow-xl shadow-green-100 relative overflow-hidden group">
                        <div class="relative z-10">
                            <div class="text-green-200 text-[10px] font-black uppercase tracking-[0.2em] mb-4 text-opacity-80">Membership</div>
                            <div class="text-3xl font-black text-white italic uppercase">Silver Member</div>
                            <div class="mt-2 text-xs font-bold text-green-200 uppercase text-opacity-70">Loyalitas Terjaga</div>
                        </div>
                        <div class="absolute -right-4 -bottom-4 opacity-10 group-hover:rotate-12 transition-transform duration-500">
                            <svg class="w-32 h-32 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white shadow-sm rounded-[3rem] overflow-hidden border border-gray-100">
                    <div class="px-10 py-8 border-b border-gray-50 flex justify-between items-center bg-gray-50/30">
                        <h3 class="text-xl font-black italic uppercase tracking-tighter text-gray-800">Riwayat Transaksi</h3>
                        <div class="flex gap-2">
                            <div class="w-2 h-2 rounded-full bg-red-400"></div>
                            <div class="w-2 h-2 rounded-full bg-yellow-400"></div>
                            <div class="w-2 h-2 rounded-full bg-green-400"></div>
                        </div>
                    </div>
                    <div class="p-4 md:p-10">
                        @if($myOrders->isEmpty())
                            <div class="text-center py-20">
                                <div class="inline-flex items-center justify-center w-24 h-24 bg-gray-50 rounded-full mb-6">
                                    <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 118 0m-4 5v2a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2h2M7 11V7a4 4 0 118 0m-4 5v2a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2h2"></path></svg>
                                </div>
                                <p class="text-gray-400 font-bold italic uppercase tracking-widest text-sm">Belum ada jejak pesanan</p>
                            </div>
                        @else
                            <div class="overflow-x-auto">
                                <table class="min-w-full">
                                    <thead>
                                        <tr class="text-left text-[10px] font-black text-gray-400 uppercase tracking-[0.3em] border-b border-gray-50">
                                            <th class="pb-8">Invoice</th>
                                            <th class="pb-8">Produk Pesanan</th>
                                            <th class="pb-8 text-center">Nominal</th>
                                            <th class="pb-8 text-right">Status Aktivitas</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-50">
                                        @foreach($myOrders as $order)
                                        <tr class="group hover:bg-green-50/30 transition-all duration-300">
                                            <td class="py-8 font-black text-gray-400 group-hover:text-green-600 transition-colors">
                                                #FF-{{ $order->id }}
                                            </td>
                                            <td class="py-8">
                                                <div class="font-black text-gray-800 uppercase italic tracking-tighter text-lg">{{ $order->nama_produk }}</div>
                                                <div class="text-[10px] font-bold text-gray-400 uppercase mt-1 tracking-widest">{{ $order->created_at->format('d M Y') }}</div>
                                            </td>
                                            <td class="py-8 text-center">
                                                <div class="text-xl font-black text-gray-900 leading-none">Rp {{ number_format($order->total_harga) }}</div>
                                                <span class="text-[9px] font-bold text-green-500 uppercase tracking-widest">Lunas</span>
                                            </td>
                                            <td class="py-8 text-right">
                                                @if($order->status == 'pending')
                                                    <span class="px-6 py-2 bg-yellow-400 text-white rounded-full text-[10px] font-black uppercase tracking-widest shadow-lg shadow-yellow-100">Menunggu</span>
                                                @elseif($order->status == 'proses')
                                                    <span class="px-6 py-2 bg-blue-500 text-white rounded-full text-[10px] font-black uppercase tracking-widest shadow-lg shadow-blue-100">Dikirim</span>
                                                @else
                                                    <span class="px-6 py-2 bg-green-600 text-white rounded-full text-[10px] font-black uppercase tracking-widest shadow-lg shadow-green-100">Selesai</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            @endif

            <div class="mt-20 pb-10 flex flex-col items-center">
                <div class="h-[1px] w-20 bg-gray-200 mb-6"></div>
                <p class="text-[10px] font-black text-gray-300 uppercase tracking-[0.5em]">FreshFarm — Digital Agriculture System v2.0</p>
            </div>

        </div>
    </div>
</x-app-layout>