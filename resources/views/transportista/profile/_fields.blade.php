<div class="mb-3">
    <label class="form-label fw-semibold">Nombre / Empresa *</label>
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
        <label class="form-label fw-semibold">Tipo de servicio</label>
        <input type="text" name="tipo_servicio" class="form-control" placeholder="Traslados, Tours, Transfer..." value="{{ old('tipo_servicio', $user->tipo_servicio) }}">
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Tipo de vehículo</label>
        <input type="text" name="tipo_vehiculo" class="form-control" placeholder="Van, Bus, 4x4..." value="{{ old('tipo_vehiculo', $user->tipo_vehiculo) }}">
    </div>
</div>
<div class="row">
    <div class="col-md-4 mb-3">
        <label class="form-label fw-semibold">Capacidad pasajeros</label>
        <input type="number" name="capacidad_pasajeros" class="form-control" min="1" value="{{ old('capacidad_pasajeros', $user->capacidad_pasajeros) }}">
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label fw-semibold">Precio base ($)</label>
        <input type="number" name="precio_base" class="form-control" step="0.01" min="0" value="{{ old('precio_base', $user->precio_base) }}">
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label fw-semibold">Precio por km ($)</label>
        <input type="number" name="precio_por_km" class="form-control" step="0.01" min="0" value="{{ old('precio_por_km', $user->precio_por_km) }}">
    </div>
</div>
<div class="mb-3">
    <label class="form-label fw-semibold">N° Licencia</label>
    <input type="text" name="licencia_numero" class="form-control" value="{{ old('licencia_numero', $user->licencia_numero) }}">
</div>
<div class="row mb-3">
    <div class="col-12"><label class="form-label fw-semibold">Características</label></div>
    @foreach(['tiene_ac'=>'A/C','tiene_wifi'=>'WiFi','acepta_mascotas'=>'Acepta mascotas'] as $field=>$label)
        <div class="col-auto">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="{{ $field }}" id="{{ $field }}" value="1" {{ old($field, $user->$field) ? 'checked' : '' }}>
                <label class="form-check-label" for="{{ $field }}">{{ $label }}</label>
            </div>
        </div>
    @endforeach
</div>
