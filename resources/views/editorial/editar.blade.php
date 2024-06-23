<div class="modal-dialog">
    <form method="POST"  id="form-editorial-editar">
        @method('PUT')
        @csrf
        <div class="modal-content">
            <div class="modal-header">
              <h1 class="fs-5" id="crearCategoriaLabel">
                  Editar editorial.
              </h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
          <div class="modal-body">
                    <input type="hidden" name="id" id="editorial-id">
                  <div class="mb-3">
                      <label for="nombre-nombre" class="form-label">Nombre <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="editorial-nombre" name="nombre" required>
                  </div>
                  <div class="mb-3">
                      <label for="descripcion-telefono" class="form-label">Teléfono <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="editorial-telefono" name="telefono" required>
                  </div>
                  <div class="mb-3">
                    <label for="descripcion-direccion" class="form-label">Direccion <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="editorial-direccion" name="direccion" required>
                </div>
              
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
    </form>  
  </div>
</div>
