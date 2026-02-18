<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')
</head>

<body>

@include('partials.loader')

<!-- page-wrapper Start-->
<div class="page-wrapper compact-wrapper" id="pageWrapper">

    <!-- Page Header Start-->
    @include('partials.header')
    <!-- Page Header Ends-->

    <!-- Page Body Start-->
    <div class="page-body-wrapper">

        <!-- Page Sidebar Start-->
        @include('partials.sidebar')
        <!-- Page Sidebar Ends-->

        <div class="page-body">

            @include('partials.breadcrumb')

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- Container-fluid Ends-->

        </div>

        <!-- footer start-->
        @include('partials.footer')
        <!-- footer Ends-->

    </div>
</div>

@include('partials.scripts')

</body>
</html>
