@extends('layouts.app')

@section('konten')

<a href="{{ route('artikel.index') }}">Kembali</a><br>
<hr>

@if ($errors->any())
 <div style="background:#fee2e2; padding:10px;">
 <ul>
 @foreach ($errors->all() as $error)
 <li>{{ $error }}</li>
 @endforeach
 </ul>
 </div>
@endif
<input type="text" name="judul" value="{{ old('judul') }}">
@error('judul')
 <small style="color:red;">{{ $message }}</small>
@enderror

<form action="{{ route('artikel.store') }}" method="POST">
 @csrf
 <table>
    <tr>
        <td>Judul : </td>
        <td><input type="text" name="judul" placeholder="Judul Artikel" value="{{ old('judul') }}"></td>
    </tr>
    <tr>
        <td>Isi : </td>
        <td><textarea name="isi" placeholder="Isi Artikel" value="{{ old('isi') }}"></textarea></td>
    </tr>
    <tr>
        <td>Status : </td>
        <td><select name="status">
        <option value="draft">Draft</option>
        <option value="terbit">Terbit</option>
        </select>
        </td>
    </tr>
    <tr>
        <td><button type="submit">Simpan</button></td>
    </tr>
</table>
</form>
@endsection