@extends('admin.layouts.app')

@section('title', 'Editar Guía')

@section('content')
<div class="container-fluid mt-4">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Editar Guía</h5>
            <a href="{{ route('admin.guias.index') }}" class="btn btn-sm btn-outline-secondary">← Volver</a>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
            @endif
            <form method="POST" action="{{ route('admin.guias.update', $record) }}" enctype="multipart/form-data">
                @csrf @method('PUT')
                @include('admin.guias._form')
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </form>
        </div>
    </div>
</div>
@endsection
