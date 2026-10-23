
@extends('layouts.app')

@section('title', $artikel->judul)

@section('konten')

<style>
    .artikel-header {
        margin-bottom: 24px;
    }

    .artikel-judul {
        font-size: 28px;
        margin-bottom: 12px;
        color: #1e293b;
    }

    .artikel-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        color: #64748b;
        font-size: 14px;
        margin-bottom: 20px;
    }

    .artikel-status {
        display: inline-block;
        background: #dcfce7;
        color: #166534;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 13px;
    }

    .artikel-isi {
        line-height: 1.8;
        font-size: 16px;
        color: #334155;
        white-space: pre-line;
        margin-bottom: 30px;
    }

    .artikel-aksi {
        display: flex;
        gap: 12px;
        align-items: center;
        border-top: 1px solid #e2e8f0;
        padding-top: 20px;
    }

    .btn {
        padding: 10px 16px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 14px;
        border: none;
        cursor: pointer;
    }

    .btn-kembali {
        background: #e2e8f0;
        color: #334155;
    }

    .btn-edit {
        background: #2563eb;
        color: white;
    }

    .btn-hapus {
        background: #dc2626;
        color: white;
    }
</style>

<div class="artikel-header">
    <h2 class="artikel-judul">
        {{ $artikel->judul }}
    </h2>

    <div class="artikel-meta">
        <span>
            Penulis:
            {{ $artikel->penulis?->name ?? 'Tidak diketahui' }}
        </span>

        <span>
            Tanggal:
            {{ $artikel->created_at?->format('d M Y, H:i') ?? '-' }}
        </span>

        <span class="artikel-status">
            {{ ucfirst($artikel->status) }}
        </span>
    </div>
</div>

<div class="artikel-isi">{{ $artikel->isi }}</div>

<div class="artikel-aksi">
    <a href="{{ route('artikel.index') }}"
       class="btn btn-kembali">
        ← Kembali
    </a>

    <a href="{{ route('artikel.edit', $artikel->id) }}"
       class="btn btn-edit">
        Edit Artikel
    </a>

    <form action="{{ route('artikel.destroy', $artikel->id) }}"
          method="POST"
          onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">

        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-hapus">
            Hapus
        </button>
    </form>
</div>

@endsection
