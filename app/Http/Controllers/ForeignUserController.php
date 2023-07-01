<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForeignUserController extends Controller
{
    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Pengguna berhasil diautentikasi
        return redirect()->intended('/');
    } else {
        // Autentikasi gagal
        return redirect()->back()->withInput()->withErrors(['login' => 'Invalid credentials']);
    }
}
}


