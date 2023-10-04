<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Menu;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesanan = Pesanan::All();
        return view('pesanan.index')->with('pesanan',$pesanan);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menu = Menu::All();
        return view('pesanan.create')->with('menu',$menu);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_menu' => 'required|string',
            'jumlah_pesanan' => 'required|integer',
            'total_harga' => 'integer'
        ]);

        $validatedData['id'] = uuid_create();
        $menuTerpilih = Menu::find($validatedData['nama_menu']);
        $validatedData['total_harga'] = $menuTerpilih->harga * $validatedData['jumlah_pesanan'];
        $validatedData['id_menu'] = $validatedData['nama_menu'];

        $pesanan = Pesanan::create($validatedData);
        $nama_menu = $pesanan->menu->nama_menu;
        return redirect()->route('pesanan.index')->with('success', "Pesanan $nama_menu berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(pesanan $pesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pesanan $pesanan)
    {
        $menu=Menu::orderBy('nama_menu','ASC')->get();
        return view('pesanan.edit')
            ->with('menu',$menu)
            ->with('pesanan',$pesanan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pesanan $pesanan)
    {
        $validatedData=$request->validate([
            'nama_menu'=>'required|string',
            'jumlah_pesanan'=>'required|integer',
            'total_harga'=>'integer',
        ]);

        $menuTerpilih = Menu::find($validatedData['nama_menu']);
        $validatedData['total_harga'] = $menuTerpilih->harga * $validatedData['jumlah_pesanan'];
        $validatedData['id_menu'] = $validatedData['nama_menu'];

        $pesanan->update($validatedData);
        $nama_menu = $pesanan->menu->nama_menu;
        return redirect()->route('pesanan.index')->with('success','Data pesanan berhasil diubah ke database');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pesanan $pesanan)
    {
        //
        $deletedpesanan = $pesanan->delete();

        return redirect()->route('pesanan.index')->with('success', "Menu berhasil dihapus database");
    }
}
