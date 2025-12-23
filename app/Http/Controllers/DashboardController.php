<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; // Pastikan ini ada
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Jika Admin, lempar ke halaman pesanan admin
        if ($user->is_admin == 1) {
            return redirect()->route('admin.orders.index');
        }

        // Jika User, ambil data pesanannya untuk ditampilkan di dashboard
        $myOrders = Order::where('user_id', $user->id)->latest()->get();
        return view('dashboard', compact('myOrders'));
    }
}