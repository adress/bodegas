@extends('layouts.app')

@section('template_title')
Crear Bodega
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('layouts.errors')

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Create Bodega</span>
                </div>
                <div class="card-body">
                    <form id="formEmpleado" method="POST" action="{{ route('bodegas.store') }}" role="form" enctype="multipart/form-data">
                        @csrf
                        @include('bodega.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection