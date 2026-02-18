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



                    @extends('layouts.app')  <!-- Asumiendo un layout principal -->

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
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->slug }}</td>
                                <td>{{ $post->status }}</td>
                                <td>
                                    <a href="{{ route('posts.show', $post) }}" class="btn btn-info">Ver</a>
                                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Editar</a>
                                    <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $posts->links() }}




                </div>
            </div>
        </div>



        <!-- Continúa con las demás secciones: How to use starter kit, Simple Card, With Header, etc. -->

        <!-- Para no hacer el mensaje eterno, dejo solo la estructura principal.
             Copia y pega el resto del contenido HTML dentro de las tarjetas siguiendo el mismo patrón -->

    </div>

@endsection
