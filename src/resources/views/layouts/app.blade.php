<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'COACHTECH フリーマーケット')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <header class="bg-black text-white py-4 text-center text-lg font-bold">
        COACHTECH
    </header>

    <main class="container mx-auto mt-8">
        @yield('content')
    </main>
</body>
</html>
