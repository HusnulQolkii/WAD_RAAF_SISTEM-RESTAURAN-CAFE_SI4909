<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use Illuminate\Http\Request;

class MejaController extends Controller
{
    public function index()
    {
        $mejas = Meja::all();

        return view('meja.index', compact('mejas'));
    }

    public function create()
    {
        return view('meja.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_meja' => 'required|string|max:20|unique:meja,nomor_meja',
            'kapasitas' => 'required|in:2,4,8',
            'area' => 'required|in:Indoor,VIP',
            'status' => 'required|in:Tersedia,Digunakan,Reserved',
        ]);

        Meja::create($validated);

        return redirect()->route('meja.index')
            ->with('success', 'Data meja berhasil ditambahkan.');
    }

    public function edit(Meja $meja)
    {
        return view('meja.edit', compact('meja'));
    }

    public function update(Request $request, Meja $meja)
    {
        $validated = $request->validate([
            'nomor_meja' => 'required|string|max:20|unique:meja,nomor_meja,' . $meja->id,
            'kapasitas' => 'required|in:2,4,8',
            'area' => 'required|in:Indoor,VIP',
            'status' => 'required|in:Tersedia,Digunakan,Reserved',
        ]);

        $meja->update($validated);

        return redirect()->route('meja.index')
            ->with('success', 'Data meja berhasil diperbarui.');
    }

    public function destroy(Meja $meja)
    {
        $meja->delete();

        return redirect()->route('meja.index')
            ->with('success', 'Data meja berhasil dihapus.');
    }
}
