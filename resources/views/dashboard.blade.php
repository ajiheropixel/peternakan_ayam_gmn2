<x-app-layout>
    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(Auth::user()->is_admin == 1)
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-[2rem] shadow-sm border">
                        <h3 class="font-black italic">PESANAN MASUK</h3>
                        <a href="{{ route('admin.orders.index') }}" class="text-green-600 font-bold">Kelola Sekarang →</a>
                    </div>
                    </div>
            @else
                <div class="bg-white p-8 rounded-[2rem] shadow-sm border">
                    <h3 class="text-2xl font-black italic mb-6 uppercase">Riwayat Pesanan Anda</h3>
                    
                    @if($myOrders->isEmpty())
                        <p class="text-gray-400 italic">Belum ada pesanan. <a href="{{ route('welcome') }}" class="text-blue-500 underline">Mulai Belanja</a></p>
                    @else
                        <table class="min-w-full">
                            <thead>
                                <tr class="text-left text-xs font-black text-gray-400 uppercase">
                                    <th>ID Pesanan</th>
                                    <th>Produk</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($myOrders as $order)
                                <tr>
                                    <td class="py-4 font-bold">#ORD-{{ $order->id }}</td>
                                    <td class="py-4 uppercase font-bold text-gray-700">{{ $order->nama_produk }}</td>
                                    <td class="py-4 text-center">
                                        <span class="px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-[10px] font-black uppercase italic">
                                            {{ $order->status }}
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            @endif

        </div>
    </div>
</x-app-layout>