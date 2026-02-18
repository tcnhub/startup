<div class="page-header">
    <div class="header-wrapper row m-0">
        <form class="form-inline search-full col" action="#" method="get">
            <div class="form-group w-100">
                <div class="Typeahead Typeahead--twitterUsers">
                    <div class="u-posRelative">
                        <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search .." name="q" title="" autofocus>
                        <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div>
                        <i class="close-search" data-feather="x"></i>
                    </div>
                    <div class="Typeahead-menu"></div>
                </div>
            </div>
        </form>

        <div class="header-logo-wrapper col-auto p-0">
            <div class="logo-wrapper">
                <a href="{{ route('home') ?? '/' }}">
                    <img class="img-fluid" src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo">
                </a>
            </div>
            <div class="toggle-sidebar">
                <i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i>
            </div>
        </div>

        <div class="left-header col-xxl-5 col-xl-6 col-lg-5 col-md-4 col-sm-3 p-0">
            <div class="notification-slider">
                <div class="d-flex h-100">
                    <img src="{{ asset('assets/images/giftools.gif') }}" alt="gif">
                    <h6 class="mb-0 f-w-400">
                        <span class="font-primary">Don't Miss Out! </span>
                        <span class="f-light">Our new update has been released.</span>
                    </h6>
                    <i class="icon-arrow-top-right f-light"></i>
                </div>
                <div class="d-flex h-100">
                    <img src="{{ asset('assets/images/giftools.gif') }}" alt="gif">
                    <h6 class="mb-0 f-w-400">
                        <span class="f-light">Something you love is now on sale! </span>
                    </h6>
                    <a class="ms-1" href="https://1.envato.market/3GVzd" target="_blank">Buy now !</a>
                </div>
            </div>
        </div>

        <div class="nav-right col-xxl-7 col-xl-6 col-md-7 col-8 pull-right right-header p-0 ms-auto">
            <ul class="nav-menus">
                <li class="language-nav">
                    <div class="translate_wrapper">
                        <div class="current_lang">
                            <div class="lang">
                                <i class="flag-icon flag-icon-us"></i>
                                <span class="lang-txt">EN</span>
                            </div>
                        </div>
                        <div class="more_lang">
                            <div class="lang selected" data-value="en">
                                <i class="flag-icon flag-icon-us"></i>
                                <span class="lang-txt">English <span>(US)</span></span>
                            </div>
                            <div class="lang" data-value="es">
                                <i class="flag-icon flag-icon-es"></i>
                                <span class="lang-txt">Español</span>
                            </div>
                            <!-- puedes mantener o quitar los demás idiomas -->
                        </div>
                    </div>
                </li>

                <li>
                    <span class="header-search">
                        <svg>
                            <use href="{{ asset('assets/svg/icon-sprite.svg') }}#search"></use>
                        </svg>
                    </span>
                </li>

                <li class="onhover-dropdown">
                    <svg>
                        <use href="{{ asset('assets/svg/icon-sprite.svg') }}#star"></use>
                    </svg>
                    <div class="onhover-show-div bookmark-flip">
                        <!-- ... el contenido del bookmark se mantiene igual ... -->
                    </div>
                </li>

                <li>
                    <div class="mode">
                        <svg>
                            <use href="{{ asset('assets/svg/icon-sprite.svg') }}#moon"></use>
                        </svg>
                    </div>
                </li>

                <li class="cart-nav onhover-dropdown">
                    <div class="cart-box">
                        <svg>
                            <use href="{{ asset('assets/svg/icon-sprite.svg') }}#stroke-ecommerce"></use>
                        </svg>
                        <span class="badge rounded-pill badge-success">2</span>
                    </div>
                    <div class="cart-dropdown onhover-show-div">
                        <h6 class="f-18 mb-0 dropdown-title">Cart</h6>
                        <ul>
                            <li>
                                <div class="media">
                                    <img class="img-fluid b-r-5 me-3 img-60" src="{{ asset('assets/images/other-images/cart-img.jpg') }}" alt="">
                                    <!-- resto del item del carrito -->
                                </div>
                            </li>
                            <!-- puedes duplicar el li para más items -->
                            <li class="total">
                                <h6 class="mb-0">Order Total : <span class="f-right">$1000.00</span></h6>
                            </li>
                            <li class="text-center">
                                <a class="d-block mb-3 view-cart f-w-700" href="#">Go to your cart</a>
                                <a class="btn btn-primary view-checkout" href="#">Checkout</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="onhover-dropdown">
                    <div class="notification-box">
                        <svg>
                            <use href="{{ asset('assets/svg/icon-sprite.svg') }}#notification"></use>
                        </svg>
                        <span class="badge rounded-pill badge-secondary">4</span>
                    </div>
                    <div class="onhover-show-div notification-dropdown">
                        <!-- contenido de notificaciones igual -->
                    </div>
                </li>

                <li class="profile-nav onhover-dropdown pe-0 py-0">
                    <div class="media profile-media">
                        <img class="b-r-10" src="{{ asset('assets/images/dashboard/profile.png') }}" alt="">
                        <div class="media-body">
                            <span>Emay Walter</span>
                            <p class="mb-0 font-roboto">Admin <i class="middle fa fa-angle-down"></i></p>
                        </div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div">
                        <!-- items del perfil igual -->
                    </ul>
                </li>
            </ul>
        </div>

        <!-- Mantienes los scripts de Typeahead / Handlebars tal cual -->
        <script class="result-template" type="text/x-handlebars-template">
            <!-- ... igual ... -->
        </script>
        <script class="empty-template" type="text/x-handlebars-template">
            <!-- ... igual ... -->
        </script>
    </div>
</div>
