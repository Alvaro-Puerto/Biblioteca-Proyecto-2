@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">Adminstración de categorias </div>
                <div class="card-header">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#crearCategoria"> Agregar</button>
                        <button type="button" class="btn btn-warning m-2" data-bs-toggle="modal" data-bs-target="#editarCategoria" onclick="editar()">Editar</button>
                        <button type="button" class="btn btn-danger  m-2" data-bs-toggle="modal" data-bs-target="#eliminarCategoria" onclick="eliminar()">Anular/Activar</button>
                    </div>
                </div>
                <div class="card-body">
                    {{ $dataTable->table() }}
                </div>
        </div>
    </div>
    <div class="modal fade" id="crearCategoria" tabindex="-1" aria-labelledby="crearCategoriaLabel" aria-hidden="true">
        @include('Categoria.form')
    </div>

    <div class="modal fade" id="editarCategoria" tabindex="-2" aria-labelledby="editarCategoriaLabel" aria-hidden="true">
        @include('Categoria.editar')
    </div>

    <div class="modal fade" id="eliminarCategoria" tabindex="-3" aria-labelledby="eliminarCategoriaLabel" aria-hidden="true">
        @include('Categoria.eliminar')
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush

<script>

    function editar() {
       let data = obtenerFilaSeleccionada();

       let form = document.forms['form-categoria-editar'];
       form.action = '/categoria/' + data.id;
       
        console.log(data);

        document.getElementById('nombre-categoria-editar').value = data.nombre;
        document.getElementById('descripcion-categoria-editar').value = data.descripcion;

    }

    function eliminar() {
        let data = obtenerFilaSeleccionada();
        let form = document.forms['form-categoria-eliminar'];
       form.action = '/categoria/' + data.id;
       
    }

    function obtenerFilaSeleccionada() {
        let items = document.getElementsByClassName('odd selected');
    
        if (items.length == 0) {
            items = document.getElementsByClassName('even selected');
        }
        if (items.length == 0) {
            alert('Debes seleccionar una fila');
            return false;
        }
           
        let data = {
            id: items[0].cells[0].innerText,
            nombre: items[0].cells[1].innerText,
            descripcion: items[0].cells[2].innerText,
        }
        return data;
    }        

    function rellanarActive() {
        let el = document.getElementById('administrar categoria');
        el.classList.add('active');
    }
    document.addEventListener('DOMContentLoaded', rellanarActive);

</script>