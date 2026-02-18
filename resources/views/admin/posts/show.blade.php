@extends('admin.layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-xl-8">
        <div class="card">

            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">{{ $post->title }}</h5>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-sm btn-primary">
                        <i data-feather="edit-2" style="width:14px;height:14px;"></i> Editar
                    </a>
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-sm btn-outline-secondary">
                        <i data-feather="arrow-left" style="width:14px;height:14px;"></i> Volver
                    </a>
                </div>
            </div>

            <div class="card-body">

                <dl class="row mb-0">
                    <dt class="col-sm-3">Slug</dt>
                    <dd class="col-sm-9 text-muted">{{ $post->slug }}</dd>

                    <dt class="col-sm-3">Estado</dt>
                    <dd class="col-sm-9">
                        @php
                            $badges = [
                                'published' => 'success',
                                'draft'     => 'secondary',
                                'scheduled' => 'info',
                                'archived'  => 'warning',
                            ];
                        @endphp
                        <span class="badge bg-{{ $badges[$post->status] ?? 'light' }}">
                            {{ ucfirst($post->status) }}
                        </span>
                    </dd>

                    <dt class="col-sm-3">Publicado</dt>
                    <dd class="col-sm-9">
                        {{ $post->published_at ? $post->published_at->format('d/m/Y H:i') : '—' }}
                    </dd>

                    <dt class="col-sm-3">Creado</dt>
                    <dd class="col-sm-9">{{ $post->created_at->format('d/m/Y H:i') }}</dd>

                    <dt class="col-sm-3">Actualizado</dt>
                    <dd class="col-sm-9">{{ $post->updated_at->format('d/m/Y H:i') }}</dd>

                    @if($post->excerpt)
                        <dt class="col-sm-3">Extracto</dt>
                        <dd class="col-sm-9">{{ $post->excerpt }}</dd>
                    @endif
                </dl>

                <hr>

                <div>
                    {!! nl2br(e($post->content)) !!}
                </div>

            </div>

            <div class="card-footer d-flex justify-content-end gap-2">
                <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-primary btn-sm">Editar</a>
                <form method="POST" action="{{ route('admin.posts.destroy', $post) }}"
                      onsubmit="return confirm('¿Eliminar este post?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection
