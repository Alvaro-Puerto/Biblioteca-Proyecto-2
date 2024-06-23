<div class="modal-dialog">
    <form method="POST"  id="form-prestamo-devolucion">
        @method('PUT')
        @csrf
        <div class="modal-content">
            <div class="modal-header">
              <h1 class="fs-5" id="crearCategoriaLabel">
                  Confirmar devolucion del recurso.
              </h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

          <div class="modal-body">
               <h3>¿Seguro que deseas confirmar la devolución? </h3>   
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
          </div>
    </form>  
  </div>
</div>
