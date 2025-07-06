<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button type="button"
                    class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:outline-hidden focus:ring-inset"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex shrink-0 items-center">
                    <img class="h-8 w-auto" src="{{ asset('icons/store.svg') }}" alt="Your Store" />
                </div>
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        <!-- Customer-specific links -->
                        <a href="{{ route('home') }}"
                            class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white"
                            aria-current="page">Browse Products</a>
                        <a href="#"
                            class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">My
                            Orders</a>
                        <a href="{{ route('cart.view') }}"
                            class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">My
                            Cart</a>
                    </div>
                </div>
            </div>

            @auth
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <button type="button"
                        class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden">
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">View notifications</span>
                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                        </svg>
                    </button>

                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        <div>
                            <button type="button"
                                class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-gray-800"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true" onclick="toggleDropdown()">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full" src="{{ asset('icons/user.svg') }}"
                                    alt="Customer Profile" />
                            </button>
                        </div>
                        <div id="profile-dropdown"
                            class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 hidden"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700">Your Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700">Settings</a>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="block px-4 py-2 text-sm text-gray-700">
                                    Sign out
                                </button>
                            </form>
                        </div>
                    </div>
                @endauth

                @guest
                    <div class="ml-4 flex items-center space-x-3">
                        <a href="{{ route('login.show') }}"
                            class="inline-block text-sm font-medium text-gray-100 border border-white px-4 py-2 rounded-lg hover:bg-white hover:text-gray-800 transition duration-300 shadow-sm">
                            Sign In
                        </a>
                        <a href="{{ route('register.show') }}"
                            class="inline-block text-sm font-medium text-white bg-gradient-to-r from-blue-500 to-indigo-600 px-4 py-2 rounded-lg hover:from-blue-600 hover:to-indigo-700 transition duration-300 shadow-sm">
                            Register
                        </a>
                    </div>
                @endguest
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pt-2 pb-3">
            <a href="{{ route('home') }}"
                class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white"
                aria-current="page">Browse Products</a>
            <a href="#"
                class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">My
                Orders</a>
            <a href="{{ route('cart.view') }}"
                class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">My
                Cart</a>
        </div>
    </div>
</nav>

<script>
    function toggleDropdown() {
        const dropdown = document.getElementById('profile-dropdown');
        dropdown.classList.toggle('hidden');
    }
</script>
