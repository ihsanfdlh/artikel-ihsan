@extends('layouts.app')
@section('konten')
<h1>Login</h1>
@if ($errors->any())
 <div style="color:red;">{{ $errors->first() }}</div>
@endif
<form action="{{ route('login.post') }}" method="POST">
 @csrf
 <input type="email" name="email" placeholder="Email" value="{{ old('email') }}"><br>
 <input type="password" name="password" placeholder="Password"><br>
 <button type="submit">Login</button>
</form>
<p>Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
@endsection