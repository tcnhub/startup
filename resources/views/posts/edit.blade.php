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


                    @extends('layouts.app')

                    @section('content')
                        <h1>Editar Post</h1>
                        <form action="{{ route('posts.update', $post) }}" method="POST">
                            @csrf @method('PUT')
                            <div class="form-group">
                                <label>Título</label>
                                <input type="text" name="title" class="form-control" value="{{ $post->title }}" required>
                            </div>
                            <div class="form-group">
                                <label>Contenido</label>
                                <textarea name="content" class="form-control" required>{{ $post->content }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Resumen</label>
                                <textarea name="excerpt" class="form-control">{{ $post->excerpt }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Estado</label>
                                <select name="status" class="form-control">
                                    <option value="draft" {{ $post->status == 'draft' ? 'selected' : '' }}>Borrador</option>
                                    <option value="published" {{ $post->status == 'published' ? 'selected' : '' }}>Publicado</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Fecha de Publicación</label>
                                <input type="date" name="published_at" class="form-control" value="{{ $post->published_at ? $post->published_at->format('Y-m-d') : '' }}">
                            </div>
                            <button type="submit" class="btn btn-success">Actualizar</button>
                        </form>
                    @endsection



                </div>
            </div>
        </div>



        <!-- Continúa con las demás secciones: How to use starter kit, Simple Card, With Header, etc. -->

        <!-- Para no hacer el mensaje eterno, dejo solo la estructura principal.
             Copia y pega el resto del contenido HTML dentro de las tarjetas siguiendo el mismo patrón -->

    </div>

@endsection
