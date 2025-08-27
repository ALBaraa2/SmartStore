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

    <div class="min-h-screen flex">

        <!-- Sidebar -->
        <div class="w-64 h-screen fixed top-0 left-0 border-e border-gray-100 bg-white flex flex-col justify-between">
            <div class="px-4 py-6 overflow-y-auto">
                <span class="grid h-10 w-full place-content-center rounded-lg bg-gray-100 text-xs text-gray-600 font-semibold">
                    🛒 Supermarket Admin
                </span>

                <ul class="mt-6 space-y-1">
                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                            class="block rounded-lg px-4 py-2 text-sm font-medium {{ request()->routeIs('admin.dashboard') ? 'bg-gray-100 text-gray-700' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-700' }}">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.products.index') }}"
                            class="block rounded-lg px-4 py-2 text-sm font-medium {{ request()->is('admin/products*') ? 'bg-gray-100 text-gray-700' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-700' }}">
                            Products
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.orders.index') }}"
                            class="block rounded-lg px-4 py-2 text-sm font-medium {{ request()->is('admin/orders*') ? 'bg-gray-100 text-gray-700' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-700' }}">
                            Orders
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.users.index') }}"
                            class="block rounded-lg px-4 py-2 text-sm font-medium {{ request()->is('admin/users*') ? 'bg-gray-100 text-gray-700' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-700' }}">
                            Users
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.settings.index') }}"
                            class="block rounded-lg px-4 py-2 text-sm font-medium {{ request()->is('admin/settings*') ? 'bg-gray-100 text-gray-700' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-700' }}">
                            Settings
                        </a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="w-full text-left rounded-lg px-4 py-2 text-sm font-medium text-red-600 hover:bg-red-100">
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>

            <!-- Admin Info at Bottom -->
            <div class="border-t border-gray-100 p-4">
                <a href="#" class="flex items-center gap-2 hover:bg-gray-50 p-2 rounded-lg">
                    <img alt="Admin" src="{{ asset('icons/user.svg') }}"
                        class="size-10 rounded-full object-cover">
                    <div>
                        <p class="text-xs font-medium">{{ auth()->user()->name }}</p>
                        <span class="text-gray-500 text-xs">{{ auth()->user()->email }}</span>
                    </div>
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 ml-64 p-6">
            @include('alert')
            @yield('content')
        </div>
    </div>

</body>


</html>
