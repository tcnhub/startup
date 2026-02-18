<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agencia - Iniciar Sesión</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: sans-serif; background: #0a192f; display: flex; justify-content: center; align-items: center; min-height: 100vh; }
        .card { background: #112240; padding: 2rem; border-radius: 12px; width: 100%; max-width: 400px; box-shadow: 0 10px 30px rgba(0,0,0,0.3); }
        h2 { color: #64ffda; text-align: center; margin-bottom: 1.5rem; }
        label { color: #8892b0; display: block; margin-bottom: 0.3rem; font-size: 0.9rem; }
        input { width: 100%; padding: 0.7rem; margin-bottom: 1rem; border: 1px solid #233554; border-radius: 6px; background: #1d3557; color: #fff; }
        button { width: 100%; padding: 0.75rem; background: #64ffda; color: #0a192f; border: none; border-radius: 6px; cursor: pointer; font-size: 1rem; font-weight: bold; }
        button:hover { background: #52e0c0; }
        .error { color: #ff6b6b; font-size: 0.85rem; margin-bottom: 1rem; }
    </style>
</head>
<body>
<div class="card">
    <h2>Portal Agencia</h2>

    @if ($errors->any())
        <div class="error">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('agencia.login') }}">
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
