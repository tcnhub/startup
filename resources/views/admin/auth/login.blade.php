<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Iniciar Sesión</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: sans-serif; background: #1a1a2e; display: flex; justify-content: center; align-items: center; min-height: 100vh; }
        .card { background: #16213e; padding: 2rem; border-radius: 12px; width: 100%; max-width: 400px; box-shadow: 0 10px 30px rgba(0,0,0,0.3); }
        h2 { color: #e94560; text-align: center; margin-bottom: 1.5rem; }
        label { color: #a8a8b3; display: block; margin-bottom: 0.3rem; font-size: 0.9rem; }
        input { width: 100%; padding: 0.7rem; margin-bottom: 1rem; border: 1px solid #333; border-radius: 6px; background: #0f3460; color: #fff; }
        button { width: 100%; padding: 0.75rem; background: #e94560; color: white; border: none; border-radius: 6px; cursor: pointer; font-size: 1rem; }
        button:hover { background: #c73652; }
        .error { color: #e94560; font-size: 0.85rem; margin-bottom: 1rem; }
    </style>
</head>
<body>
<div class="card">
    <h2>Panel Admin</h2>

    @if ($errors->any())
        <div class="error">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('admin.login') }}">
        @csrf
        <label for="email">Correo electrónico</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>

        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" required>

        <div style="margin-bottom: 1rem;">
            <label style="display: inline;">
                <input type="checkbox" name="remember" style="width: auto;"> Recuérdame
            </label>
        </div>

        <button type="submit">Iniciar Sesión</button>
    </form>
</div>
</body>
</html>
