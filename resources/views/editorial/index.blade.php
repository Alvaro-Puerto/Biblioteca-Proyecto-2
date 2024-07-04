@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">Adminstración de editoriales<div>
                <div class="card-header">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#crearEditorial"> Agregar</button>
                        <button type="button" class="btn btn-warning m-2" onclick="editar()" data-bs-toggle="modal" data-bs-target="#editarEditorial">Editar</button>
                        <button type="button" class="btn btn-danger  m-2" onclick="eliminar()" data-bs-toggle="modal" data-bs-target="#eliminarEditorial">Anular/Activar</button>
                        <button type="button" class="btn btn-success  m-2" onclick="reportesEditorial()" data-bs-toggle="modal" data-bs-target="#reporteEditorial">Reportes</button>


                    </div>
                </div>
                <div class="card-body">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>

        <!-- Modal -->
<div class="modal fade" id="crearEditorial" tabindex="-1" aria-labelledby="crearEditorialLabel" aria-hidden="true">
      @include('editorial.create')
</div>

<div class="modal fade" id="editarEditorial" tabindex="-1" aria-labelledby="editarEditorialLabel" aria-hidden="true">
    @include('editorial.editar')
</div>

<div class="modal fade" id="eliminarEditorial" tabindex="-1" aria-labelledby="eliminarEditorialLabel" aria-hidden="true">
    @include('editorial.eliminar')
</div>


<div class="modal fade" id="reporteEditorial" tabindex="-1" aria-labelledby="reporteEditorialLabel" aria-hidden="true">
    @include('editorial.reporte')
</div>

@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush

<script>

    var dataAuhtorEditoria = []
    var dataRecursoEditorial = []

    function editar() {
       let data = obtenerFilaSeleccionada();

       let form = document.forms['form-editorial-editar'];
       form.action = '/editorial/' + data.id;
       
       Object.keys(data).forEach(x => {
           document.getElementById('editorial-' + x).value = data[x];
       })

    }

    function eliminar() {
        let data = obtenerFilaSeleccionada();
        let form = document.forms['form-editorial-eliminar'];
       form.action = '/editorial/' + data.id;
       
    }

    function reportesEditorial() {
        let data = obtenerFilaSeleccionada();
        fetch('/editorial/detalles/' + data.id)
        .then(response => response.json())
        .then(data => {
            console.log(data);

            dataAuhtorEditoria = data.authores;
            dataRecursoEditorial = data.recurso
            llenarTableE(data.recurso);
            llenarTableu(data.authores);
        })
        .catch(error => console.error('Error fetching JS:', error));
    }

    function llenarTableu(data) {
        let htmlTr = ``;

        data.forEach(x => {
            htmlTr += `
                <tr>
                    <td>${x.nombres}</td>
                    <td>${x.apellidos}</td>
                    <td>${x.sexo}</td>
                    <td>${x.pais}</td>
                </tr>
            `
        });

        document.getElementById('tbody-reporte-author-editorial').innerHTML = htmlTr;   
    }
    
    function llenarTableE(data) {
        let htmlTr = ``;

        data.forEach(x => {
            htmlTr += `
                <tr>
                    <td>${x.titulo}</td>
                    <td>${x.descripcion}</td>
                    <td>${x.inventario}</td>
                    <td>${x.created_at}</td>
                </tr>
            `
        });

        document.getElementById('tbody-reporte-libros').innerHTML = htmlTr;
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
            telefono: items[0].cells[2].innerText,
            direccion: items[0].cells[3].innerText,
        }
        return data;
    }

    function rellanarActive() {
        let el = document.getElementById('administrar editorial');
        el.classList.add('active');
        buscarPermisos()
    }
    document.addEventListener('DOMContentLoaded', rellanarActive);

</script>