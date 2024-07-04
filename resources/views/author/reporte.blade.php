<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="crearCategoriaLabel">
             Libros por autor
          </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

        </div>
        <div class="modal-body">
            
            <div class="d-flex justify-content-end">
                <button class="btn btn-success" onclick="excelExportarAuthor()">Excel</button>
            </div>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Titulo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Inventario</th>
                    <th scope="col">Fecha de creacion</th>
                  </tr>
                </thead>
                <tbody id="tbody-reporte-author">
                 
                </tbody>
              </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>
</div>
<script>

    
    function excelExportarAuthor() {
        const worksheet = XLSX.utils.json_to_sheet(dataAuthor);

        // Crear un libro de trabajo y añadir la hoja de cálculo
        const workbook = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(workbook, worksheet, 'Prestamo');

        // Generar un archivo Excel y descargarlo
        XLSX.writeFile(workbook, 'authoreslibros.xlsx');
    }
    document.addEventListener('DOMContentLoaded', populateCountries);
</script>