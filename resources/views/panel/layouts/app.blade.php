<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name')) — Panel</title>
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendors/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @stack('styles')
</head>
<body class="compact-wrapper" data-sidebar="stroke">

<div class="page-wrapper" id="pageWrapper">

    <!-- Header -->
    <div class="page-header">
        <div class="header-wrapper row m-0 align-items-center">
            <div class="header-logo-wrapper col-auto">
                <a href="{{ route($panelGuard . '.dashboard') }}" class="fw-bold text-dark text-decoration-none fs-5">
                    {{ $panelTitle ?? config('app.name') }}
                </a>
            </div>
            <div class="col"></div>
            <div class="col-auto d-flex gap-2 align-items-center">
                <a href="{{ route($panelGuard . '.profile.edit') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="fa fa-user-circle"></i> Perfil
                </a>
                <form method="POST" action="{{ route($panelGuard . '.logout') }}" class="d-inline">
                    @csrf
                    <button class="btn btn-sm btn-outline-danger">
                        <i class="fa fa-sign-out"></i> Salir
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Sidebar + Content -->
    <div class="page-body-wrapper">
        <div class="sidebar-wrapper">
            <nav class="sidebar-main">
                <div id="sidebar-menu">
                    <ul class="sidebar-links">
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title link-nav {{ request()->routeIs($panelGuard.'.dashboard') ? 'active' : '' }}"
                               href="{{ route($panelGuard . '.dashboard') }}">
                                <i class="fa fa-home me-2"></i> Dashboard
                            </a>
                        </li>
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title link-nav {{ request()->routeIs($panelGuard.'.posts.*') ? 'active' : '' }}"
                               href="{{ route($panelGuard . '.posts.index') }}">
                                <i class="fa fa-file-text me-2"></i> Mis Posts
                            </a>
                        </li>
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title link-nav {{ request()->routeIs($panelGuard.'.profile.*') ? 'active' : '' }}"
                               href="{{ route($panelGuard . '.profile.edit') }}">
                                <i class="fa fa-user me-2"></i> Mi Perfil
                            </a>
                        </li>
                        <li class="sidebar-list ps-3">
                            <a class="sidebar-link link-nav small {{ request()->routeIs($panelGuard.'.profile.gallery') ? 'active' : '' }}"
                               href="{{ route($panelGuard . '.profile.gallery') }}">
                                <i class="fa fa-photo me-2"></i> Galería
                            </a>
                        </li>
                        <li class="sidebar-list ps-3">
                            <a class="sidebar-link link-nav small {{ request()->routeIs($panelGuard.'.profile.password') ? 'active' : '' }}"
                               href="{{ route($panelGuard . '.profile.password') }}">
                                <i class="fa fa-lock me-2"></i> Contraseña
                            </a>
                        </li>
                        @stack('sidebar-extra')
                    </ul>
                </div>
            </nav>
        </div>

        <div class="page-body">
            <div class="container-fluid">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible mt-3" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible mt-3" role="alert">
                        <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                @yield('content')
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
@stack('scripts')
</body>
</html>
