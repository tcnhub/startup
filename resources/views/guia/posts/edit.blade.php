@extends('panel.layouts.app')
@php $panelGuard = 'guia'; $panelTitle = 'Guías'; @endphp

@section('title', 'Editar Post')

@section('content')
<div class="card mt-4 shadow-sm">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Editar Post</h5>
        <a href="{{ route('guia.posts.index') }}" class="btn btn-sm btn-outline-secondary">← Volver</a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('guia.posts.update', $post) }}">
            @csrf @method('PUT')
            @include('panel.posts._form')
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</div>
@endsection
