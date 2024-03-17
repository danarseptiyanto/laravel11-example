@extends('components.main')
@section('content')
<h1>Login</h1>
@if (session('status'))
    {{ session('status') }}
@endif
<form action="{{ route('auth.login') }}" method="POST">
    @csrf
    <input type="text" name="username" placeholder="username"><br>
        @error('username')
            <p>{{ $message }}</p>
        @enderror
    <input type="password" name="password" placeholder="username"><br>
        @error('password')
            <p>{{ $message }}</p>
        @enderror
    <button type="submit">Login</button>
</form>
@endsection