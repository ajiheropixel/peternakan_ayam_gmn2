<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller {
    public function index() {
        // Mengambil semua produk untuk dipajang di katalog depan
        $products = Product::all();
        return view('welcome', compact('products'));
    }
}