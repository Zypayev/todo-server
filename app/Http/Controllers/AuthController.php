<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show the Login Page
    public function showLogin()
    {
        return Inertia::render('Auth/Login');
    }

    // Handle the Login attempt
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Security best practice
            return redirect()->intended('/tasks');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Handle Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function showRegister()
    {
        return Inertia::render('Auth/Register');
    }

    public function register(Request $request)
    {
        // 1. Validate the input
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4|confirmed', // 'confirmed' looks for 'password_confirmation'
        ]);

        // 2. Create the User
        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']), // Securely hash the password!
        ]);

        // 3. Log them in immediately
        Auth::login($user);

        // 4. Send them to their tasks
        return redirect('/tasks');
    }

    public function profile()
    {
        return Inertia::render('Profile', [
            'user' => auth()->user()
        ]);
    }
}
