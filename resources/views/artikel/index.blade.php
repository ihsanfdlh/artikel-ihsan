@extends('layouts.app')

@section('konten')

<a href="{{ route('artikel.create') }}">Tambah</a> |
<a href="{{ route('artikel.index') }}">Daftar</a>

<hr>
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>Judul</th>
        <th>Status</th>
        <th>Penulis</th>
        <th>Tanggal</th>
        <th>Aksi</th>
        <th>Hapus</th>
    </tr>
    @forelse($artikel as $a)
    <tr>
        <td>{{ $a->judul }}</td>
        <td>{{ $a->status }}</td>
        <td>{{ $a->penulis->name }}</td>
        <td>{{ $a->created_at }}</td>
        <td>
            <a href="{{ route('artikel.edit', $a->id) }}">Edit</a>
            <a href="{{ route('artikel.show', $a->id) }}">Lihat</a>
        </td>
        <td>
            <form action="{{ route('artikel.destroy', $a->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin ingin menghapus artikel ini?')">Hapus</button>
            </form>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="6">Tidak ada data</td>
    </tr>
    @endforelse
</table>
{{ $artikel->links() }}

@endsection