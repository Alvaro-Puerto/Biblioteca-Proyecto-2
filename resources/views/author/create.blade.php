<div class="modal-dialog">
    <form method="POST">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="crearCategoriaLabel">
                  Nuevo Autor
              </h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
          <div class="modal-body">
             
                  <div class="mb-3">
                      <label for="nombre-nombre" class="form-label">Nombres <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="nombre-nombre" name="nombres" required>
                  </div>
                  <div class="mb-3">
                      <label for="descripcion-telefono" class="form-label">Apellidos <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="descripcion-telefono" name="apellidos" required>
                  </div>
                  <div class="mb-3">
                    <label for="descripcion-direccion" class="form-label">Sexo <span class="text-danger">*</span></label>
                    <select class="form-control" name="sexo">
                        <option value="Hombre" selected>Hombre </option>
                        <option value="Mujer" selected>Mujer </option>
                    </select>
                </div>
                <div class="mb-3">
                    @include('author.paises')
                </div>
              
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
    </form>  
  </div>
</div>
