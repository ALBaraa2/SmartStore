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
    <footer>
        <p>&copy; 2025 Your Store</p>
    </footer>
</body>
</html>
