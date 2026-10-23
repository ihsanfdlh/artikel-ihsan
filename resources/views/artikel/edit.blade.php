@extends('layouts.app')

@section('konten')

<a href="{{ route('artikel.index') }}">Kembali</a><br>
<hr>

<form action="{{ route('artikel.store') }}" method="POST">
 @csrf
 @method('PUT')
 <table style="width: 100%">
    <tr>
        <td>Judul : </td>
        <td><input type="text" name="judul" placeholder="Judul Artikel" value="{{ $artikel->judul }}"></td>
    </tr>
    <tr>
        <td>Isi : </td>
        <td><textarea name="isi" placeholder="Isi Artikel">{{ $artikel->isi }}</textarea></td>
    </tr>
    <tr>
        <td>Status : </td>
        <td><select name="status">
        <option value="draft" {{ $artikel->status == 'draft' ? 'selected' : '' }}>Draft</option>
        <option value="terbit" {{ $artikel->status == 'terbit' ? 'selected' : '' }}>Terbit</option>
        </select>
        </td>
    </tr>
    <tr>
        <td><button type="submit">Update</button></td>
    </tr>
</table>
</form>
@endsection