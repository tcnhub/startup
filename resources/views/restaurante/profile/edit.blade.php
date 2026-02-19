@extends('panel.layouts.app')
@php $panelGuard = 'restaurante'; $panelTitle = 'Restaurantes'; @endphp

@section('title', 'Mi Perfil')

@section('content')
<div class="row mt-4">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header"><h5 class="mb-0">Editar Información</h5></div>
            <div class="card-body">
                <form method="POST" action="{{ route('restaurante.profile.update') }}" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    @include('restaurante.profile._fields')
                    <div class="mb-3">
                        <label class="form-label">Foto principal</label>
                        @if($user->profile_photo)
                            <div class="mb-2">
                                <img src="{{ Storage::disk('public')->url($user->profile_photo) }}" alt="Foto" class="rounded" style="max-height:120px;">
                            </div>
                        @endif
                        <input type="file" name="profile_photo" class="form-control" accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4 mt-3 mt-lg-0">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>Acciones rápidas</h6>
                <a href="{{ route('restaurante.profile.password') }}" class="btn btn-outline-warning btn-sm w-100 mb-2">Cambiar contraseña</a>
                <a href="{{ route('restaurante.profile.gallery') }}" class="btn btn-outline-info btn-sm w-100">Galería de fotos</a>
            </div>
        </div>
    </div>
</div>
@endsection
