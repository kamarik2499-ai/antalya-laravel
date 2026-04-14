<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Админка Antalya')</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #111; color: #eee; }
        header { background: #1c1c1c; border-bottom: 1px solid #333; padding: 12px 20px; display: flex; gap: 16px; align-items: center; }
        a { color: #f2c14e; text-decoration: none; }
        nav a { margin-right: 12px; }
        main { padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 12px; }
        th, td { border: 1px solid #333; padding: 8px; text-align: left; vertical-align: top; }
        th { background: #1a1a1a; }
        .ok { background: #16311e; border: 1px solid #2e6b3f; color: #b2efc1; padding: 10px; margin-bottom: 12px; }
        .row { display: flex; gap: 8px; align-items: center; }
        select, button, input { background: #181818; color: #eee; border: 1px solid #444; padding: 6px 8px; border-radius: 6px; }
        button { cursor: pointer; }
        .right { margin-left: auto; }
        .muted { color: #aaa; }
    </style>
</head>
<body>
    <header>
        <strong>Antalya Admin</strong>
        <nav>
            <a href="{{ route('admin.orders.index') }}">Заказы</a>
            <a href="{{ route('admin.reservations.index') }}">Бронирования</a>
            <a href="{{ route('admin.menu.index') }}">Меню</a>
        </nav>
        <form class="right" method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit">Выйти</button>
        </form>
    </header>
    <main>
        @if (session('ok'))
            <div class="ok">{{ session('ok') }}</div>
        @endif
        @yield('content')
    </main>
</body>
</html>

