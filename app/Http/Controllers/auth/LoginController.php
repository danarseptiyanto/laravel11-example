<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        if (auth()->attempt($request->only('username', 'password'))) 
        {
            return redirect()->route('homepage');
        }
        return back()->with('status', 'Kombinasi username dan password salah!');
    }
}
