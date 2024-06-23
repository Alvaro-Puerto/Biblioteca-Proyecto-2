<div class="modal-dialog">
    <form method="POST" id="form-usuario-editar">
        @method('PUT')
        @csrf
        <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="crearCategoriaLabel">
                  Editar Usuario
              </h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
          <div class="modal-body">
                    <input type="hidden" name="id" id="estudiantes-id">
                  <div class="mb-3">
                      <label for="estudiantes-nombres" class="form-label">Nombres <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="estudiantes-nombres" name="nombres" required>
                  </div>
                  <div class="mb-3">
                      <label for="estudiantes-apellidos" class="form-label">Apellidos <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="estudiantes-apellidos" name="apellidos" required>
                  </div>
                  <div class="mb-3">
                    <label for="estudiantes-identificacion" class="form-label">Identificación <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="estudiantes-identificacion" name="identificacion" required>
                </div>
                  <div class="mb-3">
                    <label for="descripcion-direccion" class="form-label">Sexo <span class="text-danger">*</span></label>
                    <select class="form-control" name="sexo" id="estudiantes-sexo">
                        <option value="Hombre" selected>Hombre </option>
                        <option value="Mujer" selected>Mujer </option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="estudiantes-tipo" class="form-label">Tipo de perfil <span class="text-danger">*</span></label>
                    <select class="form-control" name="tipo" id="estudiantes-tipo">
                        <option value="Personal Docente/Adminstrativo" selected>Personal Docente/Administrativo </option>
                        <option value="Estudiante" selected>estudiantes </option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="estudiantes-fecha_nacimienti" class="form-label">Fecha Nacimiento <span class="text-danger">*</span></label>
                    <input type="date" name="fecha_nac" id="estudiantes-fecha_nac" class="form-control">
                  </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
    </form>  
  </div>
</div>