@extends('panel.layouts.app')
@php $panelGuard = 'transportista'; $panelTitle = 'Transportistas'; @endphp

@section('title', 'Galería de Fotos')

@section('content')
<div class="row mt-4">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Galería de Fotos</h5>
                <a href="{{ route('transportista.profile.edit') }}" class="btn btn-sm btn-outline-secondary">← Perfil</a>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    @forelse($photos as $photo)
                        <div class="col-sm-6 col-md-4">
                            <div class="card h-100">
                                <img src="{{ $photo->url }}" class="card-img-top" alt="{{ $photo->alt_text }}" style="height:180px;object-fit:cover;">
                                <div class="card-body p-2 text-center">
                                    <form method="POST" action="{{ route('transportista.profile.gallery.delete', $photo) }}" onsubmit="return confirm('¿Eliminar foto?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted">No hay fotos en la galería.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 mt-3 mt-lg-0">
        <div class="card shadow-sm">
            <div class="card-header"><h6 class="mb-0">Agregar Foto</h6></div>
            <div class="card-body">
                <form method="POST" action="{{ route('transportista.profile.gallery.upload') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Foto (máx 4MB)</label>
                        <input type="file" name="photo" class="form-control" accept="image/*" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Texto alternativo</label>
                        <input type="text" name="alt_text" class="form-control" placeholder="Descripción de la foto">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Subir foto</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
