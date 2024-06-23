@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">Adminstración de permiso de usuarios<div>
                <div class="card-header">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-danger m-2" onclick="permisos()" data-bs-toggle="modal" data-bs-target="#administrarPermisos">Administrar permisos</button>
                    </div>
                </div>
                <div class="card-body">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
        <div class="modal modal-lg fade" id="administrarPermisos" tabindex="-1" aria-labelledby="administrarPermisos" aria-hidden="true">
            @include('usuario.permisos')
        </div>
        
        
        
        @endsection
        @push('scripts')
            {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
        @endpush
    </div>
</div>        

<script>

    function permisos() {
        let data = obtenerFilaSeleccionadaUsr();
        obtenerPermisos(data.id);
    }

    function rellanarActiveUrs() {
        let el = document.getElementById('administrar admin-permisos');
        el.classList.add('active');
    }
    
    function obtenerFilaSeleccionadaUsr() {
        let items = document.getElementsByClassName('selected');
    
        if (items.length == 0) {
            alert('Debes seleccionar una fila');
            return false;
        }
       
           
        let data = {
            id: items[0].cells[0].innerText,
            nombre: items[0].cells[1].innerText,
            email: items[0].cells[2].innerText,
        }
        return data;
    }

    function rellanarActive() {
        let el = document.getElementById('editorial');
        el.classList.add('active');
    }
    document.addEventListener('DOMContentLoaded', rellanarActiveUrs);

</script>