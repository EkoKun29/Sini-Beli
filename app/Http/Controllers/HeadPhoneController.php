<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeadPhone;

class HeadPhoneController extends Controller
{
    public function index(){
        $beli = HeadPhone::query()
            ->orderBy('nama_barang')->paginate(10);
        return view('headphone.index',compact('beli'));
    }

    public function store(Request $request)
    {

        $beli = new HeadPhone();
        $beli->nama_barang = $request->nama;
        $beli->harga = $request->harga;
        $beli->qty = $request->qty;
        $beli->total = $request->harga * $request->qty;
        $beli->save();

        return redirect()
            ->route('beli-headphone.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    public function update(Request $request, string $id)
    {
        // Ambil data headphone berdasarkan id
        $headphone = HeadPhone::findOrFail($id);
    
        // Perbarui data headphone
        $headphone->nama_barang = $request->nama;
        $headphone->harga = $request->harga;
        $headphone->qty = $request->qty;
        $headphone->total = $request->harga * $request->qty;
        $headphone->save();
    
        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('beli-headphone.index')->with('success', 'Data berhasil diupdate!');
    }
    

    public function delete(string $id)
    {
        $beli = HeadPhone::findOrFail($id); 
        $beli->delete(); 

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
