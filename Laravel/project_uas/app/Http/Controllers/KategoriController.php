<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('isAdmin');
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('isAdmin');
        $kategori = Kategori::all();
        return view('kategori.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('isAdmin');
        $validatedData = $request->validate([
            'nama_kategori' => 'required|string',
            'deskripsi' => 'required|String'
        ]);
        $validatedData['id'] = uuid_create();

        $kategori = Kategori::create($validatedData);
        return redirect()->route('kategori.index')->with('success', "Kategori $kategori berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        $this->authorize('isAdmin');
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        $this->authorize('isAdmin');
        $validatedData = $request->validate([
            'nama_kategori' => 'required|string',
            'deskripsi' => 'required|string'
        ]);

        $kategori->update($validatedData);
        return redirect()->route('kategori.index')->with('success','Data Kategori berhasil diubah ke database');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        $this->authorize('isAdmin');
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', "Kategori berhasil dihapus database");
    }
}
