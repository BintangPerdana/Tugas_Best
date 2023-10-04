<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Menu;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::all();
        $menu = Menu::All()->sortBy('kategori');
        return view('menu.index', compact('menu'), compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('isAdmin');
        $kategori = Kategori::all();
        return view('menu.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('isAdmin');
        $validatedData = $request->validate([
            'nama_menu' => 'required|string',
            'id_kategori' => 'required|string',
            'deskripsi' => 'required|string',
            'harga' => 'required|integer',
            'foto' => 'required|image'
        ]);

        $validatedData['id'] = uuid_create();

        $fileName = time() . "." . $request->foto->getClientOriginalExtension();
        $request->foto->move(public_path('/images/menu'), $fileName);
        $validatedData['foto'] = $fileName;
        $newMenu = Menu::create($validatedData);

        return redirect()->route('menu.index')->with('success', "$newMenu->nama_menu berhasil disimpan ke database");
    }

    /**
     * Display the specified resource.
     */
    public function show(menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(menu $menu)
    {
        $this->authorize('isAdmin');
        $kategori = Kategori::all();
        return view('menu.edit', compact('menu'), compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, menu $menu)
    {
        $this->authorize('isAdmin');
        $validatedData = $request->validate([
            'nama_menu' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|integer',
            'foto' => 'image'
        ]);

        if ($request->foto) {
            $image_path = public_path('images/menu/' . $menu->foto);
            File::exists($image_path) && File::delete($image_path);

            $fileName = time() . "." .  $request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('/images/menu'), $fileName);
            $validatedData['foto'] = $fileName;
            $newMenu = $menu->update($validatedData);
        } else {
            $newMenu = $menu->update($validatedData);
        }

        return redirect()->route('menu.index')->with('success', "$menu->nama_menu berhasil diupdate di database");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(menu $menu)
    {
        $this->authorize('isAdmin');
        $image_path = public_path('images/menu/' . $menu->foto);

        File::exists($image_path) && File::delete($image_path);

        $deletedmenu = $menu->delete();

        return redirect()->route('menu.index')->with('success', "Menu berhasil dihapus database");
    }
}
