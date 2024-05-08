<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dress;

class DressController extends Controller
{
    public function index(){
        $beli = Dress::query()
            ->orderBy('nama_barang')->paginate(10);
        return view('dress.index',compact('beli'));
    }

    public function store(Request $request)
    {

        $beli = new Dress();
        $beli->nama_barang = $request->nama;
        $beli->harga = $request->harga;
        $beli->qty = $request->qty;
        $beli->total = $request->harga * $request->qty;
        $beli->save();

        return redirect()
            ->route('beli-dress.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    public function update(Request $request, string $id)
    {
        // Ambil data headphone berdasarkan id
        $dress = Dress::findOrFail($id);
    
        // Perbarui data headphone
        $dress->nama_barang = $request->nama;
        $dress->harga = $request->harga;
        $dress->qty = $request->qty;
        $dress->total = $request->harga * $request->qty;
        $dress->save();
    
        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('beli-dress.index')->with('success', 'Data berhasil diupdate!');
    }
    

    public function delete(string $id)
    {
        $beli = Dress::findOrFail($id); 
        $beli->delete(); 

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
