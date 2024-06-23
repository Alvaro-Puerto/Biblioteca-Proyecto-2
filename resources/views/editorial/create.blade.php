<div class="modal-dialog">
    <form method="POST">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="crearCategoriaLabel">
                  Nueva editorial
              </h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
          <div class="modal-body">
             
                  <div class="mb-3">
                      <label for="nombre-nombre" class="form-label">Nombre <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="nombre-nombre" name="nombre" required>
                  </div>
                  <div class="mb-3">
                      <label for="descripcion-telefono" class="form-label">Teléfono <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="descripcion-telefono" name="telefono" required>
                  </div>
                  <div class="mb-3">
                    <label for="descripcion-direccion" class="form-label">Dirección <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="descripcion-direccion" name="direccion" required>
                </div>
              
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
    </form>  
  </div>
</div>
