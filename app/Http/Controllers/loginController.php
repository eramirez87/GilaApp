<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function authenticate(Request $request){
        $input = $request->except('_token');
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);
        if( Auth::attempt( $credentials ) ){
            $request->session()->regenerate();
            return redirect()->route('home');
        }
        return back()->withErrors([
            'email' => 'Email/Contraseña incorrectos.',
        ])->onlyInput('email');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.login');
    }
}
