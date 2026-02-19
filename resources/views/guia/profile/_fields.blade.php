<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Nombre *</label>
        <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $user->nombre) }}" required>
        @error('nombre')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Apellido *</label>
        <input type="text" name="apellido" class="form-control @error('apellido') is-invalid @enderror" value="{{ old('apellido', $user->apellido) }}" required>
        @error('apellido')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Email *</label>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Teléfono</label>
        <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $user->telefono) }}">
    </div>
</div>
<div class="mb-3">
    <label class="form-label fw-semibold">Descripción / Bio</label>
    <textarea name="descripcion" rows="3" class="form-control">{{ old('descripcion', $user->descripcion) }}</textarea>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">N° Licencia</label>
        <input type="text" name="numero_licencia" class="form-control" value="{{ old('numero_licencia', $user->numero_licencia) }}">
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label fw-semibold">Años experiencia</label>
        <input type="number" name="experiencia_anios" class="form-control" min="0" max="60" value="{{ old('experiencia_anios', $user->experiencia_anios) }}">
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label fw-semibold">Disponible</label>
        <div class="form-check mt-2">
            <input class="form-check-input" type="checkbox" name="disponible" id="disponible" value="1" {{ old('disponible', $user->disponible) ? 'checked' : '' }}>
            <label class="form-check-label" for="disponible">Sí, disponible</label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Precio por día ($)</label>
        <input type="number" name="precio_por_dia" class="form-control" step="0.01" min="0" value="{{ old('precio_por_dia', $user->precio_por_dia) }}">
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Precio por hora ($)</label>
        <input type="number" name="precio_por_hora" class="form-control" step="0.01" min="0" value="{{ old('precio_por_hora', $user->precio_por_hora) }}">
    </div>
</div>
<div class="mb-3">
    <label class="form-label fw-semibold">Especialidades (separadas por coma)</label>
    <input type="text" name="especialidades_raw" class="form-control" placeholder="Historia, Naturaleza, Aventura" value="{{ old('especialidades_raw', is_array($user->especialidades) ? implode(', ', $user->especialidades) : '') }}">
</div>
<div class="mb-3">
    <label class="form-label fw-semibold">Idiomas (separados por coma)</label>
    <input type="text" name="idiomas_raw" class="form-control" placeholder="Español, Inglés, Francés" value="{{ old('idiomas_raw', is_array($user->idiomas) ? implode(', ', $user->idiomas) : '') }}">
</div>
