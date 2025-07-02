<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Auth')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-white p-8 shadow-lg rounded-lg">
        <div class="flex justify-center mb-6">
            <div class="bg-gray-100 p-4 rounded-full shadow-md">
                <img src="{{ asset('icons/store.svg') }}" alt="Store Icon" class="w-12 h-12 text-gray-900">
            </div>
        </div>
        @yield('content')
    </div>

</body>
</html>
