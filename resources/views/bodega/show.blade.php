@extends('layouts.app')

@section('template_title')
{{ $bodega->bodenomb ?? 'Ver Bodega' }}
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">Ver Bodega: {{$bodega->bodenomb}}</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('bodegas.index') }}"> Regresar</a>
                    </div>
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <strong>Sede:</strong>
                        {{ $bodega->sede->sedenomb }}
                    </div>

                    <div class="form-group">
                        <strong>Ciudad:</strong>
                        {{ $bodega->ciudad->ciudnomb }}
                    </div>

                    <div class="form-group">
                        <strong>usuario nombre completo:</strong>
                        {{ $bodega->usuario->usuanomb1 . ' '. $bodega->usuario->usuanomb2. ' '.  $bodega->usuario->usuaapell1 .  ' '. $bodega->usuario->usuaapell2}}
                    </div>
                    
                    <hr>
                    <h5>Información Bodega</h5>

                    <div class="form-group">
                        <strong>Nombre Bodega:</strong>
                        {{ $bodega->bodenomb }}
                    </div>

                    <div class="form-group">
                        <strong>Abreviación:</strong>
                        {{ $bodega->bodeabrv }}
                    </div>

                    <div class="form-group">
                        <strong>Dirección:</strong>
                        {{ $bodega->bodedirec }}
                    </div>

                    <div class="form-group">
                        <strong>Contacto:</strong>
                        {{ $bodega->bodecontact }}
                    </div>

                    <div class="form-group">
                        <strong>Teléfono:</strong>
                        {{ $bodega->bodetelcont }}
                    </div>

                    <div class="form-group">
                        <strong>Indice:</strong>
                        {{ $bodega->bodeindice }}
                    </div>

                    <div class="form-group">
                        <strong>Cierre:</strong>
                        {{ $bodega->esAbierta() ? 'Abierta' : 'Cerrada' }}
                    </div>

                    <div class="form-group">
                        <strong>Estado:</strong>
                        {{ $bodega->esActivo() ? 'Activa' : 'Inactiva' }}
                    </div>

                    <div class="form-group">
                        <strong>Usuario Creación:</strong>
                        {{ $bodega->bodeuscr }}
                    </div>

                    <div class="form-group">
                        <strong>Fecha Creación:</strong>
                        {{ $bodega->created_at }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection