<div class="mb-3">
    <label class="form-label fw-semibold">Nombre *</label>
    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $user->nombre) }}" required>
    @error('nombre')<div class="invalid-feedback">{{ $message }}</div>@enderror
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
    <label class="form-label fw-semibold">Dirección</label>
    <input type="text" name="direccion" class="form-control" value="{{ old('direccion', $user->direccion) }}">
</div>
<div class="mb-3">
    <label class="form-label fw-semibold">Descripción</label>
    <textarea name="descripcion" rows="3" class="form-control">{{ old('descripcion', $user->descripcion) }}</textarea>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Tipo de atracción</label>
        <input type="text" name="tipo_atraccion" class="form-control" placeholder="Museo, Parque, Monumento..." value="{{ old('tipo_atraccion', $user->tipo_atraccion) }}">
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label fw-semibold">Hora apertura</label>
        <input type="time" name="horario_apertura" class="form-control" value="{{ old('horario_apertura', $user->horario_apertura) }}">
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label fw-semibold">Hora cierre</label>
        <input type="time" name="horario_cierre" class="form-control" value="{{ old('horario_cierre', $user->horario_cierre) }}">
    </div>
</div>
<div class="row">
    <div class="col-md-4 mb-3">
        <label class="form-label fw-semibold">Precio adulto ($)</label>
        <input type="number" name="precio_adulto" class="form-control" step="0.01" min="0" value="{{ old('precio_adulto', $user->precio_adulto) }}">
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label fw-semibold">Precio niño ($)</label>
        <input type="number" name="precio_nino" class="form-control" step="0.01" min="0" value="{{ old('precio_nino', $user->precio_nino) }}">
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label fw-semibold">Precio estudiante ($)</label>
        <input type="number" name="precio_estudiante" class="form-control" step="0.01" min="0" value="{{ old('precio_estudiante', $user->precio_estudiante) }}">
    </div>
</div>
<div class="mb-3">
    <label class="form-label fw-semibold">Sitio web</label>
    <input type="url" name="sitio_web" class="form-control" value="{{ old('sitio_web', $user->sitio_web) }}">
</div>
<div class="row mb-3">
    <div class="col-12"><label class="form-label fw-semibold">Características</label></div>
    @foreach(['tiene_guia_disponible'=>'Guía disponible','es_accesible'=>'Accesible (discapacidad)'] as $field=>$label)
        <div class="col-auto">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="{{ $field }}" id="{{ $field }}" value="1" {{ old($field, $user->$field) ? 'checked' : '' }}>
                <label class="form-check-label" for="{{ $field }}">{{ $label }}</label>
            </div>
        </div>
    @endforeach
</div>
