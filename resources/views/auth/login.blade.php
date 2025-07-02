@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Login to Your Account</h2>

    @if (session('error'))
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-4">
            <label for="email" class="block text-gray-700 mb-2">Email Address</label>
            <input id="email" type="email" name="email" required autofocus value="{{ old('email') }}"
                   class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring focus:ring-blue-200">
        </div>

        <div class="mb-6">
            <label for="password" class="block text-gray-700 mb-2">Password</label>
            <input id="password" type="password" name="password" required
                   class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring focus:ring-blue-200">
        </div>

        <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg transition duration-300">
            Login
        </button>

        <p class="mt-4 text-sm text-center text-gray-600">
            Don't have an account?
            <a href="{{ route('register.show') }}" class="text-blue-500 hover:underline">Register here</a>
        </p>
    </form>
@endsection
