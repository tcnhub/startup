<div class="mb-3">
    <label class="form-label fw-semibold">Nombre *</label>
    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
           value="{{ old('nombre', $record->nombre ?? '') }}" required>
    @error('nombre')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Email *</label>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
               value="{{ old('email', $record->email ?? '') }}" required>
        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Teléfono</label>
        <input type="text" name="telefono" class="form-control"
               value="{{ old('telefono', $record->telefono ?? '') }}">
    </div>
</div>
<div class="mb-3">
    <label class="form-label">Foto de perfil</label>
    @if(!empty($record) && $record->profile_photo)
        <div class="mb-2">
            <img src="{{ Storage::disk('public')->url($record->profile_photo) }}" alt="Foto" class="rounded" style="max-height:100px;">
        </div>
    @endif
    <input type="file" name="profile_photo" class="form-control" accept="image/*">
</div>
