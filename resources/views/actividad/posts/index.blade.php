@extends('panel.layouts.app')
@php $panelGuard = 'actividad'; $panelTitle = 'Actividades'; @endphp

@section('title', 'Mis Posts')

@section('content')
<div class="card mt-4 shadow-sm">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Mis Posts</h5>
        <a href="{{ route('actividad.posts.create') }}" class="btn btn-primary btn-sm">+ Nuevo Post</a>
    </div>
    <div class="card-body">
        <form class="row g-2 mb-3" method="GET">
            <div class="col-sm-8">
                <input type="text" name="search" class="form-control form-control-sm" placeholder="Buscar..." value="{{ $search }}">
            </div>
            <div class="col-sm-2">
                <select name="per_page" class="form-select form-select-sm" onchange="this.form.submit()">
                    @foreach([10,25,50] as $n)
                        <option value="{{ $n }}" {{ $perPage==$n?'selected':'' }}>{{ $n }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-2"><button class="btn btn-sm btn-secondary w-100">Buscar</button></div>
        </form>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light"><tr>
                    <th>#</th><th>Título</th><th>Estado</th><th>Fecha</th><th>Acciones</th>
                </tr></thead>
                <tbody>
                @forelse($posts as $i => $post)
                    <tr>
                        <td class="text-muted small">{{ ($posts->currentPage()-1)*$posts->perPage()+$i+1 }}</td>
                        <td>{{ $post->title }}</td>
                        <td><span class="badge bg-{{ ['published'=>'success','draft'=>'secondary','scheduled'=>'info','archived'=>'warning'][$post->status]??'light' }}">{{ ucfirst($post->status) }}</span></td>
                        <td class="small text-muted">{{ $post->published_at?->format('d/m/Y') ?? '—' }}</td>
                        <td>
                            <a href="{{ route('actividad.posts.show', $post) }}" class="btn btn-xs btn-outline-info btn-sm">Ver</a>
                            <a href="{{ route('actividad.posts.edit', $post) }}" class="btn btn-xs btn-outline-primary btn-sm">Editar</a>
                            <form method="POST" action="{{ route('actividad.posts.destroy', $post) }}" class="d-inline" onsubmit="return confirm('¿Eliminar?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-xs btn-outline-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-muted py-3">No hay posts.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
        {{ $posts->links() }}
    </div>
</div>
@endsection
