<!DOCTYPE html>
<html lang="en">
@stack('styles')
<head>
    <meta charset="UTF-8">
    <title>Laravel App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.tailwindcss.com"></script>
</head>
@stack('scripts')
<body class="bg-gray-100 text-gray-800 font-sans">
    <nav class="bg-white shadow mb-6">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-lg font-bold text-blue-600">Laravel CRM</a>
            <div class="space-x-4">
                <a href="/companies" class="text-gray-700 hover:text-blue-600">Companies</a>
                <a href="/employees" class="text-gray-700 hover:text-blue-600">Employees</a>
                <a href="/skills" class="text-gray-700 hover:text-blue-600">Skills</a>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-6">
        <div class="container mx-auto p-6">
            {{-- Flash Message --}}
            @if (session('success'))
            <div class="mb-4 p-4 bg-green-200 text-green-800 rounded">
                {{ session('success') }}
            </div>
            @endif

            {{-- Validation Error --}}
            @if ($errors->any())
            <div class="mb-4 p-4 bg-red-200 text-red-800 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @yield('content')
        </div>
    </main>

    <footer class="text-center text-sm text-gray-500 mt-10 mb-4">
        &copy; {{ date('Y') }} Laravel App. All rights reserved.
    </footer>
</body>

</html>