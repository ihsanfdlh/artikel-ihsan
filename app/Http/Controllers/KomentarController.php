<?php

namespace App\Http\Controllers;

use App\Models\komentar;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    public function index()
    {
        
    }
    
    public function create()
    {

    }

    public function store(Request $request)
    {
        $request->validate([
            'artikel_id' => 'required|exists:artikels,id',
            'user_id' => 'required|exists:users,id',
            'isi' => 'required',
        ]);

        komentar::create($request->all());

        return redirect()->route('artikel.show', $request->artikel_id)
            ->with('sukses', 'Komentar berhasil ditambahkan!');
    }

    public function show(komentar $komentar)
    {
        //
    }

    public function edit(komentar $komentar)
    {
        //
    }

    public function update(Request $request, komentar $komentar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(komentar $komentar)
    {
        //
    }
}
