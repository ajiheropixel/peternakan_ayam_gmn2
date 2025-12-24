<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    // Menampilkan halaman tabel pesanan
    public function index()
    {
        // Mengambil data order beserta data user-nya
        $orders = Order::with('user')->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    // Mengubah status (Pending -> Proses -> Selesai)
    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Status Pesanan #ORD-' . $id . ' diperbarui!');
    }

    // Menghapus pesanan secara permanen
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return back()->with('success', 'Data pesanan berhasil dihapus.');
    }
}