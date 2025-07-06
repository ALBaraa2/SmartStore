<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Dashboard')</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Sidebar + Header -->
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md">
            <div class="p-4 text-2xl font-bold text-center border-b">
                🛒 Admin Panel
            </div>
            <nav class="p-4 space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-100 {{ request()->is('admin/dashboard') ? 'bg-gray-200 font-bold' : '' }}">
                    Dashboard
                </a>
                <ul class="space-y-2">
                    <li>
                        <a href="#" class="block px-4 py-2 rounded hover:bg-gray-100">
                            Manage Products
                        </a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 rounded hover:bg-gray-100">
                            Manage Products
                        </a>
                    </li>
                </ul>
                <a href="#" class="block px-4 py-2 rounded hover:bg-gray-100">
                    Manage Users
                </a>
                <a href="#" class="block px-4 py-2 rounded hover:bg-gray-100">
                    Manage Orders
                </a>
                <a href="{{ route('logout') }}" class="block px-4 py-2 rounded text-red-600 hover:bg-red-100">
                    Logout
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            @yield('content')
        </div>
    </div>

</body>
</html>
