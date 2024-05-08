<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MacBook;

class MacBookController extends Controller
{
    public function index(){
        $beli = MacBook::query()
            ->orderBy('nama_barang')->paginate(10);
        return view('mackbook.index',compact('beli'));
    }

    public function store(Request $request)
    {

        $beli = new MacBook();
        $beli->nama_barang = $request->nama;
        $beli->harga = $request->harga;
        $beli->qty = $request->qty;
        $beli->total = $request->harga * $request->qty;
        $beli->save();

        return redirect()
            ->route('beli-mackbook.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    public function update(Request $request, string $id)
    {
        // Ambil data headphone berdasarkan id
        $mackbook = MacBook::findOrFail($id);
    
        // Perbarui data headphone
        $mackbook->nama_barang = $request->nama;
        $mackbook->harga = $request->harga;
        $mackbook->qty = $request->qty;
        $mackbook->total = $request->harga * $request->qty;
        $mackbook->save();
    
        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('beli-mackbook.index')->with('success', 'Data berhasil diupdate!');
    }
    

    public function delete(string $id)
    {
        $beli = MacBook::findOrFail($id); 
        $beli->delete(); 

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
