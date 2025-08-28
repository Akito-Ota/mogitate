<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'mogitate')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
</head>

<body>

    <header class="site-header">
        <h1 class="site-logo">mogitate</h1>
    </header>


    <main>
        @yield('content')
    </main>
</body>

</html>