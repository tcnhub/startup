@extends('admin.layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-xl-8">
        <div class="card">

            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Nuevo Post</h5>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-sm btn-outline-secondary">
                    <i data-feather="arrow-left" style="width:14px;height:14px;"></i> Volver
                </a>
            </div>

            <div class="card-body">

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.posts.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Título <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title"
                               class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title') }}" required>
                        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Slug <span class="text-danger">*</span></label>
                        <input type="text" name="slug" id="slug"
                               class="form-control @error('slug') is-invalid @enderror"
                               value="{{ old('slug') }}" required>
                        @error('slug')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Extracto</label>
                        <textarea name="excerpt" rows="2"
                                  class="form-control @error('excerpt') is-invalid @enderror">{{ old('excerpt') }}</textarea>
                        @error('excerpt')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Contenido <span class="text-danger">*</span></label>
                        <textarea name="content" rows="8"
                                  class="form-control @error('content') is-invalid @enderror" required>{{ old('content') }}</textarea>
                        @error('content')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-sm-6">
                            <label class="form-label">Estado <span class="text-danger">*</span></label>
                            <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                                <option value="draft"     {{ old('status','draft') == 'draft'     ? 'selected' : '' }}>Borrador</option>
                                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Publicado</option>
                                <option value="scheduled" {{ old('status') == 'scheduled' ? 'selected' : '' }}>Programado</option>
                                <option value="archived"  {{ old('status') == 'archived'  ? 'selected' : '' }}>Archivado</option>
                            </select>
                            @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label">Fecha de publicación</label>
                            <input type="datetime-local" name="published_at"
                                   class="form-control @error('published_at') is-invalid @enderror"
                                   value="{{ old('published_at') }}">
                            @error('published_at')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    // Auto-generate slug from title
    document.getElementById('title').addEventListener('input', function () {
        const slug = this.value
            .toLowerCase()
            .trim()
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-');
        document.getElementById('slug').value = slug;
    });
</script>
@endpush
