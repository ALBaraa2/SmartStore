<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function adminDashboard()
    {
        // Check if the user is authenticated and is an admin
        if (auth()->check() && auth()->user()->role === 'admin') {
            return view('admin.dashboard');
        }

        // If not an admin, redirect to home with an error message
        return redirect()->route('home')->with('error', 'You do not have access to the admin dashboard.');
    }
}
