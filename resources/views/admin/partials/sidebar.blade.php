<div class="sidebar-wrapper" sidebar-layout="stroke-svg">
    <div>
        <div class="logo-wrapper">
            <a href="{{ route('home') ?? '/' }}">
                <img class="img-fluid for-light" src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo Claro">
                <img class="img-fluid for-dark" src="{{ asset('assets/images/logo/logo_dark.png') }}" alt="Logo Oscuro">
            </a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar">
                <i class="status_toggle middle sidebar-toggle" data-feather="grid"></i>
            </div>
        </div>

        <div class="logo-icon-wrapper">
            <a href="{{ route('home') ?? '/' }}">
                <img class="img-fluid" src="{{ asset('assets/images/logo/logo-icon.png') }}" alt="Logo Icon">
            </a>
        </div>

        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>

            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">

                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>

                    <!-- Dashboard -->
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                            <svg class="stroke-icon"><use href="{{ asset('assets/svg/icon-sprite.svg') }}#fill-home"></use></svg>
                            <svg class="fill-icon"><use href="{{ asset('assets/svg/icon-sprite.svg') }}#fill-home"></use></svg>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <!-- Posts / Artículos -->
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}" href="#">
                            <svg class="stroke-icon"><use href="{{ asset('assets/svg/icon-sprite.svg') }}#stroke-animation"></use></svg>
                            <svg class="fill-icon"><use href="{{ asset('assets/svg/icon-sprite.svg') }}#fill-animation"></use></svg>
                            <span>Artículos</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('admin.posts.index') }}">Lista de Artículos</a></li>
                            <li><a href="{{ route('admin.posts.create') }}">Nuevo Artículo</a></li>
                        </ul>
                    </li>

                    <!-- Hoteles -->
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title {{ request()->routeIs('admin.hoteles.*') ? 'active' : '' }}" href="#">
                            <svg class="stroke-icon"><use href="{{ asset('assets/svg/icon-sprite.svg') }}#stroke-ecommerce"></use></svg>
                            <svg class="fill-icon"><use href="{{ asset('assets/svg/icon-sprite.svg') }}#fill-ecommerce"></use></svg>
                            <span>Hoteles</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('admin.hoteles.index') }}">Lista de Hoteles</a></li>
                            <li><a href="{{ route('admin.hoteles.create') }}">Nuevo Hotel</a></li>
                        </ul>
                    </li>

                    <!-- Actividades -->
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title {{ request()->routeIs('admin.actividades.*') ? 'active' : '' }}" href="#">
                            <svg class="stroke-icon"><use href="{{ asset('assets/svg/icon-sprite.svg') }}#stroke-social"></use></svg>
                            <svg class="fill-icon"><use href="{{ asset('assets/svg/icon-sprite.svg') }}#fill-social"></use></svg>
                            <span>Actividades</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('admin.actividades.index') }}">Lista de Actividades</a></li>
                            <li><a href="{{ route('admin.actividades.create') }}">Nueva Actividad</a></li>
                        </ul>
                    </li>

                    <!-- Restaurantes -->
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title {{ request()->routeIs('admin.restaurantes.*') ? 'active' : '' }}" href="#">
                            <svg class="stroke-icon"><use href="{{ asset('assets/svg/icon-sprite.svg') }}#stroke-form"></use></svg>
                            <svg class="fill-icon"><use href="{{ asset('assets/svg/icon-sprite.svg') }}#fill-form"></use></svg>
                            <span>Restaurantes</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('admin.restaurantes.index') }}">Lista de Restaurantes</a></li>
                            <li><a href="{{ route('admin.restaurantes.create') }}">Nuevo Restaurante</a></li>
                        </ul>
                    </li>

                    <!-- Guías -->
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title {{ request()->routeIs('admin.guias.*') ? 'active' : '' }}" href="#">
                            <svg class="stroke-icon"><use href="{{ asset('assets/svg/icon-sprite.svg') }}#stroke-user"></use></svg>
                            <svg class="fill-icon"><use href="{{ asset('assets/svg/icon-sprite.svg') }}#fill-user"></use></svg>
                            <span>Guías</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('admin.guias.index') }}">Lista de Guías</a></li>
                            <li><a href="{{ route('admin.guias.create') }}">Nuevo Guía</a></li>
                        </ul>
                    </li>

                    <!-- Transportistas -->
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title {{ request()->routeIs('admin.transportistas.*') ? 'active' : '' }}" href="#">
                            <svg class="stroke-icon"><use href="{{ asset('assets/svg/icon-sprite.svg') }}#stroke-shopping-bag"></use></svg>
                            <svg class="fill-icon"><use href="{{ asset('assets/svg/icon-sprite.svg') }}#fill-shopping-bag"></use></svg>
                            <span>Transportistas</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('admin.transportistas.index') }}">Lista de Transportistas</a></li>
                            <li><a href="{{ route('admin.transportistas.create') }}">Nuevo Transportista</a></li>
                        </ul>
                    </li>

                    <!-- Atracciones -->
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title {{ request()->routeIs('admin.atracciones.*') ? 'active' : '' }}" href="#">
                            <svg class="stroke-icon"><use href="{{ asset('assets/svg/icon-sprite.svg') }}#stroke-others"></use></svg>
                            <svg class="fill-icon"><use href="{{ asset('assets/svg/icon-sprite.svg') }}#fill-others"></use></svg>
                            <span>Atracciones</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('admin.atracciones.index') }}">Lista de Atracciones</a></li>
                            <li><a href="{{ route('admin.atracciones.create') }}">Nueva Atracción</a></li>
                        </ul>
                    </li>

                    <!-- Mi Perfil -->
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title {{ request()->routeIs('admin.profile.*') ? 'active' : '' }}" href="#">
                            <svg class="stroke-icon"><use href="{{ asset('assets/svg/icon-sprite.svg') }}#stroke-user"></use></svg>
                            <svg class="fill-icon"><use href="{{ asset('assets/svg/icon-sprite.svg') }}#fill-user"></use></svg>
                            <span>Mi Perfil</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('admin.profile.edit') }}">Editar Información</a></li>
                            <li><a href="{{ route('admin.profile.password') }}">Cambiar Contraseña</a></li>
                            <li><a href="{{ route('admin.profile.gallery') }}">Galería de Fotos</a></li>
                        </ul>
                    </li>

                </ul>
            </div>

            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
