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
        <label class="form-label fw-semibold">Tipo de cocina</label>
        <input type="text" name="tipo_cocina" class="form-control" placeholder="Italiana, Peruana, Fusión..." value="{{ old('tipo_cocina', $user->tipo_cocina) }}">
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label fw-semibold">Tipo de servicio</label>
        <input type="text" name="tipo_servicio" class="form-control" placeholder="A la carta, Buffet..." value="{{ old('tipo_servicio', $user->tipo_servicio) }}">
    </div>
</div>
<div class="row">
    <div class="col-md-4 mb-3">
        <label class="form-label fw-semibold">Precio promedio ($)</label>
        <input type="number" name="precio_promedio" class="form-control" step="0.01" min="0" value="{{ old('precio_promedio', $user->precio_promedio) }}">
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label fw-semibold">Hora apertura</label>
        <input type="time" name="hora_apertura" class="form-control" value="{{ old('hora_apertura', $user->hora_apertura) }}">
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label fw-semibold">Hora cierre</label>
        <input type="time" name="hora_cierre" class="form-control" value="{{ old('hora_cierre', $user->hora_cierre) }}">
    </div>
</div>
<div class="row mb-3">
    <div class="col-12"><label class="form-label fw-semibold">Características</label></div>
    @foreach(['acepta_reservas'=>'Reservas','tiene_delivery'=>'Delivery','tiene_terraza'=>'Terraza','tiene_wifi'=>'WiFi','tiene_estacionamiento'=>'Estacionamiento'] as $field=>$label)
        <div class="col-auto">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="{{ $field }}" id="{{ $field }}" value="1" {{ old($field, $user->$field) ? 'checked' : '' }}>
                <label class="form-check-label" for="{{ $field }}">{{ $label }}</label>
            </div>
        </div>
    @endforeach
</div>
