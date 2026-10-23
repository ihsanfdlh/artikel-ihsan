@extends('layouts.app')

@section('title', 'Register')

@section('konten')
<div class="register-form" style="max-width: 500px; margin: 0 auto;">
    <h2 style="margin-bottom: 20px; text-align: center;">Create an Account</h2>
    @if ($errors->any())
        <div class="alert-success" style="background-color: #f8d7da; color: #842029; padding: 12px; border-radius: 5px; margin-bottom: 20px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('register') }}" style="display: flex; flex-direction: column; gap: 15px;">
        @csrf
        <div>
            <label for="name" style="display: block; margin-bottom: 5px; font-weight: bold;">Name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 4px;" />
        </div>
        <div>
            <label for="email" style="display: block; margin-bottom: 5px; font-weight: bold;">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                style="width: 100%; padding: 10px; border: 1 solid #cbd5e1; border-radius: 4px;" />
        </div>
        <div>
            <label for="password" style="display: block; margin-bottom: 5px; font-weight: bold;">Password</label>
            <input id="password" type="password" name="password" required
                style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 4px;" />
        </div>
        <div>
            <label for="password_confirmation" style="display: block; margin-bottom: 5px; font-weight: bold;">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required
                style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 4px;" />
        </div>
        <div style="text-align: center; margin-top: 10px;">
            <button type="submit" style="background-color: #2563eb; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">
                Register
            </button>
        </div>
    </form>
</div>
@endsection
