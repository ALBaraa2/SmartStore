<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
        @if (Auth::guest())
            @include('layouts.customer-navbar')
        @else
            @if (Auth::user()->role === 'admin')
                @include('layouts.admin-navbar')
            @elseif (Auth::user()->role === 'delivery')
                @include('layouts.delivery-navbar')
            @elseif (Auth::user()->role === 'customer')
                @include('layouts.customer-navbar')
            @endif
        @endif
    </header>
    <main>
        @yield('content')
    </main>
    <footer class="bg-gradient-to-r from-blue-600 to-purple-700 text-white py-6 mt-10">
        <div class="container mx-auto text-center">
            <p class="text-lg font-semibold">&copy; 2025 Your Store. All Rights Reserved.</p>
            <p class="text-sm mt-2">
                Made with ❤️ by 
                <a href="#" class="text-yellow-300 hover:text-yellow-400 underline">Your Team</a>
            </p>
        </div>
    </footer>
</body>
</html>
