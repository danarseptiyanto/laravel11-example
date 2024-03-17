@extends('components.main')
@section('content')
<h1>Register</h1>
<form action="{{ route('auth.register') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="name"><br>
        @error('name')
            <p>{{ $message }}</p>
        @enderror
    <input type="text" name="username" placeholder="username"><br>
        @error('username')
            <p>{{ $message }}</p>
        @enderror
    <input type="email" name="email" placeholder="email"><br>
        @error('email')
            <p>{{ $message }}</p>
        @enderror
    <input type="password" name="password" placeholder="password"><br>
        @error('password')
            <p>{{ $message }}</p>
        @enderror
    <input type="password" name="password_confirmation" placeholder="password confirmation"><br>
    <button type="submit">Register</button>
</form>
@endsection