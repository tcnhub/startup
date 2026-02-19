@extends('panel.layouts.app')
@php $panelGuard = 'restaurante'; $panelTitle = 'Restaurantes'; @endphp

@section('title', 'Nuevo Post')

@section('content')
<div class="card mt-4 shadow-sm">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Nuevo Post</h5>
        <a href="{{ route('restaurante.posts.index') }}" class="btn btn-sm btn-outline-secondary">← Volver</a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('restaurante.posts.store') }}">
            @csrf
            @include('panel.posts._form')
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
@endsection
