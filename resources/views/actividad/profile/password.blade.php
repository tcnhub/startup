@extends('panel.layouts.app')
@php $panelGuard = 'actividad'; $panelTitle = 'Actividades'; @endphp

@section('title', 'Cambiar Contraseña')

@section('content')
<div class="row mt-4 justify-content-center">
    <div class="col-lg-6">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Cambiar Contraseña</h5>
                <a href="{{ route('actividad.profile.edit') }}" class="btn btn-sm btn-outline-secondary">← Volver</a>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('actividad.profile.password.update') }}">
                    @csrf @method('PUT')
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Contraseña actual</label>
                        <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" required>
                        @error('current_password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nueva contraseña</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                        @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Confirmar contraseña</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-warning">Actualizar contraseña</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
