<div class="container pt-5 pb-3 border border-primary rounded" style="max-width: 60%; margin: auto;">
    <!-- Text input-->
    <div class="form-group row mb-3">
        <label class="col-md-3 col-form-label " for="bodenomb">Nombre *</label>
        <div class="col-md-9">
            <input id="bodenomb" value="{{ old('bodenomb') ?? $bodega->bodenomb }}" required
                name="bodenomb" type="text" placeholder="Nombre de la bodega" 
                class="form-control @error('bodenomb') is-invalid @enderror">
            @error('bodenomb')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>

    <!-- Text input-->
    <div class="form-group row mb-3">
        <label class="col-md-3 col-form-label " for="bodeabrv">Abreviación *</label>
        <div class="col-md-9">
            <input id="bodeabrv" value="{{ old('bodeabrv') ?? $bodega->bodeabrv }}" required
                name="bodeabrv" type="text" placeholder="Abreviación" 
                class="form-control @error('bodeabrv') is-invalid @enderror">
            @error('bodeabrv')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>

    <!-- Text input-->
    <div class="form-group row mb-3">
        <label class="col-md-3 col-form-label " for="bodeindice">Indice *</label>
        <div class="col-md-9">
            <input id="bodeindice" value="{{ old('bodeindice') ?? $bodega->bodeindice }}" required
                name="bodeindice" type="text" placeholder="Indice" 
                class="form-control @error('bodeindice') is-invalid @enderror">
            @error('bodeindice')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group row mb-3">
        <label class="col-md-3 col-form-label" for="sede">Sede *</label>
        <div class="col-md-9">
            <select id="sede" name="sede" class="form-control ">
                @foreach ($sedes as $sede)
                <option value="{{ $sede->id }}" {{ $sede->id == $bodega->sede_id ? 'selected' : ''}}>
                    {{ $sede->sedenomb }}
                </option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group row mb-3">
        <label class="col-md-3 col-form-label" for="sede">Ciudad *</label>
        <div class="col-md-9">
            <select id="ciudad" name="ciudad" class="form-control ">
                @foreach ($ciudades as $ciudad)
                <option value="{{ $ciudad->id }}" {{ $ciudad->id == $bodega->ciudad_id ? 'selected' : ''}}>
                    {{ $ciudad->ciudnomb }}
                </option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Text input-->
    <div class="form-group row mb-3">
        <label class="col-md-3 col-form-label " for="bodedirec">Dirección *</label>
        <div class="col-md-9">
            <input id="bodedirec" value="{{ old('bodedirec') ?? $bodega->bodedirec }}" required
                name="bodedirec" type="text" placeholder="Dirección" 
                class="form-control @error('bodedirec') is-invalid @enderror">
            @error('bodedirec')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group row mb-3">
        <label class="col-md-3 col-form-label" for="usuario">Usuario *</label>
        <div class="col-md-9">
            <select id="usuario" name="usuario" class="form-control ">
                @foreach ($usuarios as $usuario)
                <option value="{{ $usuario->id }}" {{ $usuario->id == $bodega->usuario_id ? 'selected' : ''}}>
                    {{ $usuario->usuanomb1 . ' ' . $usuario->usuanomb2 . ' ' . $usuario->usuaapell1 . ' ' . $usuario->usuaapell2  }}
                </option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Text input-->
    <div class="form-group row mb-3">
        <label class="col-md-3 col-form-label " for="bodecontact">Contacto</label>
        <div class="col-md-9">
            <input id="bodecontact" value="{{ old('bodecontact') ?? $bodega->bodecontact }}"
                name="bodecontact" type="text" placeholder="Contacto" 
                class="form-control @error('bodecontact') is-invalid @enderror">
            @error('bodecontact')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>

    <!-- Text input-->
    <div class="form-group row mb-3">
        <label class="col-md-3 col-form-label " for="bodetelcont">Teléfono Contacto</label>
        <div class="col-md-9">
            <input id="bodetelcont" value="{{ old('bodetelcont') ?? $bodega->bodetelcont }}"
                name="bodetelcont" type="text" placeholder="Teléfono" 
                class="form-control @error('bodetelcont') is-invalid @enderror">
            @error('bodetelcont')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>

    <!-- Multiple Radios -->
    <div class="form-group row mb-3">
        <label class="col-md-3 col-form-label" for="cierre">Cierre *</label>
        <div class="col-md-9">
            <div class="radio">
                <label for="cierre-0">
                    <input type="radio" name="bodecierre" id="cierre-0" value="1" {{ $bodega->esAbierta() ? 'checked' : ''}}>
                    Abierta
                </label>
            </div>
            <div class="radio">
                <label for="cierre-1">
                    <input type="radio" name="bodecierre" id="cierre-1" value="0"  {{ $bodega->esAbierta() ? '' : 'checked' }}>
                    Cerrada
                </label>
            </div>
        </div>
    </div>

    <!-- Select Basic -->
    <div class="form-group row mb-3">
        <label class="col-md-3 col-form-label" for="bodeestado">Estado *</label>
        <div class="col-md-9">
            <select id="bodeestado" name="bodeestado" class="form-control ">
                <option value="A" {{ $bodega->esActivo() ? 'selected' : '' }}>
                    Activo
                </option>
                <option value="I" {{ $bodega->esActivo() ? '' : 'selected' }}>
                    Inactivo
                </option>
            </select>
        </div>
    </div>

    <!-- Text input-->
    <div class="form-group row mb-3">
        <label class="col-md-3 col-form-label " for="bodeuscr">Usuario Creación *</label>
        <div class="col-md-9">
            <input id="bodeuscr" value="{{ old('bodeuscr') ?? $bodega->bodeuscr }}" required
                name="bodeuscr" type="text" placeholder="Usuario Creación" 
                class="form-control @error('bodeuscr') is-invalid @enderror">
            @error('bodeuscr')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>

    <!-- Button -->
    <div class="mb-3 mt-4 text-center">
        <button id="btnSubmit" type="submit" class="btn btn-primary">Guardar</button>
    </div>

</div>