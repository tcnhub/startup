@extends('admin.layouts.app')

@section('title', 'Nuevo Transportista')

@section('content')
<div class="container-fluid mt-4">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Nuevo Transportista</h5>
            <a href="{{ route('admin.transportistas.index') }}" class="btn btn-sm btn-outline-secondary">← Volver</a>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
            @endif
            <form method="POST" action="{{ route('admin.transportistas.store') }}" enctype="multipart/form-data">
                @csrf
                @include('admin.transportistas._form')
                <div class="mb-3">
                    <label class="form-label fw-semibold">Contraseña *</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                    @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Confirmar contraseña *</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Crear Transportista</button>
            </form>
        </div>
    </div>
</div>
@endsection
