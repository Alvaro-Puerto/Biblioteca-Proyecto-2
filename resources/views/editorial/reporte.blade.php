<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="crearCategoriaLabel">
             Reportes por editorial
          </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row mt-4 pt-4">
                <nav>
                    <div class="nav nav-tabs mt-4" id="nav-tab" role="tablist">
                      <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                        <h5 class="fw-bold">Libros asociados</h5>
                      </button>
                      <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
                        <h5 class="fw-bold">Autores asociados</h5>
                      </button>     
                    </div>
                  </nav>
                  <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                         
            <div class="d-flex justify-content-end">
                <button class="btn btn-success" onclick="excelExportarAuthorE()">Excel</button>
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
                <tbody id="tbody-reporte-libros">
                 
                </tbody>
              </table>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                       
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-success" onclick="excelExportarAuthorU()">Excel</button>
                        </div>
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Sexo</th>
                                <th scope="col">Pais</th>
                              </tr>
                            </thead>
                            <tbody id="tbody-reporte-author-editorial">
                             
                            </tbody>
                          </table>
                    </div>
                    <div class="tab-pane fade" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">...</div>
                  </div>
              </div> 
           
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>
</div>
<script>
    
    function excelExportarAuthorU() {
        var dataRecursoEditorial = []
        const worksheet = XLSX.utils.json_to_sheet(dataRecursoEditorial);

        // Crear un libro de trabajo y añadir la hoja de cálculo
        const workbook = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(workbook, worksheet, 'Prestamo');

        // Generar un archivo Excel y descargarlo
        XLSX.writeFile(workbook, 'authoreslibros.xlsx');
    }
    
    function excelExportarAuthorE() {
       
        const worksheet = XLSX.utils.json_to_sheet(dataAuhtorEditoria);

        // Crear un libro de trabajo y añadir la hoja de cálculo
        const workbook = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(workbook, worksheet, 'Prestamo');

        // Generar un archivo Excel y descargarlo
        XLSX.writeFile(workbook, 'authoreslibros.xlsx');
    }
 </script>



