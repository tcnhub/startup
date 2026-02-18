<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agencia Dashboard</title>
    <style>
        body { font-family: sans-serif; background: #0a192f; color: #ccd6f6; padding: 2rem; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; }
        h1 { color: #64ffda; }
        .btn-logout { background: #64ffda; color: #0a192f; padding: 0.5rem 1rem; border: none; border-radius: 6px; cursor: pointer; font-weight: bold; }
    </style>
</head>
<body>
<div class="header">
    <h1>Dashboard Agencia</h1>
    <form method="POST" action="{{ route('agencia.logout') }}">
        @csrf
        <button class="btn-logout" type="submit">Cerrar Sesión</button>
    </form>
</div>
<p>Bienvenido, {{ Auth::guard('agencia')->user()->nombre }}!</p>
</body>
</html>
