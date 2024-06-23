<div class="row p-4">
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="alerta" style="display: none;">
        <strong>Se ha restaurado correctamente la base de datos</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div class="row">
     <div class="col">
         <p class="fw-bold">
             Registros encontrados : <span id="p-encontrados-backup"></span>
         </p>
     </div>
     <div class="col">
         <div class="d-flex flex-row-reverse">
              
           </div>
     </div>
    </div>
 </div>
 <div class="row p-4">
     <table class="table ">
         <thead class="table-primary">
           <tr>
             <th scope="col">Nombre de archivo</th>
             <th scope="col">Tamaño</th>
             <th scope="col">Fecha hora creacion</th>
             <th scope="col">Acciones</th>
           </tr>
         </thead>
         <tbody id="t-respaldo-bd">
          
          
         </tbody>
     </table>
 </div>

 <script>

    function crearBackup() {
        var url = "/backup";      
        fetch(url, {
            method: "GET", 
            headers: {
                "Content-Type": "application/json",
                //'X-CSRF-Token': $('meta[name="_token"]').attr('content')
            },
          
            })
            .then((res) => {
                res.json();
                return false;
            })
            .catch((error) => console.error("Error:", error))
            .then((response) => {
                document.getElementById('alerta').style.display = 'block'
                return false;
            });

        return false;
    }

    function restaurarBases(ruta) {
        var archivo = String(ruta).split("/")[1];
        var url = "/backup/restaurar/" + archivo;      
        fetch(url, {
            method: "GET", 
            headers: {
                "Content-Type": "application/json",
                //'X-CSRF-Token': $('meta[name="_token"]').attr('content')
            },
          
            })
            .then((res) => {
                res.json();
                return false;
            })
            .catch((error) => console.error("Error:", error))
            .then((response) => {
                document.getElementById('alerta').style.display = 'block'
                return false;
            });

        return false;
    }

    function obtenerBackup() {

        let el = document.getElementById('administrar admin-system');
        el.classList.add('active');


        var url = "/backup/json";      
        fetch(url, {
            method: "GET", // or 'PUT'
            //body: JSON.stringify(data), // data can be `string` or {object}!
            headers: {
                "Content-Type": "application/json",
            },
            })
            .then((res) => res.json())
            .catch((error) => console.error("Error:", error))
            .then((response) => {
                llenarTableT(response)
            });
    }


    function llenarTableT(data) {      
        document.getElementById('p-encontrados-backup').innerHTML = data.length
        var el = document.getElementById('t-respaldo-bd');
        el.innerHTML = '';
        var html = '';
        data.forEach(element => {
            html += `
            <tr>
                <th scope="row">${element.name}</th>
                <td>${element.size}</td>
                <td>${element.last_modified}</td>
                <td><button onclick="restaurarBases('${element.name}')" class="btn btn-primary">
                      
                        Restaurar
                    </button>
                </td>
            </tr>           
            `
        });

  
        el.innerHTML = html; 
    }

    document.addEventListener('DOMContentLoaded', obtenerBackup);
</script>