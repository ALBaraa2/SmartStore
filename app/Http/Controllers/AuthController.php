<?php

namespace App\Http\Controllers;

use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($validated)) {
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Welcome back, Admin ' . Auth::user()->name . '!');
            } else {
                return redirect()->intended('Home')->with('success', 'Welcome back '. Auth::user()->name . '!');
            }
        } else {
            // Authentication failed
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|string|max:15',
        ]);

        $user = User::create($validated);

        Auth::login($user);

        return redirect()->route('home')->with('success', 'Registration successful! Welcome, ' . $user->name . '!');
    }

    public function logout(Request $request)
    {
        $role = auth()->user()->role;
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        if ($role === 'admin') {
            return redirect()->route('login')->with('success', 'You have been logged out successfully.');
        } else {
            return redirect()->route('home');
        }
    }
}
