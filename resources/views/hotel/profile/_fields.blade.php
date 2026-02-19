<div class="mb-3">
    <label class="form-label fw-semibold">Nombre del hotel *</label>
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
    <div class="col-md-4 mb-3">
        <label class="form-label fw-semibold">Estrellas</label>
        <select name="numero_estrellas" class="form-select">
            @for($i=1;$i<=5;$i++)
                <option value="{{ $i }}" {{ old('numero_estrellas', $user->numero_estrellas)==$i?'selected':'' }}>{{ $i }} ★</option>
            @endfor
        </select>
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label fw-semibold">Tipo de hotel</label>
        <select name="tipo_hotel" class="form-select">
            @foreach(['hotel','hostal','boutique','resort','apart-hotel','bed_and_breakfast','motel'] as $t)
                <option value="{{ $t }}" {{ old('tipo_hotel', $user->tipo_hotel)==$t?'selected':'' }}>{{ ucwords(str_replace('-',' ',$t)) }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label fw-semibold">N° Habitaciones</label>
        <input type="number" name="numero_habitaciones" class="form-control" min="0" value="{{ old('numero_habitaciones', $user->numero_habitaciones) }}">
    </div>
</div>
<div class="row">
    <div class="col-md-4 mb-3">
        <label class="form-label fw-semibold">Check-in</label>
        <input type="time" name="check_in_hora" class="form-control" value="{{ old('check_in_hora', $user->check_in_hora) }}">
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label fw-semibold">Check-out</label>
        <input type="time" name="check_out_hora" class="form-control" value="{{ old('check_out_hora', $user->check_out_hora) }}">
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label fw-semibold">Precio desde ($)</label>
        <input type="number" name="precio_desde" class="form-control" step="0.01" min="0" value="{{ old('precio_desde', $user->precio_desde) }}">
    </div>
</div>
<div class="mb-3">
    <label class="form-label fw-semibold">Sitio web</label>
    <input type="url" name="sitio_web" class="form-control" value="{{ old('sitio_web', $user->sitio_web) }}">
</div>
<div class="row mb-3">
    <div class="col-12"><label class="form-label fw-semibold">Amenidades</label></div>
    @foreach(['tiene_piscina'=>'Piscina','tiene_spa'=>'Spa','tiene_restaurante'=>'Restaurante','tiene_wifi'=>'WiFi','tiene_gym'=>'Gym'] as $field=>$label)
        <div class="col-auto">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="{{ $field }}" id="{{ $field }}" value="1" {{ old($field, $user->$field) ? 'checked' : '' }}>
                <label class="form-check-label" for="{{ $field }}">{{ $label }}</label>
            </div>
        </div>
    @endforeach
</div>
