<div class="mb-3">
    <label class="form-label fw-semibold">Nombre de la agencia *</label>
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
