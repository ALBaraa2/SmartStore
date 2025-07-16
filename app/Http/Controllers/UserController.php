<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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

    public function index(Request $request)
    {
        $search = $request->input('search');


        $users = User::whereAny([
            'name',
            'email',
            'role'
        ], 'ILIKE', "%{$search}%")
        ->orderBy('created_at', 'desc')
        ->paginate(50, ['*'], 'page', $request->input('page', 1));

        return view('admin.users.index', compact('users'));
    }

    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:admin,customer,delivery_personnel',
        ]);
        
        // Update the user's role
        $user->role = $request->input('role');
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User role updated successfully.');
    }
}
