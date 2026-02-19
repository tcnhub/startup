@extends('admin.layouts.app')

@section('title', 'Mi Perfil — Admin')

@section('content')
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header"><h5 class="mb-0">Editar Perfil de Administrador</h5></div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
                    @endif
                    <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                        @csrf @method('PUT')
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nombre *</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email *</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Foto de perfil</label>
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
                    <a href="{{ route('admin.profile.password') }}" class="btn btn-outline-warning btn-sm w-100 mb-2">Cambiar contraseña</a>
                    <a href="{{ route('admin.profile.gallery') }}" class="btn btn-outline-info btn-sm w-100">Galería de fotos</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
