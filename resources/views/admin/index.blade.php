@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row mt-4">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                <h5 class="fw-bold">Adminstración de bases de datos</h5>
              </button>
             
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                @include('backup.index')
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
           
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
                @include('dashboard.usuarios')
            </div>
            <div class="tab-pane fade" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">...</div>
          </div>
      </div>
</div>
@endsection
@push('scripts')
   
@endpush

<script>
    function cargarBackupAdmin()
    {
        obtenerBackup();
    }

    function rellanarActive() {
        let el = document.getElementById('administrar admin-system');
        el.classList.add('active');
    }

   // document.addEventListener('DOMContentLoaded', cargarBackupAdmin);
</script>