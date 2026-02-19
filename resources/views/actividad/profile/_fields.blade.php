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
    <label class="form-label fw-semibold">Descripción</label>
    <textarea name="descripcion" rows="3" class="form-control">{{ old('descripcion', $user->descripcion) }}</textarea>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Tipo de actividad</label>
        <input type="text" name="tipo_actividad" class="form-control" placeholder="Aventura, Cultural, Naturaleza..." value="{{ old('tipo_actividad', $user->tipo_actividad) }}">
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Dificultad</label>
        <select name="dificultad" class="form-select">
            @foreach(['facil'=>'Fácil','moderado'=>'Moderado','dificil'=>'Difícil'] as $v=>$l)
                <option value="{{ $v }}" {{ old('dificultad', $user->dificultad)==$v?'selected':'' }}>{{ $l }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-4 mb-3">
        <label class="form-label fw-semibold">Duración (horas)</label>
        <input type="number" name="duracion_horas" class="form-control" step="0.5" min="0" value="{{ old('duracion_horas', $user->duracion_horas) }}">
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label fw-semibold">Precio desde ($)</label>
        <input type="number" name="precio_desde" class="form-control" step="0.01" min="0" value="{{ old('precio_desde', $user->precio_desde) }}">
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label fw-semibold">Precio hasta ($)</label>
        <input type="number" name="precio_hasta" class="form-control" step="0.01" min="0" value="{{ old('precio_hasta', $user->precio_hasta) }}">
    </div>
</div>
<div class="row mb-3">
    <div class="col-12"><label class="form-label fw-semibold">Incluye</label></div>
    @foreach(['incluye_transporte'=>'Transporte','incluye_guia'=>'Guía','incluye_equipo'=>'Equipo'] as $field=>$label)
        <div class="col-auto">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="{{ $field }}" id="{{ $field }}" value="1" {{ old($field, $user->$field) ? 'checked' : '' }}>
                <label class="form-check-label" for="{{ $field }}">{{ $label }}</label>
            </div>
        </div>
    @endforeach
</div>
