@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <div class="col">
          <div class="card h-100 shadow-lg p-3 mb-5 bg-body-tertiary rounded">
            <div class="card-header bg-white">
                <h4 class="fw-bold text-center">Libros en Inventario</h4>
            </div>
            <div class="card-body text-center">
                <h1 class="fw-bold">{{ $data['libros']}}</h1>
            </div>
          </div>
        </div>
      
        <div class="col">
            <div class="card h-100 shadow-lg p-3 mb-5 bg-body-tertiary rounded">
              <div class="card-header bg-white">
                  <h4 class="fw-bold text-center">Libros prestados</h4>
              </div>
              <div class="card-body text-center">
                  <h1 class="fw-bold">{{ $data['prestamos']}}</h1>
              </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-lg p-3 mb-5 bg-body-tertiary rounded">
              <div class="card-header bg-white">
                  <h4 class="fw-bold text-center">Prestamos vencidos</h4>
              </div>
              <div class="card-body text-center">
                  <h1 class="fw-bold">{{ $data['prestamos_vencidos']}}</h1>
              </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-lg p-3 mb-5 bg-body-tertiary rounded">
              <div class="card-header bg-white">
                  <h4 class="fw-bold text-center">Libros sin existencias</h4>
              </div>
              <div class="card-body text-center">
                  <h1 class="fw-bold">{{$data['libros_sin_inventario']}}</h1>
              </div>
            </div>
        </div>   
      </div>

      <div class="row mt-4 pt-4">
        <nav>
            <div class="nav nav-tabs mt-4" id="nav-tab" role="tablist">
              <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                <h5 class="fw-bold">Reporte de prestamos</h5>
              </button>
              <!--
              <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
                <h5 class="fw-bold">Reportes libros</h5>
              </button> -->
              <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
                <h5 class="fw-bold">Reportes de usuarios</h5>
              </button>
            
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                @include('dashboard.prestamo')
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
               
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
                @include('dashboard.usuarios')
            </div>
            <div class="tab-pane fade" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">...</div>
          </div>
      </div>
@endsection
@push('scripts')
   
@endpush

<script>
    function cargarTodo()
    {
    
        iniciarBusqueda();
        iniciarBusquedaUsuario()
        rellanarActiveD()
    }

    function rellanarActiveD() {
      
        let el = document.getElementById('administrar dashboard');
        el.classList.add('active');
    }

    document.addEventListener('DOMContentLoaded', cargarTodo);
</script>