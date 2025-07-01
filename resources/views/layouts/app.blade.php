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
    <footer class="bg-gray-800 text-white py-6 mt-10">
        <div class="container mx-auto text-center">
            <p class="text-lg font-semibold">&copy; 2025 Your Store. All Rights Reserved.</p>
            <p class="text-sm mt-2">
                Made with ❤️ by 
                <a href="#" class="text-gray-300 hover:text-white underline">Your Team</a>
            </p>
            <div class="mt-4 flex justify-center space-x-4">
                <!-- Instagram Icon -->
                <a href="https://www.instagram.com/albaraa_.02/" target="_blank" class="inline-block text-gray-400 hover:text-blue-500 transition">
                    <img 
                        src="{{ asset('icons/instagram.svg') }}" 
                        alt="Instagram" 
                        class="w-6 h-6"
                    >
                </a>
                <!-- Facebook Icon -->
                <a href="https://www.facebook.com/al.baraa.1675" target="_blank" class="inline-block text-gray-400 hover:text-blue-500 transition">
                    <img 
                        src="{{ asset('icons/facebook.svg') }}" 
                        alt="Facebook" 
                        class="w-6 h-6"
                    >
                </a>
                <!-- GitHub Icon -->
                <a href="https://github.com/ALBaraa2" target="_blank" class="inline-block text-gray-400 hover:text-blue-500 transition">
                    <img 
                        src="{{ asset('icons/github.svg') }}" 
                        alt="GitHub" 
                        class="w-6 h-6"
                    >
                </a>
            </div>
        </div>
    </footer>
</body>
</html>
