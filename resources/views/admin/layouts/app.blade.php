<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('admin.partials.head')
</head>

<body>

@include('admin.partials.loader')

<!-- page-wrapper Start-->
<div class="page-wrapper compact-wrapper" id="pageWrapper">

    <!-- Page Header Start-->
    @include('admin.partials.header')
    <!-- Page Header Ends-->

    <!-- Page Body Start-->
    <div class="page-body-wrapper">

        <!-- Page Sidebar Start-->
        @include('admin.partials.sidebar')
        <!-- Page Sidebar Ends-->

        <div class="page-body">

            @include('admin.partials.breadcrumb')

            <!-- Container-fluid starts-->
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- Container-fluid Ends-->

        </div>

        <!-- footer start-->
        @include('admin.partials.footer')
        <!-- footer Ends-->

    </div>
</div>

@include('admin.partials.scripts')

</body>
</html>
