<div class="modal-dialog">
    <form method="POST">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="crearCategoriaLabel">
                  Nuevo prestamo
              </h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
          <div class="modal-body">             
                  <div class="mb-3">
                        @include('prestamo.recurso')
                  </div>
                  <div class="mb-3">
                        @include('prestamo.usuario')
                  </div>
                  <div class="mb-3">
                    <label for="prestamo-fecha_hora_entrega" class="form-label">Fecha de entrega <span class="text-danger">*</span></label>
                    <input type="datetime-local" class="form-control" id="prestamo-fecha_hora_entrega" name="fecha_hora_entrega" required>
                  </div>
                  <div class="mb-3">
                    <label for="recurso-anyo" class="form-label">Motivo del prestamo <span class="text-danger">*</span></label>
                    <textarea name="motivo_prestamo" class="form-control"></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="recurso-observacion" class="form-label">Observaciones <span class="text-danger">*</span></label>
                    <textarea name="observaciones" class="form-control"></textarea>
                  </div>  
                </div>
        
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
    </form>  
  </div>
</div>