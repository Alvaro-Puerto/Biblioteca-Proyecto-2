<div class="modal-dialog">
    <form method="POST" id="form-author-editar">
        @method('PUT')
        @csrf
        <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="crearCategoriaLabel">
                  Editar Autor.
              </h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
          <div class="modal-body">
                    <input type="hidden" id="author-id">
                  <div class="mb-3">
                      <label for="author-nombres" class="form-label">Nombres <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="author-nombres" name="nombres" required>
                  </div>
                  <div class="mb-3">
                      <label for="author-apellidos" class="form-label">Apellidos <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="author-apellidos" name="apellidos" required>
                  </div>
                  <div class="mb-3">
                    <label for="descripcion-direccion" class="form-label">Sexo <span class="text-danger">*</span></label>
                    <select class="form-control" name="sexo" id="author-sexo">
                        <option value="Hombre" selected>Hombre </option>
                        <option value="Mujer" selected>Mujer </option>
                    </select>
                </div>
                <div class="mb-3">
                    @include('author.paises_editar')
                </div>
              
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
    </form>  
  </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', populateCountries);
</script>