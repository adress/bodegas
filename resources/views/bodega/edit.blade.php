@extends('layouts.app')

@section('template_title')
    Update Empleado
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('layouts.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Empleado</span>
                    </div>
                    <div class="card-body">
                        <form id="formEmpleado" method="POST" action="{{ route('bodegas.update', $bodega->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('bodega.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
