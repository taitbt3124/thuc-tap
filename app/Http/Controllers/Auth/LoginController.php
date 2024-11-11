<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $redirectTo = '/home';  // Trang sẽ chuyển hướng sau khi đăng nhập thành công

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->intended('/home');  // Redirect to intended page or home
        }

        return back()->withErrors(['email' => 'The provided credentials are incorrect.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    
}
