<div class="modal-dialog">
    <form method="POST" id="form-recursos-editar">
        @method('PUT')
        @csrf
        <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="crearCategoriaLabel">
                  Editar recurso/libro.
              </h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
          <div class="modal-body">
                  <input type="hidden" name="id" id="recursos-id">
                  <div class="mb-3">
                      <label for="recursos-titulo" class="form-label">Titulo <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="recursos-titulo" name="titulo" required>
                  </div>
                  <div class="mb-3">
                      <label for="recursos-descripcion" class="form-label">Descripcion <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="recursos-descripcion" name="descripcion" required>
                  </div>
                  <div class="row">
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="recursos-inventario" class="form-label">Inventario <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="recursos-inventario" name="inventario" required>
                        </div>
                    </div>
                    <div class="col-4">
                      <div class="mb-3">
                          <label for="recursos-anyo" class="form-label">Año <span class="text-danger">*</span></label>
                          <input type="number" class="form-control" id="recursos-anyo" name="anyo" required>
                      </div>
                  </div>
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="recursos-tipo" class="form-label">Tipo <span class="text-danger">*</span></label>
                            <select class="form-control" name="tipo" id="recursos-tipo">
                                <option value="CCNN">CCNN</option>
                                <option value="LITERATURA">Literatura</option>
                                <option value="HISTORIA">Historia</option>
                            </select>
                        </div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <div class="mb-3">
                      @include('recurso.categoria_editar')
                  </div>
                  </div>
                  <div class="mb-3">
                    @include('recurso.editorial_editar')
                  </div>
                  <div class="mb-3">
                    @include('recurso.author_editar')
                  </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
    </form>  
  </div>
</div>