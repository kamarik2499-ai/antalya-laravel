<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Вход в админку</title>
    <style>
        body { margin:0; font-family: Arial, sans-serif; background:#111; color:#eee; display:grid; place-items:center; min-height:100vh; }
        .card { width:min(420px, 92vw); background:#1b1b1b; border:1px solid #333; border-radius:12px; padding:20px; }
        h1 { margin-top:0; font-size:1.2rem; }
        label { display:block; margin:10px 0 4px; }
        input { width:100%; box-sizing:border-box; padding:10px; border-radius:8px; border:1px solid #444; background:#141414; color:#eee; }
        button { margin-top:14px; width:100%; padding:10px; border-radius:8px; border:1px solid #444; background:#f2c14e; color:#111; font-weight:700; cursor:pointer; }
        .err { color:#ff9b9b; font-size:.92rem; margin-top:8px; }
        .muted { color:#aaa; font-size:.9rem; margin-top:10px; }
    </style>
</head>
<body>
    <form class="card" method="POST" action="{{ route('admin.login.submit') }}">
        @csrf
        <h1>Вход в админ-панель Antalya</h1>
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
        <label>Пароль</label>
        <input type="password" name="password" required>
        <button type="submit">Войти</button>
        @error('email')
            <div class="err">{{ $message }}</div>
        @enderror
        <div class="muted">После первого входа смените пароль администратора.</div>
    </form>
</body>
</html>

