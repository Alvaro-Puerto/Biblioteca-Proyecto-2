<div class="row p-4">
    <div class="row">
     <div class="col">
        <h5 class="fw-bold">
            Reportes por usuarios
        </h5>
     </div>
     <div class="col">
        <div class="d-flex flex-row-reverse">
        </div>
     </div>
    </div>
 </div>
 <div class="row p-4">
    <div class="col-7 border p-4" style="min-height: 700px">
        <table class="table ">
            <thead class="table-primary">
              <tr>
                <th scope="col">Usuario</th>
                <th scope="col">N° Libros prestado</th>
                <th scope="col">Acción</th>
               
              </tr>
            </thead>
            <tbody id="t-usuario-d">
            </tbody>
        </table>
    </div>
    <div class="col-5 p-4">
        <h4 class="fw-bold" id="usuario-b"></h4>
        <table class="table mt-4">
            <thead class="table-primary">
              <tr>
                <th scope="col">Titulo</th>
                <th scope="col">Tipo</th>
                <th scope="col">Fecha de prestamo</th>             
              </tr>
            </thead>
            <tbody id="t-usuario-libro-d">
            </tbody>
        </table>
    </div>
 </div>
 
 <script>
     function iniciarBusquedaUsuario() {
        buscarUsuario();
     }
 
     function buscarUsuario() {
         var url = "/dashboard/usuario/global";
         
         fetch(url, {
         method: "GET", // or 'PUT'
         //body: JSON.stringify(data), // data can be `string` or {object}!
         headers: {
             "Content-Type": "application/json",
         },
         })
         .then((res) => res.json())
         .catch((error) => console.error("Error:", error))
         .then((response) => llenarTable(response));
     }
 

     function buscarUsuarioLibro(usuario) {
        document.getElementById('usuario-b').innerHTML = usuario;
        var url = '/dashboard/usuario/libro/' + usuario;


        fetch(url, {
         method: "GET", // or 'PUT'
         //body: JSON.stringify(data), // data can be `string` or {object}!
         headers: {
             "Content-Type": "application/json",
         },
         })
         .then((res) => res.json())
         .catch((error) => console.error("Error:", error))
         .then((response) => llenarTableDetalle(response));
     }
 
     function llenarTable(data) {
        //document.getElementById('p-encontrados').innerHTML = data.length
         var el = document.getElementById('t-usuario-d');
         el.innerHTML = '';
         var html = '';
         data.forEach(element => {
             html += `
             <tr>     
                 <td>${element.usuario}</td>
                 <td>${element.total}</td>
                 <td>
                    <button onclick="buscarUsuarioLibro('${element.usuario}')" class="btn btn-primary">Visualizar</button>   
                 </td>         
             </tr>        
             `
         });
         el.innerHTML = html;
     }

     function llenarTableDetalle(data) {
        //document.getElementById('p-encontrados').innerHTML = data.length
         var el = document.getElementById('t-usuario-libro-d');
         el.innerHTML = '';
         var html = '';
         data.forEach(element => {
             html += `
             <tr>     
                 <td>${element.titulo}</td>
                 <td>${element.tipo}</td>
                 <td>${element.fecha_hora_prestamo}</td>
                     
             </tr>        
             `
         });
         el.innerHTML = html;
     }
    // document.addEventListener('DOMContentLoaded', iniciarBusquedaUsuario);
 </script>