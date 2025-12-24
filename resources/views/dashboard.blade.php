<x-app-layout>
    <div class="py-12 bg-[#f8fafc] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(Auth::user()->is_admin == 1)
                <div class="flex justify-between items-center mb-10">
                    <h2 class="text-4xl font-black italic uppercase text-gray-900">Admin Panel</h2>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-gray-100">
                        <div class="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2">Transaksi</div>
                        <div class="text-2xl font-black italic mb-4">PESANAN MASUK</div>
                        <a href="{{ route('admin.orders.index') }}" class="text-green-600 font-bold hover:underline">Kelola Pesanan →</a>
                    </div>
                    </div>
            @else
                <div class="flex flex-col md:flex-row md:items-center justify-between mb-10 gap-6">
                    <div>
                        <h2 class="text-4xl font-black text-gray-900 tracking-tighter italic uppercase leading-tight">
                            Selamat Datang, <span class="text-green-600">{{ Auth::user()->name }}</span>!
                        </h2>
                        <p class="text-gray-500 font-medium mt-1">Berikut adalah ringkasan aktivitas peternakan Anda.</p>
                    </div>
                    <a href="{{ route('welcome') }}" class="inline-flex items-center px-8 py-4 bg-green-600 text-white rounded-[1.5rem] font-bold shadow-xl hover:bg-green-700 transition-all uppercase text-xs tracking-widest">
                        Beli Sekarang
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                    <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-gray-100">
                        <div class="text-gray-400 text-[10px] font-black uppercase tracking-[0.2em] mb-4">Total Belanja</div>
                        <div class="text-3xl font-black text-gray-900 italic">Rp {{ number_format($myOrders->sum('total_harga'), 0, ',', '.') }}</div>
                    </div>
                    <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-gray-100">
                        <div class="text-gray-400 text-[10px] font-black uppercase tracking-[0.2em] mb-4">Pesanan Aktif</div>
                        <div class="text-3xl font-black text-gray-900 italic">{{ $myOrders->whereIn('status', ['pending', 'proses'])->count() }} Pesanan</div>
                    </div>
                    <div class="bg-green-600 p-8 rounded-[2.5rem] text-white shadow-xl shadow-green-100">
                        <div class="text-green-200 text-[10px] font-black uppercase tracking-[0.2em] mb-4">Membership</div>
                        <div class="text-3xl font-black italic uppercase">Silver Member</div>
                    </div>
                </div>

                <div class="bg-white shadow-sm rounded-[3rem] overflow-hidden border border-gray-100">
                    <div class="px-10 py-8 border-b border-gray-50 bg-gray-50/30">
                        <h3 class="text-xl font-black italic uppercase tracking-tighter text-gray-800">Riwayat Transaksi</h3>
                    </div>
                    <div class="p-10">
                        @if($myOrders->isEmpty())
                            <div class="text-center py-20">
                                <p class="text-gray-400 font-bold italic uppercase tracking-widest text-sm">Belum Ada Jejak Pesanan</p>
                            </div>
                        @else
                            <div class="overflow-x-auto">
                                <table class="min-w-full">
                                    <thead>
                                        <tr class="text-left text-[10px] font-black text-gray-400 uppercase tracking-[0.3em] border-b border-gray-50">
                                            <th class="pb-8">Invoice</th>
                                            <th class="pb-8">Produk</th>
                                            <th class="pb-8 text-center">Nominal</th>
                                            <th class="pb-8 text-right">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-50">
                                        @foreach($myOrders as $order)
                                        <tr>
                                            <td class="py-8 font-black text-gray-400">#FF-{{ $order->id }}</td>
                                            <td class="py-8 font-black text-gray-800 uppercase italic">{{ $order->nama_produk }}</td>
                                            <td class="py-8 text-center font-black">Rp {{ number_format($order->total_harga) }}</td>
                                            <td class="py-8 text-right">
                                                <span class="px-6 py-2 rounded-full text-[10px] font-black uppercase 
                                                    {{ $order->status == 'pending' ? 'bg-yellow-100 text-yellow-600' : ($order->status == 'proses' ? 'bg-blue-100 text-blue-600' : 'bg-green-100 text-green-600') }}">
                                                    {{ $order->status }}
                                                </span>
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
        </div>
    </div>
</x-app-layout>