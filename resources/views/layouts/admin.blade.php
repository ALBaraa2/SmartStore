<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin | @yield('title', 'Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">🛒 Supermarket Admin</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#">Products</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Users</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Orders</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container py-5">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="text-center py-4 bg-dark text-white">
        &copy; {{ date('Y') }} Smart Supermarket Admin Panel
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
