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



                    @extends('admin.layouts.app')  <!-- Asumiendo un layout principal -->

                    @section('content')
                        <h1>Posts</h1>
                        <a href="{{ route('posts.create') }}" class="btn btn-primary">Nuevo Post</a>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Título</th>
                                <th>Slug</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->id ?? 'SIN ID' }}</td>
                                    <td>{{ $post->title ?? 'Sin título' }}</td>
                                    <td>
                                        <!-- Depuración rápida -->
                                        {{ dd($post) }}  <!-- o -->
                                        <!-- {{ get_class($post) }} → {{ $post?->id }} -->

                                        <a href="{{ route('posts.show', $post) }}" class="btn btn-info">Ver</a>
                                        ...
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $posts->links() }}
                    @endsection





                </div>
            </div>
        </div>

        <!-- Aquí van las demás tarjetas (las copio de forma similar) -->


        <!-- Continúa con las demás secciones: How to use starter kit, Simple Card, With Header, etc. -->

        <!-- Para no hacer el mensaje eterno, dejo solo la estructura principal.
             Copia y pega el resto del contenido HTML dentro de las tarjetas siguiendo el mismo patrón -->

    </div>

@endsection
