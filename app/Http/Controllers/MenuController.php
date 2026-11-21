<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::with('category')
            ->latest()
            ->paginate(10);

        return view('menus.index', compact('menus'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('menus.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'nama_menu' => 'required|string|max:150',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'status_halal' => 'required|boolean',
            'informasi_alergen' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')
                ->store('menus', 'public');
        }

        Menu::create($data);

        return redirect()->route('menus.index')
            ->with('success', 'Menu berhasil ditambahkan.');
    }

    public function show(Menu $menu)
    {
        $menu->load('category');

        return view('menus.show', compact('menu'));
    }

    public function edit(Menu $menu)
    {
        $categories = Category::all();

        return view('menus.edit', compact('menu', 'categories'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'nama_menu' => 'required|string|max:150',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'status_halal' => 'required|boolean',
            'informasi_alergen' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            if ($menu->foto) {
                Storage::disk('public')->delete($menu->foto);
            }

            $data['foto'] = $request->file('foto')
                ->store('menus', 'public');
        }

        $menu->update($data);

        return redirect()->route('menus.index')
            ->with('success', 'Menu berhasil diperbarui.');
    }

    public function destroy(Menu $menu)
    {
        if ($menu->foto) {
            Storage::disk('public')->delete($menu->foto);
        }

        $menu->delete();

        return redirect()->route('menus.index')
            ->with('success', 'Menu berhasil dihapus.');
    }
}
