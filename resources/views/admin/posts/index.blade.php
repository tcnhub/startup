@extends('admin.layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">

            {{-- Header --}}
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Posts</h5>
                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary btn-sm">
                    <i data-feather="plus" style="width:16px;height:16px;"></i> Nuevo Post
                </a>
            </div>

            <div class="card-body">

                {{-- Alerts --}}
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                {{-- Filters --}}
                <form method="GET" action="{{ route('admin.posts.index') }}" class="row g-2 mb-3">
                    <div class="col-sm-6 col-md-5">
                        <input
                            type="text"
                            name="search"
                            value="{{ $search }}"
                            class="form-control form-control-sm"
                            placeholder="Buscar por título o slug…"
                        >
                    </div>
                    <div class="col-auto">
                        <select name="per_page" class="form-select form-select-sm" onchange="this.form.submit()">
                            @foreach([10, 25, 50, 100] as $n)
                                <option value="{{ $n }}" {{ $perPage == $n ? 'selected' : '' }}>{{ $n }} por página</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-sm btn-secondary">Buscar</button>
                        <a href="{{ route('admin.posts.index') }}" class="btn btn-sm btn-outline-secondary">Limpiar</a>
                    </div>
                </form>

                {{-- Table --}}
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width:60px">#</th>
                                <th>Título</th>
                                <th>Slug</th>
                                <th style="width:130px">Estado</th>
                                <th style="width:160px">Publicado</th>
                                <th style="width:150px" class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($posts as $i => $post)
                                <tr>
                                    <td class="text-muted small">
                                        {{ ($posts->currentPage() - 1) * $posts->perPage() + $i + 1 }}
                                    </td>
                                    <td>{{ $post->title }}</td>
                                    <td class="text-muted small">{{ $post->slug }}</td>
                                    <td>
                                        @php
                                            $badges = [
                                                'published' => 'success',
                                                'draft'     => 'secondary',
                                                'scheduled' => 'info',
                                                'archived'  => 'warning',
                                            ];
                                            $color = $badges[$post->status] ?? 'light';
                                        @endphp
                                        <span class="badge bg-{{ $color }}">{{ ucfirst($post->status) }}</span>
                                    </td>
                                    <td class="small">
                                        {{ $post->published_at ? $post->published_at->format('d/m/Y H:i') : '—' }}
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.posts.show', $post) }}"
                                           class="btn btn-sm btn-outline-info" title="Ver">
                                            <i data-feather="eye" style="width:14px;height:14px;"></i>
                                        </a>
                                        <a href="{{ route('admin.posts.edit', $post) }}"
                                           class="btn btn-sm btn-outline-primary" title="Editar">
                                            <i data-feather="edit-2" style="width:14px;height:14px;"></i>
                                        </a>
                                        <form method="POST"
                                              action="{{ route('admin.posts.destroy', $post) }}"
                                              class="d-inline"
                                              onsubmit="return confirm('¿Eliminar este post?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Eliminar">
                                                <i data-feather="trash-2" style="width:14px;height:14px;"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">
                                        No se encontraron posts.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Footer: count + pagination --}}
                <div class="d-flex align-items-center justify-content-between mt-3 flex-wrap gap-2">
                    <small class="text-muted">
                        Mostrando {{ $posts->firstItem() ?? 0 }}–{{ $posts->lastItem() ?? 0 }}
                        de {{ $posts->total() }} posts
                    </small>
                    <div>
                        {{ $posts->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
