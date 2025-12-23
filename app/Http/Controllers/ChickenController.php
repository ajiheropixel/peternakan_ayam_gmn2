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
        'jumlah_ekor'  => $request->jumlah_ekor,
    ]);

    // Kembali ke halaman utama dengan pesan sukses
    return redirect()->route('chickens.index')->with('success', 'Stok berhasil ditambah!');
}
// Tambahkan ini di dalam class ChickenController

// Menampilkan halaman edit
public function edit($id)
{
    $chicken = \App\Models\Chicken::findOrFail($id);
    return view('chickens.edit', compact('chicken'));
}

// Menyimpan perubahan data
public function update(Request $request, $id)
{
    $request->validate([
        'nama_kandang' => 'required',
        'jenis_ayam' => 'required',
        'jumlah_ekor' => 'required|numeric',
    ]);

    $chicken = \App\Models\Chicken::findOrFail($id);
    $chicken->update($request->all());

    return redirect()->route('chickens.index')->with('success', 'Data stok berhasil diperbarui!');
}
}