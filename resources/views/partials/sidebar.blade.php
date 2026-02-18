<div class="sidebar-wrapper" sidebar-layout="stroke-svg">
    <div>
        <div class="logo-wrapper">
            <a href="{{ route('home') ?? '/' }}">
                <img class="img-fluid for-light" src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo Claro">
                <img class="img-fluid for-dark" src="{{ asset('assets/images/logo/logo_dark.png') }}" alt="Logo Oscuro">
            </a>
            <div class="back-btn">
                <i class="fa fa-angle-left"></i>
            </div>
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
            <div class="left-arrow" id="left-arrow">
                <i data-feather="arrow-left"></i>
            </div>

            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">

                    <li class="back-btn">
                        <div class="mobile-back text-end">
                            <span>Back</span>
                            <i class="fa fa-angle-right ps-2" aria-hidden="true"></i>
                        </div>
                    </li>

                    <!-- Dashboard -->
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') ?? '/' }}">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg') }}#fill-home"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg') }}#fill-home"></use>
                            </svg>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <!-- Menú de ejemplo: Categorías / Productos (adaptado al tema Alimentos y Bebidas) -->
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title {{ request()->routeIs('productos.*') ? 'active' : '' }}" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg') }}#stroke-ecommerce"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg') }}#fill-ecommerce"></use>
                            </svg>
                            <span>Articulos</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="#">Lista de Productos</a></li>
                            <li><a href="#">Nuevo Producto</a></li>
                            <li><a href="">Categorías</a></li>
                            <li><a href="">Marcas</a></li>
                        </ul>
                    </li>

                    <!-- Otro ejemplo: Pedidos -->
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title {{ request()->routeIs('pedidos.*') ? 'active' : '' }}" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg') }}#stroke-shopping-bag"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg') }}#fill-shopping-bag"></use>
                            </svg>
                            <span>Pedidos</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="#">Lista de Productos</a></li>
                            <li><a href="#">Nuevo Producto</a></li>
                            <li><a href="">Categorías</a></li>
                            <li><a href="">Marcas</a></li>
                        </ul>
                    </li>

                    <!-- Animaciones (si las mantienes en el proyecto) -->
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="#">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg') }}#stroke-animation"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg') }}#fill-animation"></use>
                            </svg>
                            <span>Animaciones</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="#">Lista de Productos</a></li>
                            <li><a href="#">Nuevo Producto</a></li>
                            <li><a href="">Categorías</a></li>
                            <li><a href="">Marcas</a></li>
                        </ul>
                    </li>

                    <!-- Soporte y Documentación (enlaces externos) -->
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="https://pixelstrap.freshdesk.com/support/home" target="_blank">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg') }}#stroke-social"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg') }}#fill-social"></use>
                            </svg>
                            <span>Raise Support</span>
                        </a>
                    </li>

                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="https://docs.pixelstrap.com/cuba/laravel/document/" target="_blank">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg') }}#stroke-form"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg') }}#fill-form"></use>
                            </svg>
                            <span>Documentación</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="right-arrow" id="right-arrow">
                <i data-feather="arrow-right"></i>
            </div>
        </nav>
    </div>
</div>
