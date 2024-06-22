<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/layouts/header.css') }}" />
    <script src="https://kit.fontawesome.com/3e5c0e8e92.js" crossorigin="anonymous"></script>
    <title>Mogitate</title>
    @yield('css')
</head>
<body>
    <header>
        <div class="header__flex">
            <img src="{{ url('/img/logo.png') }}" alt="img" class="header_logo">
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>