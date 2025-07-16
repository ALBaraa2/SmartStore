@extends('layouts.admin')

@section('title', 'User Details')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.users.index') }}"
       class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-800 text-sm font-medium rounded hover:bg-gray-200">
        ← Back to Users
    </a>
</div>

<div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-6">👤 User Details</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div>
            <p class="text-sm text-gray-500">Full Name</p>
            <p class="text-lg font-semibold">{{ $user->name }}</p>
        </div>

        <div>
            <p class="text-sm text-gray-500">Email Address</p>
            <p class="text-lg font-semibold">{{ $user->email }}</p>
        </div>

        <div>
            <p class="text-sm text-gray-500">Phone Number</p>
            <p class="text-lg font-semibold">{{ $user->phone }}</p>
        </div>

        <div>
            <p class="text-sm text-gray-500">User Role</p>
            <span class="inline-block px-3 py-1 text-sm rounded-full
                @if($user->role === 'admin') bg-green-100 text-green-800
                @elseif($user->role === 'customer') bg-blue-100 text-blue-800
                @elseif($user->role === 'delivery_personnel') bg-yellow-100 text-yellow-800
                @else bg-gray-200 text-gray-700 @endif">
                {{ ucfirst($user->role) }}
            </span>
        </div>

        <div class="md:col-span-2">
            <p class="text-sm text-gray-500">Registered At</p>
            <p class="text-gray-700">{{ $user->created_at->format('Y-m-d H:i') }}</p>
        </div>
    </div>

    {{-- Form to change role --}}
    <form action="{{ route('admin.users.updateRole', $user) }}" method="POST" id="roleChangeForm">
        @csrf
        @method('PATCH')

        <label for="role" class="block text-gray-700 font-semibold mb-2">Change User Role</label>
        <select name="role" id="role" class="w-full max-w-xs rounded border border-gray-300 px-3 py-2 mb-4">
            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="customer" {{ $user->role === 'customer' ? 'selected' : '' }}>Customer</option>
            <option value="delivery_personnel" {{ $user->role === 'delivery_personnel' ? 'selected' : '' }}>Delivery</option>
        </select>

        <button
            type="submit"
            class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700"
            onclick="return confirm('Warning: Changing the user role may affect their permissions. Are you sure you want to continue?');"
        >
            Change Role
        </button>
    </form>
</div>
@endsection
