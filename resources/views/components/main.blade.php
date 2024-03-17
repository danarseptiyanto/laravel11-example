<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 11</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    <style>
        table {
          border-collapse: collapse;
        }
        
        td, th {
          border: 1px solid #0C151C;
          text-align: left;
          padding: 8px;
        }
        </style>
</head>
<body>
    <table>
    <tr>
        @guest
        <th><a href="{{ route('homepage') }}">Daftar</a></th>
        <th><a href="{{ route('auth.login') }}">Login</a></th>
        <th><a href="{{ route('auth.register') }}">Register</a></th>
        @endguest
        @auth
        <th><a href="{{ route('create') }}">Tambah</a></th>
        <th>Danar Septiyanto</th>
        <th><a href="{{ route('auth.logout') }}">Logout</a></th>
        @endauth
    </tr>
    </table>
    @yield('content')
</body>
</html>