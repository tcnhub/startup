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


                    @extends('layouts.app')

                    @section('content')
                        <h1>{{ $post->title }}</h1>
                        <p><strong>Slug:</strong> {{ $post->slug }}</p>
                        <p><strong>Contenido:</strong> {!! nl2br(e($post->content)) !!}</p>
                        <p><strong>Resumen:</strong> {{ $post->excerpt }}</p>
                        <p><strong>Estado:</strong> {{ $post->status }}</p>
                        <p><strong>Publicado el:</strong> {{ $post->published_at ? $post->published_at->format('d/m/Y') : 'N/A' }}</p>
                        <p><strong>Autor:</strong> {{ $post->user->name }}</p>
                        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Volver</a>
                    @endsection




                </div>
            </div>
        </div>



        <!-- Continúa con las demás secciones: How to use starter kit, Simple Card, With Header, etc. -->

        <!-- Para no hacer el mensaje eterno, dejo solo la estructura principal.
             Copia y pega el resto del contenido HTML dentro de las tarjetas siguiendo el mismo patrón -->

    </div>

@endsection
