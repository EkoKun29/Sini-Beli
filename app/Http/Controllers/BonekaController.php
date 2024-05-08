<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Boneka;

class BonekaController extends Controller
{
    public function index(){
        $beli = Boneka::query()
            ->orderBy('nama_barang')->paginate(10);
        return view('boneka.index',compact('beli'));
    }

    public function store(Request $request)
    {

        $beli = new Boneka();
        $beli->nama_barang = $request->nama;
        $beli->harga = $request->harga;
        $beli->qty = $request->qty;
        $beli->total = $request->harga * $request->qty;
        $beli->save();

        return redirect()
            ->route('beli-boneka.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    public function update(Request $request, string $id)
    {
        // Ambil data headphone berdasarkan id
        $boneka = Boneka::findOrFail($id);
    
        // Perbarui data headphone
        $boneka->nama_barang = $request->nama;
        $boneka->harga = $request->harga;
        $boneka->qty = $request->qty;
        $boneka->total = $request->harga * $request->qty;
        $boneka->save();
    
        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('beli-boneka.index')->with('success', 'Data berhasil diupdate!');
    }
    

    public function delete(string $id)
    {
        $beli = Boneka::findOrFail($id); 
        $beli->delete(); 

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
