<div class="modal-dialog">
    <form method="POST">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="crearCategoriaLabel">
                  Nuevo Libro/Recurso
              </h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
          <div class="modal-body">
             
                  <div class="mb-3">
                      <label for="recurso-titulo" class="form-label">Titulo <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="recurso-titulo" name="titulo" required>
                  </div>
                  <div class="mb-3">
                      <label for="recurso-descripcion" class="form-label">Descripción <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="recurso-descripcion" name="descripcion" required>
                  </div>
                  <div class="row">
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="recurso-inventario" class="form-label">Inventario <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="recurso-inventario" name="inventario" required>
                        </div>
                    </div>
                    <div class="col-4">
                      <div class="mb-3">
                          <label for="recurso-anyo" class="form-label">Año <span class="text-danger">*</span></label>
                          <input type="number" class="form-control" id="recurso-anyo" name="anyo" required>
                      </div>
                  </div>
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="recurso-tipo" class="form-label">Tipo <span class="text-danger">*</span></label>
                            <select class="form-control" name="tipo" id="recurso-tipo">
                                <option value="CCNN">CCNN</option>
                                <option value="LITERATURA">Literatura</option>
                                <option value="HISTORIA">Historia</option>
                                <option value="MATEMATICAS">Matemáticas</option>
                                <option value="GEOGRAFIA">Geografia</option>
                                <option value="RELIGION">Religión</option>
                                <option value="LENGUA EXTRANGERA">Lengua Extranjera</option>
                            </select>
                        </div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <div class="mb-3">
                      @include('recurso.categoria')
                  </div>
                  </div>
                  <div class="mb-3">
                    @include('recurso.editorial')
                  </div>
                  <div class="mb-3">
                    @include('recurso.author')
                  </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
    </form>  
  </div>
</div>