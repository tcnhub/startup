@extends('panel.layouts.app')
@php $panelGuard = 'restaurante'; $panelTitle = 'Restaurantes'; @endphp

@section('title', 'Dashboard — Restaurantes')

@section('content')
<div class="row mt-4">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="mb-1">Bienvenido, {{ $user->nombre ?? $user->name ?? '' }} 👋</h4>
                <p class="text-muted mb-0">Panel de Restaurantes</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 mt-3">
        <a href="{{ route('restaurante.posts.index') }}" class="card text-decoration-none shadow-sm h-100">
            <div class="card-body text-center p-4">
                <i class="fa fa-file-text fa-2x text-primary mb-2"></i>
                <h5>Mis Posts</h5>
                <p class="text-muted small mb-0">Gestiona tus artículos</p>
            </div>
        </a>
    </div>
    <div class="col-md-4 mt-3">
        <a href="{{ route('restaurante.profile.edit') }}" class="card text-decoration-none shadow-sm h-100">
            <div class="card-body text-center p-4">
                <i class="fa fa-user fa-2x text-success mb-2"></i>
                <h5>Mi Perfil</h5>
                <p class="text-muted small mb-0">Edita tu información</p>
            </div>
        </a>
    </div>
    <div class="col-md-4 mt-3">
        <a href="{{ route('restaurante.profile.gallery') }}" class="card text-decoration-none shadow-sm h-100">
            <div class="card-body text-center p-4">
                <i class="fa fa-photo fa-2x text-info mb-2"></i>
                <h5>Galería</h5>
                <p class="text-muted small mb-0">Administra tus fotos</p>
            </div>
        </a>
    </div>
</div>
@endsection
