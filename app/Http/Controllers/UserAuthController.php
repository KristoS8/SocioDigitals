<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    public function viewSignUp() {
        return view('signUp');
    }
    public function viewLogin() {
        return view('login');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:30',
            'email' => 'required|max:100|email:dns',
            'password' => 'required|min:5|max:20'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['remember_token'] = Str::random(10);
        $validatedData['email_verified_at'] = now();   

        $borrower = User::create($validatedData);
        Auth::login($borrower);

        return redirect('/home')->with('registSuccess', 'Berhasil daftar!');
    }

    public function auth(Request $request) :RedirectResponse {
        $validatedData = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:5|max:20'
        ]);

        if (Auth::attempt($validatedData)) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        return back()->with('loginError', 'login gagal, silahkan ulangi!');
    }

    public function logout() {
        Auth::logout();
        return view('signUp');
    }
}
