@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">Adminstración de Autores<div>
                <div class="card-header">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#crearEditorial"> Agregar</button>
                        <button type="button" class="btn btn-warning m-2" onclick="editar()" data-bs-toggle="modal" data-bs-target="#editarEditorial">Editar</button>
                        <button type="button" class="btn btn-danger  m-2" onclick="eliminar()" data-bs-toggle="modal" data-bs-target="#eliminarEditorial">Anular/Activar</button>

                    </div>
                </div>
                <div class="card-body">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>

        <!-- Modal -->
<div class="modal fade" id="crearEditorial" tabindex="-1" aria-labelledby="crearEditorialLabel" aria-hidden="true">
      @include('author.create')
</div>

<div class="modal fade" id="editarEditorial" tabindex="-1" aria-labelledby="editarEditorialLabel" aria-hidden="true">
    @include('author.editar')
</div>

<div class="modal fade" id="eliminarEditorial" tabindex="-1" aria-labelledby="eliminarEditorialLabel" aria-hidden="true">
    @include('author.eliminar')
</div>

@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush

<script>
    function editar() {
        populateCountries();
       let data = obtenerFilaSeleccionada();
       let form = document.forms['form-author-editar'];
       form.action = '/author/' + data.id;
       
       Object.keys(data).forEach(x => {
            if (x === 'pais') {
                document.getElementById('author-'+x+'-editar').value = data[x];
            } else {
                document.getElementById('author-' + x).value = data[x];
            } 
         
            
       })

    }

    function eliminar() {
        let data = obtenerFilaSeleccionada();
        let form = document.forms['form-author-eliminar'];
       form.action = '/author/' + data.id;
       
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
            nombres: items[0].cells[1].innerText,
            apellidos: items[0].cells[2].innerText,
            sexo: items[0].cells[3].innerText,
            pais: items[0].cells[4].innerText,
        }
        return data;
    }


    function rellanarActive() {
        let el = document.getElementById('administrar author');
        el.classList.add('active');
    }
    document.addEventListener('DOMContentLoaded', rellanarActive);
</script>