@extends('admin.layouts.app')

@section('title', 'Transportista — Detalle')

@section('content')
<div class="container-fluid mt-4">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">{{ $record->nombre ?? $record->name }}</h5>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.transportistas.edit', $record) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                <a href="{{ route('admin.transportistas.index') }}" class="btn btn-sm btn-outline-secondary">← Volver</a>
            </div>
        </div>
        <div class="card-body">
            @if($record->profile_photo)
                <img src="{{ Storage::disk('public')->url($record->profile_photo) }}" alt="Foto" class="rounded mb-3" style="max-height:180px;">
            @endif
            <dl class="row">
                <dt class="col-sm-3">Email</dt><dd class="col-sm-9">{{ $record->email }}</dd>
                <dt class="col-sm-3">Teléfono</dt><dd class="col-sm-9">{{ $record->telefono ?? '—' }}</dd>
                <dt class="col-sm-3">Registro</dt><dd class="col-sm-9">{{ $record->created_at->format('d/m/Y') }}</dd>
            </dl>
            @if($record->photos->count())
                <h6 class="mt-3">Galería</h6>
                <div class="row g-2">
                    @foreach($record->photos as $photo)
                        <div class="col-sm-3">
                            <img src="{{ $photo->url }}" class="img-fluid rounded" alt="{{ $photo->alt_text }}">
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
