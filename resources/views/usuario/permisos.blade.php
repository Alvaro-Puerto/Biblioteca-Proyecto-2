<div class="modal-dialog bg-white">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="administrarPermisosLabel">Administrar permisos</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row mb-4">
                <div class="col mb-4">
                    <div class="form-group">
                        <label for="">Nombres</label>
                        <input type="text" name="nombres" id="nombres-permisos" class="form-control" readonly >
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col m-4">
                
                    <div id="permisos-asignados"></div>
                </div> 
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" onclick="guardar()">Guardar</button>
        </div>          
</div>

<script>
    function obtenerFilaSeleccionada() {
        let items = document.getElementsByClassName('selected');
    
        if (items.length == 0) {
            alert('Debes seleccionar una fila');
            return false;
        }
           
        let data = {
            id: items[0].cells[0].innerText,
            nombres: items[0].cells[1].innerText,
            apellidos: items[0].cells[2].innerText,
            identificacion: items[0].cells[3].innerText,
            tipo: items[0].cells[4].innerText,
            fecha_nac: items[0].cells[5].innerText,
            sexo: items[0].cells[6].innerText,
        }
        return data;
    }

    function obtenerPermisos(id) {
        url = '/permisos/' +id;
        metodo = 'GET';
        fetch(url, {
            method: metodo,
        }).then(response => response.json())
        .then(data => {
           
            let permisos = data.permisos;
            let permisosUsuario = data.usuarioPermisos;

            let permisosUsuarioArray = permisosUsuario.map(x => x.id);
           
            let html = '';
            permisos.forEach(x => {
                
                html += `
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="${x.name}" id="flexCheckDefault" ${permisosUsuarioArray.includes(x.id) ? 'checked' : ''}>
                        <label class="form-check    
                        -label" for="flexCheckDefault">
                            ${x.name}
                        </label>
                    </div>
                `;
            });

            document.getElementById('nombres-permisos').value = data.usuario.name;
            document.getElementById('permisos-asignados').innerHTML = html;
        });
    }

    function guardar() {
        let items = document.getElementsByClassName('form-check-input');
        let permisos = [];
        for (let i = 0; i < items.length; i++) {
            if (items[i].checked) {
                permisos.push(items[i].value);
            }
        }

        
        let data = obtenerFilaSeleccionadaUsr();
        let url = '/permisos/' + data.id;
        let metodo = 'POST';
        fetch(url, {
            method: metodo,
            body: JSON.stringify({permisos: permisos}),
            headers: {
                "Content-Type": "application/json",
            },
        }).then(response => response.json())
        .then(data => {
            alert(data.message);
        });
        
    }

</script>