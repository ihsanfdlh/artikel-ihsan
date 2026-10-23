
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Manajemen Artikel')</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background-color: #f8fafc;
            color: #1e293b;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        .alert-success {
            background-color: #d1fae5;
            color: #065f46;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        a {
            color: #2563eb;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        button {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">

        <h1>Manajemen Artikel</h1>

        @if (session('pesan'))
            <div class="alert-success">
                {{ session('pesan') }}
            </div>
        @endif

        <nav>
        <a href="{{ route('artikel.index') }}">Artikel</a>
        @auth
        <span>Halo, {{ auth()->user()->name }}</span>
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit">Logout</button>
        </form>
        @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Daftar</a>
        @endauth
        </nav>

        <main>
            @yield('konten')
        </main>

    </div>
</body>
</html>
