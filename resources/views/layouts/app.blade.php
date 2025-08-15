<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'To-Do App')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body class="bg-gray-100">

    <div class="flex flex-col min-h-screen">

        @include('layouts.navbar')

        <main class="flex-grow">
            @yield('content')
        </main>

        @include('layouts.footer')

    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>