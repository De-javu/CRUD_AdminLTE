<!-- resources/views/agents/index.blade.php -->
@extends('adminlte::page')


@section('title', 'Agentes')

@section('content_header')
    <h1>Agentes</h1>
@stop

@section("content")
    <a href="/agentes/create" class="btn btn-primary mb-4">CREAR</a>
    <div class="row">
        <div class="col">
            @if (session('status'))
                @if(session('status') == '1')
                    <div class="alert alert-success">
                        Se guardó
                    </div>
                @else
                    <div class="alert alert-danger">
                        {{ session('status') }}
                    </div>
                @endif
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table id="Agentes" class="table">
                <thead  class="bg-primary text-white">
                <tr>
                    <th width="5%"> # </th>
                    <th width="10%">Id</th>
                    <th width="20%">Nombre Agente</th>
                    <th width="10%">Info</th>
                    <th width="35%">Web</th>
                    <th width="5%" >Telefono</th>
                </tr>
                </thead>
                <tbody>
           
                @foreach($agents as $row)
                    <tr>
                        <td>{{$row->id}}</td>
                        <td>{{$row->nombre_agente}}</td>
                        <td>{{$row->info}}</td>
                        <td>{{$row->web}}</td>
                        <td>{{$row->telefono}}</td>
                        <td>

                        <form action="{{route ('agentes.destroy', $row->id) }}" method="POST" class="formelimi">
                               @csrf
                                <a href="/agentes/{{$row->id}}/edit" class="btn btn-info"> Editar </a>
                               @method('DELETE')
                                <button type="submit" class="btn btn-danger">Borrar</button>
                            </form>

                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

 

@endsection

@section('css')
    <link href="https://cdn.datatables.net/2.1.7/css/dataTables.bootstrap5.css" rel="stylesheet">

@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.bootstrap5.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('eliminar')=='ok')
        <script>
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        </script>

    @endif

    <script>
        $('.formelimi').submit(function(e){
            e.preventDefault();
            Swal.fire({
                title: 'Estás seguro?',
                text: "No podrás deshacer ésta acción!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, bórralo!'
            }).then((result) => {
                if (result.isConfirmed) {
                    /* Swal.fire(
                         'Borrado!',
                         'Tu registro ha sido borrado',
                         'success'
                     )*/

                    this.submit();
                }
            })
        });

    </script>

    <script>
        $(document).ready(function() {
            $('#Agentes').DataTable({
                "lengthMenu":[[5,10,20,50,-1], [5,10,20,50,"All"]]
            });
        } );
    </script>
@stop