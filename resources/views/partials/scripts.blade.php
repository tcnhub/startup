<!-- jQuery (usando CDN confiable y actualizado - puedes cambiar la versión si lo necesitas) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- Bootstrap 5 bundle (js + popper) -->
<script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>

<!-- Feather Icons -->
<script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js') }}"></script>

<!-- Simplebar (scrollbar personalizado) -->
<script src="{{ asset('assets/js/scrollbar/simplebar.js') }}"></script>
<script src="{{ asset('assets/js/scrollbar/custom.js') }}"></script>

<!-- Configuración general del template -->
<script src="{{ asset('assets/js/config.js') }}"></script>

<!-- Plugins -->
<script src="{{ asset('assets/js/chart/apex-chart/apex-chart.js') }}"></script>
<script src="{{ asset('assets/js/chart/apex-chart/stock-prices.js') }}"></script>

<script id="menu" src="{{ asset('assets/js/sidebar-menu.js') }}"></script>

<script src="{{ asset('assets/js/slick/slick.min.js') }}"></script>
<script src="{{ asset('assets/js/slick/slick.js') }}"></script>
<script src="{{ asset('assets/js/header-slick.js') }}"></script>

<script src="{{ asset('assets/js/tooltip-init.js') }}"></script>

<!-- Theme principal y customizador -->
<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="{{ asset('assets/js/theme-customizer/customizer.js') }}"></script>

<!-- Opcional: stack para scripts específicos de cada página -->
@stack('scripts')
