<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signin()
    {
        return view("signin");
    }
    public function signup()
    {
        return view("signup");
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed'
        ]);

        $user = new User();
        $user->username = $validated['username'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->save();

        return redirect()->route('auth.signin')->with('success', 'Registrasion Complete');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function update(Request $request) {
        $request->validate([
            'username' => 'required',
            'pfp' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:10240',
        ]);

        $user = User::findOrFail(Auth::user()->id);

        if ($request->hasFile('pfp')) {
            $path = $request->file('pfp')->store('profile_pict', 'public');
            $user->pfp = $path;
        }

        $user->username = $request->username;
        $user->save();

        return back();
    }
}
