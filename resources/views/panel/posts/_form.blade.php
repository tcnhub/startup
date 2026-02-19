<div class="mb-3">
    <label class="form-label fw-semibold">Título *</label>
    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
           value="{{ old('title', $post->title ?? '') }}" required>
    @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Slug *</label>
    <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror"
           value="{{ old('slug', $post->slug ?? '') }}" required>
    @error('slug')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Extracto</label>
    <textarea name="excerpt" rows="3" class="form-control @error('excerpt') is-invalid @enderror">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
    @error('excerpt')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label class="form-label fw-semibold">Contenido *</label>
    <textarea name="content" rows="10" class="form-control @error('content') is-invalid @enderror" required>{{ old('content', $post->content ?? '') }}</textarea>
    @error('content')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Estado *</label>
        <select name="status" class="form-select @error('status') is-invalid @enderror" required>
            @foreach(['draft' => 'Borrador', 'published' => 'Publicado', 'scheduled' => 'Programado', 'archived' => 'Archivado'] as $val => $label)
                <option value="{{ $val }}" {{ old('status', $post->status ?? 'draft') === $val ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
        @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Fecha publicación</label>
        <input type="datetime-local" name="published_at" class="form-control @error('published_at') is-invalid @enderror"
               value="{{ old('published_at', isset($post->published_at) ? $post->published_at?->format('Y-m-d\TH:i') : '') }}">
        @error('published_at')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
</div>

<script>
document.getElementById('title')?.addEventListener('input', function () {
    if (!document.getElementById('slug').dataset.manual) {
        document.getElementById('slug').value = this.value
            .toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '')
            .replace(/[^a-z0-9\s-]/g, '').trim().replace(/\s+/g, '-');
    }
});
document.getElementById('slug')?.addEventListener('input', function () {
    this.dataset.manual = 'true';
});
</script>
