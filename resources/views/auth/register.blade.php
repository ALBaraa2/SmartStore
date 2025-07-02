@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="max-w-md mx-auto mt-20 p-8 bg-white shadow-lg rounded-lg">
    <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Create Your Account</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-gray-700 mb-2">Full Name</label>
            <input id="name" type="text" name="name" required
                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring focus:ring-blue-200">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 mb-2">Email Address</label>
            <input id="email" type="email" name="email" required
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

        <div class="mb-4">
            <label for="phone" class="block text-gray-700 mb-2">Phone Number</label>
            <input id="phone" type="text" name="phone" required
                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring focus:ring-blue-200">
        </div>

        <button type="submit"
            class="w-full bg-blue-500 hover:bg-blue-600 text-white py-3 rounded-lg font-semibold transition duration-300">
            Register
        </button>

        <p class="mt-4 text-sm text-center text-gray-600">
            Already have an account?
            <a href="{{ route('login.show') }}" class="text-blue-500 hover:underline">Login here</a>
        </p>
    </form>
</div>
@endsection
