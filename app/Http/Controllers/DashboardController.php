<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data order milik user yang sedang login
        $myOrders = Order::where('user_id', Auth::id())->latest()->get();
        
        return view('dashboard', compact('myOrders'));
    }
}