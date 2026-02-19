@extends('admin.layouts.app')

@section('title', 'Gestión de Actividades')

@section('content')
<div class="container-fluid">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible mt-3"><button type="button" class="btn-close" data-bs-dismiss="alert"></button>{{ session('success') }}</div>
    @endif

    <div class="card mt-4 shadow-sm">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Actividades</h5>
            <a href="{{ route('admin.actividads.create') }}" class="btn btn-primary btn-sm">+ Nuevo</a>
        </div>
        <div class="card-body">
            <form class="row g-2 mb-3" method="GET">
                <div class="col-sm-8">
                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Buscar por nombre o email..." value="{{ $search }}">
                </div>
                <div class="col-sm-2">
                    <select name="per_page" class="form-select form-select-sm" onchange="this.form.submit()">
                        @foreach([15,25,50] as $n)<option value="{{ $n }}" {{ $perPage==$n?'selected':'' }}>{{ $n }}</option>@endforeach
                    </select>
                </div>
                <div class="col-sm-2"><button class="btn btn-sm btn-secondary w-100">Buscar</button></div>
            </form>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light"><tr>
                        <th>#</th><th>Nombre</th><th>Email</th><th>Teléfono</th><th>Estado</th><th>Acciones</th>
                    </tr></thead>
                    <tbody>
                    @forelse($records as $i => $record)
                        <tr class="{{ $record->trashed() ? 'table-danger' : '' }}">
                            <td class="text-muted small">{{ ($records->currentPage()-1)*$records->perPage()+$i+1 }}</td>
                            <td>{{ $record->nombre ?? $record->name }}</td>
                            <td class="small text-muted">{{ $record->email }}</td>
                            <td class="small">{{ $record->telefono ?? '—' }}</td>
                            <td>
                                @if($record->trashed())
                                    <span class="badge bg-danger">Eliminado</span>
                                @else
                                    <span class="badge bg-success">Activo</span>
                                @endif
                            </td>
                            <td>
                                @if($record->trashed())
                                    <a href="{{ route('admin.actividads.restore', $record->id) }}" class="btn btn-sm btn-outline-success">Restaurar</a>
                                @else
                                    <a href="{{ route('admin.actividads.show', $record) }}" class="btn btn-sm btn-outline-info">Ver</a>
                                    <a href="{{ route('admin.actividads.edit', $record) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                                    <form method="POST" action="{{ route('admin.actividads.destroy', $record) }}" class="d-inline" onsubmit="return confirm('¿Eliminar?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center text-muted py-4">Sin registros.</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            {{ $records->links() }}
        </div>
    </div>
</div>
@endsection
