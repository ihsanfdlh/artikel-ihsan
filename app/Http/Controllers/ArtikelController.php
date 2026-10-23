<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArtikelRequest;
use App\Http\Requests\UpdateArtikelRequest;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = Artikel::with('penulis', 'kategori')
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

        Artikel::create($request->validated() + [
            'user_id' => auth()->id(),
            'slug' => Str::slug($request->judul)
        ]);

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
        if (auth()->id() !== $artikel->user_id) {
            abort(403, 'Anda tidak memiliki izin mengedit artikel ini. Bukan artikel anda');
        }

        return view('artikel.edit', compact('artikel'));
    }

    public function update(UpdateArtikelRequest $request, Artikel $artikel)
    {
        $data = $request->validated();

        if (auth()->id() !== $artikel->user_id) {
            abort(403, 'Anda tidak memiliki izin mengedit artikel ini.');
        }

        $data['slug'] = Str::slug($data['judul']);

        $artikel->update($data);

        return redirect()
            ->route('artikel.index')
            ->with('pesan', 'Artikel berhasil diperbarui');
    }

    public function destroy(Artikel $artikel)
    {
        if (auth()->id() !== $artikel->user_id) {
            abort(403, 'Anda tidak memiliki izin menghapus artikel ini. Bukan artikel anda');
        }

        $artikel->delete();

        return redirect()
            ->route('artikel.index')
            ->with('pesan', 'Artikel berhasil dihapus.');
    }
}