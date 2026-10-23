<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArtikelRequest;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = Artikel::with('penulis')
            ->latest()
            ->paginate(10);

        return view('artikel.index', compact('artikel'));
    }

    public function create()
    {
        return view('artikel.create');
    }

    public function store(StoreArtikelRequest $request)
    {
        $data = $request->validated();

        $data['slug'] = Str::slug($data['judul']);
        $data['user_id'] = auth()->id() ?? 1;

        Artikel::create($request->validated() + ['user_id' => auth()->id(), 'slug' => Str::slug($request->judul)]);

        return redirect()
            ->route('artikel.index')
            ->with('pesan', 'Artikel berhasil ditambahkan');
    }

    public function show(Artikel $artikel)
    {
        return view('artikel.show', compact('artikel'));
    }

    public function edit(Artikel $artikel)
    {
        return view('artikel.edit', compact('artikel'));
    }

    public function update(Request $request, Artikel $artikel)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'status' => 'required|in:draf,terbit',
        ]);

        $artikel->update([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'isi' => $request->isi,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('artikel.index')
            ->with('pesan', 'Artikel berhasil diperbarui');
    }

    public function destroy(Artikel $artikel)
    {
        $artikel->delete();

        return redirect()
            ->route('artikel.index')
            ->with('pesan', 'Artikel berhasil dihapus');
    }
}