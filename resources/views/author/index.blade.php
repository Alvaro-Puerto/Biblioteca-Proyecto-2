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
                        <button type="button" class="btn btn-danger  m-2" onclick="obtenerReporte()"  data-bs-toggle="modal" data-bs-target="#reporteAuthor">Reportes</button>
                       
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

<div class="modal fade" id="reporteAuthor" tabindex="-1" aria-labelledby="reporteAuthorLabel" aria-hidden="true">
    @include('author.reporte')
</div>


@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush

<script>
    var dataAuthor = [];
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

    function obtenerReporte() {       
        let data = obtenerFilaSeleccionada();
        fetch('/author/libros/' + data.id)
        .then(response => response.json())
        .then(data => {
            dataAuthor = data.libros;
            llenarTable(data.libros);
        })
        .catch(error => console.error('Error fetching JS:', error));
    }

    function llenarTable(data) {
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

        document.getElementById('tbody-reporte-author').innerHTML = htmlTr;
    }

    function rellanarActive() {
        let el = document.getElementById('administrar author');
        el.classList.add('active');

        buscarPermisos();
    }
    document.addEventListener('DOMContentLoaded', rellanarActive);
</script>