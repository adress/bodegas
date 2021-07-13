@extends('layouts.app')

@section('template_title')
Bodegas
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Bodegas') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('bodegas.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Crear Nuevo') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div id="alerts"></div>

                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>ID</th>
                                    <th>Sede</th>
                                    <th>Ciudad</th>
                                    <th>Usuario</th>
                                    <th>Nombre</th>
                                    <th>Abreviación</th>
                                    <th>Dirección</th>
                                    <th>Teléfono</th>
                                    <th>Cierre</th>
                                    <th>Gestión</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bodegas as $bodega)
                                <tr>

                                    <td>{{ $bodega->id }}</td>
                                    <td>{{ $bodega->sede->sedenomb }}</td>
                                    <td>{{ $bodega->ciudad->ciudnomb }}</td>
                                    <td>{{ $bodega->usuario->usuanomb1 }}</td>
                                    <td>{{ $bodega->bodenomb }}</td>
                                    <td>{{ $bodega->bodeabrv }}</td>
                                    <td>{{ $bodega->bodedirec }}</td>
                                    <td>{{ $bodega->bodecontact }}</td>
                                    <td>{{ $bodega->esAbierta() ? 'Abierta' : 'Cerrada' }}</td>
                                    <td>
                                        <form action="{{ route('bodegas.destroy',$bodega->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary " href="{{ route('bodegas.show',$bodega->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                            <a class="btn btn-sm btn-success" href="{{ route('bodegas.edit',$bodega->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Estas seguro?')" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                        </form>
                                        <button class="btn btn-danger btn-sm btn-elimina" data-id="{{$bodega->id}}"><i class="fa fa-fw fa-trash"></i> ajax</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $bodegas->links() !!}
        </div>
    </div>
</div>
<script>
    const buttons = document.querySelectorAll('.btn-elimina');
    const divAlerts = document.querySelector('#alerts');

    buttons.forEach((btn) => {
        btn.addEventListener("click", () => {
            if (!window.confirm("Confirma la eliminación del registro?")) {
                return;
            }
            const id = btn.getAttribute('data-id');
            peticion(id)
                .then((res) => {
                    divAlerts.innerHTML = `
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> ${res}.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        `;
                    //remove row
                    btn.parentNode.parentNode.parentNode.removeChild(btn.parentNode.parentNode);
                })
                .catch((error) => console.log(error.response.data.message));
        });
    });


    const peticion = async (id) => {
        const instance = axios.create({
            baseURL: `{{url('/bodegas')}}/${id}`,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            }
        });

        const resp = await instance.delete();
        return resp.data.message;
    }

    /*
    //***********metodo ajax
        $(".deleteRecord").click(function(){
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
       
        $.ajax(
        {
            url: "users/"+id,
            type: 'DELETE',
            data: {
                "id": id,
                "_token": token,
            },
            success: function (){
                console.log("it Works");
            }
        });
       
    */
</script>
@endsection