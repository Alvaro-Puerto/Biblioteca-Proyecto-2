<div class="modal-dialog">
    <form method="POST"  id="form-editorial-eliminar">
        @method('DELETE')
        @csrf
        <div class="modal-content">
            <div class="modal-header">
              <h1 class="fs-5" id="crearCategoriaLabel">
                  Desactivar editorial.
              </h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
          <div class="modal-body">
               <h3>¿Seguro que deseas cambiar el estado a este registro?</h3>   
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
          </div>
    </form>  
  </div>
</div>
