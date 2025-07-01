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
            <div class="mt-4">
                <a href="#" class="inline-block mx-2 text-gray-400 hover:text-white transition">
                    <svg xmlns="https://www.svgrepo.com/svg/506668/instagram" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M22.54 6.42a4.8 4.8 0 01-1.38.39 2.42 2.42 0 001.06-1.33 4.85 4.85 0 01-1.54.59 2.43 2.43 0 00-4.13 2.2 6.9 6.9 0 01-5-2.55 2.43 2.43 0 00.75 3.24A2.41 2.41 0 013 8.71v.03a2.43 2.43 0 001.94 2.38 2.4 2.4 0 01-1.1.04 2.43 2.43 0 002.27 1.68A4.87 4.87 0 012 15.3a6.88 6.88 0 003.73 1.1c4.48 0 6.94-3.7 6.94-6.92 0-.1-.01-.2-.02-.3a4.96 4.96 0 001.2-1.27" />
                    </svg>
                </a>
                <a href="#" class="inline-block mx-2 text-gray-400 hover:text-white transition">
                    <svg xmlns="https://icons8.com/icon/DpOQ6G5p47f0/instagram" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.69 12.05A6.65 6.65 0 1012.4 16.9l.08-.12-.01-.02a6.67 6.67 0 004.22-4.67zM15.24 3.76a1.47 1.47 0 11-2.08 0 1.47 1.47 0 012.08 0zm5.16 7.84a6.67 6.67 0 11-9.88 9.88 6.67 6.67 0 019.88-9.88zm-4.74 8.6a1.97 1.97 0 11-2.79-2.79 1.97 1.97 0 012.79 2.79z" />
                    </svg>
                </a>
                <a href="#" class="inline-block mx-2 text-gray-400 hover:text-white transition">
                    <svg xmlns="https://www.svgrepo.com/svg/506668/instagram" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 19V6.64m4.18-.26l5.82 5.82M8.18 5.38a3.5 3.5 0 10-3.18 3.18m9 9a3.5 3.5 0 003.18-3.18M5.5 10.5h4M6.75 9v3M13.26 8.32l1.44-1.44m0 3.56h3.88M15.36 9v3m1.94-5.2a5.5 5.5 0 100 11" />
                    </svg>
                </a>
            </div>
        </div>
    </footer>
</body>
</html>
