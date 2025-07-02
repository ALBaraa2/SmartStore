@extends('layouts.auth')

@section('title', 'Register')

@section('content')
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Create Your Account</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-gray-700 mb-2">Full Name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required
                   class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring focus:ring-blue-200">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 mb-2">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                   class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring focus:ring-blue-200">
        </div>

        <div class="mb-4">
            <label for="phone" class="block text-gray-700 mb-2">Phone Number</label>
            <input id="phone" type="text" name="phone" value="{{ old('phone') }}" required
                   class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring focus:ring-blue-200">
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700 mb-2">Password</label>
            <input id="password" type="password" name="password" required
                   class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring focus:ring-blue-200">
        </div>

        <div class="mb-6">
            <label for="password_confirmation" class="block text-gray-700 mb-2">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required
                   class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring focus:ring-blue-200">
        </div>

        <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition duration-300">
            Register
        </button>

        <p class="mt-4 text-sm text-center text-gray-600">
            Already have an account?
            <a href="{{ route('login.show') }}" class="text-blue-500 hover:underline">Login here</a>
        </p>
    </form>
@endsection
