<?php
namespace App\Http\Controllers;
use App\Models\Chicken;
use Illuminate\Http\Request;

class ChickenController extends Controller {
    public function index() {
        $chickens = Chicken::all();
        return view('chickens.index', compact('chickens'));
    }
    public function create() { return view('chickens.create'); }
   public function store(Request $request)
{
    // Validasi data
    $request->validate([
        'nama_kandang' => 'required',
        'jenis_ayam' => 'required',
        'jumlah_ekor' => 'required|numeric',
    ]);

    // Simpan ke database
    \App\Models\Chicken::create([
        'nama_kandang' => $request->nama_kandang,
        'jenis_ayam'   => $request->jenis_ayam,
        'jumlah_ekor'       => $request->jumlah_ekor,
    ]);

    // Kembali ke halaman utama dengan pesan sukses
    return redirect()->route('chickens.index')->with('success', 'Stok berhasil ditambah!');
}
}