@extends('admin.layouts.app')

@section('content')

    <div class="row starter-main">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Kick start your project development !</h5>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="fa fa-spin fa-cog"></i></li>
                            <li><i class="view-html fa fa-code"></i></li>
                            <li><i class="icofont icofont-maximize full-card"></i></li>
                            <li><i class="icofont icofont-minus minimize-card"></i></li>
                            <li><i class="icofont icofont-refresh reload-card"></i></li>
                            <li><i class="icofont icofont-error close-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">


                    <div class="header">
                        <h1>Dashboard Admin</h1>
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <button class="btn-logout" type="submit">Cerrar Sesión</button>
                        </form>
                    </div>
                    <p>Bienvenido, {{ Auth::guard('admin')->user()->name }}!</p>




                </div>
            </div>
        </div>

        <!-- Aquí van las demás tarjetas (las copio de forma similar) -->

        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>What is starter kit ?</h5>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="fa fa-spin fa-cog"></i></li>
                            <li><i class="view-html fa fa-code"></i></li>
                            <li><i class="icofont icofont-maximize full-card"></i></li>
                            <li><i class="icofont icofont-minus minimize-card"></i></li>
                            <li><i class="icofont icofont-refresh reload-card"></i></li>
                            <li><i class="icofont icofont-error close-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <!-- ... contenido similar al original ... -->
                </div>
            </div>
        </div>

        <!-- Continúa con las demás secciones: How to use starter kit, Simple Card, With Header, etc. -->

        <!-- Para no hacer el mensaje eterno, dejo solo la estructura principal.
             Copia y pega el resto del contenido HTML dentro de las tarjetas siguiendo el mismo patrón -->

    </div>

@endsection
