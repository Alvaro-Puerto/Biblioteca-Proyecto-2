@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">Administración de usuarios<div>
                <div class="card-header">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#crearEditorial"> Agregar</button>
                        <button type="button" class="btn btn-warning m-2" onclick="editar()" data-bs-toggle="modal" data-bs-target="#editarEditorial">Editar</button>
                       
                       
                       <!-- <button type="button" class="btn btn-danger  m-2" onclick="eliminar()" data-bs-toggle="modal" data-bs-target="#eliminarEditorial">Anular/Activar</button> -->

                    </div>
                </div>
                <div class="card-body">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>

        <!-- Modal -->
<div class="modal fade" id="crearEditorial" tabindex="-1" aria-labelledby="crearEditorialLabel" aria-hidden="true">
      @include('usuario.create')
</div>

<div class="modal fade" id="editarEditorial" tabindex="-1" aria-labelledby="editarEditorialLabel" aria-hidden="true">
    @include('usuario.editar')
</div>

<div class="modal fade" id="eliminarEditorial" tabindex="-1" aria-labelledby="eliminarEditorialLabel" aria-hidden="true">
    @include('usuario.eliminar')
</div>

<div class="modal modal-lg fade" id="administrarPermisos" tabindex="-1" aria-labelledby="administrarPermisos" aria-hidden="true">
    @include('usuario.permisos')
</div>



@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush

<script>

    function editar() {
       let data = obtenerFilaSeleccionada();

       let form = document.forms['form-usuario-editar'];
       form.action = '/usuario/' + data.id;
       
       Object.keys(data).forEach(x => {
            document.getElementById('estudiantes-' + x).value = data[x];
       })

    }

    function eliminar() {
        let data = obtenerFilaSeleccionada();
        let form = document.forms['form-usuario-eliminar'];
       form.action = '/author/' + data.id;
       
    }


    function obtenerFilaSeleccionada() {
        let items = document.getElementsByClassName('selected');
    
        if (items.length == 0) {
            alert('Debes seleccionar una fila');
            return false;
        }
           
        let data = {
            id: items[0].cells[0].innerText,
            nombres: items[0].cells[1].innerText,
            apellidos: items[0].cells[2].innerText,
            identificacion: items[0].cells[3].innerText,
            tipo: items[0].cells[4].innerText,
            fecha_nac: items[0].cells[5].innerText,
            sexo: items[0].cells[6].innerText,
        }
        return data;
    }

    function rellanarActive() {
        let el = document.getElementById('administrar usuario-menu');
        el.classList.add('active');
    }
    document.addEventListener('DOMContentLoaded', rellanarActive);
</script>