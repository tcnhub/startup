@extends('panel.layouts.app')
@php $panelGuard = 'transportista'; $panelTitle = 'Transportistas'; @endphp

@section('title', $post->title)

@section('content')
<div class="card mt-4 shadow-sm">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">{{ $post->title }}</h5>
        <div class="d-flex gap-2">
            <a href="{{ route('transportista.posts.edit', $post) }}" class="btn btn-sm btn-outline-primary">Editar</a>
            <a href="{{ route('transportista.posts.index') }}" class="btn btn-sm btn-outline-secondary">← Volver</a>
        </div>
    </div>
    <div class="card-body">
        <dl class="row">
            <dt class="col-sm-3">Estado</dt>
            <dd class="col-sm-9"><span class="badge bg-success">{{ ucfirst($post->status) }}</span></dd>
            <dt class="col-sm-3">Slug</dt>
            <dd class="col-sm-9 text-muted">{{ $post->slug }}</dd>
            <dt class="col-sm-3">Publicado</dt>
            <dd class="col-sm-9">{{ $post->published_at?->format('d/m/Y H:i') ?? '—' }}</dd>
            @if($post->excerpt)
            <dt class="col-sm-3">Extracto</dt>
            <dd class="col-sm-9">{{ $post->excerpt }}</dd>
            @endif
        </dl>
        <hr>
        <div class="post-content">{!! nl2br(e($post->content)) !!}</div>
    </div>
</div>
@endsection
