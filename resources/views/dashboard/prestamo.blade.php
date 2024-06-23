<div class="row p-4">
   <div class="row">
    <div class="col">
        <p class="fw-bold">
            Registros encontrados : <span id="p-encontrados"></span>
        </p>
    </div>
    <div class="col">
        <div class="d-flex flex-row-reverse">
       
            <button class="btn btn-primary" onclick="buscar()">
                Buscar
            </button>
            <div class="form-group ">
                <label for="">Fecha de fin</label>
                <input type="date" name="" id="fin" class="form-control rounded-0">
               
            </div>
            <div class="form-group">
                <label for="">Fecha de inicio</label>
                <input type="date" name="" id="inicio" class="form-control rounded-0">
            </div>
     
          </div>
    </div>
   </div>
</div>
<div class="row p-4">
    <table class="table ">
        <thead class="table-primary">
          <tr>
            <th scope="col">Libro</th>
            <th scope="col">Usuario</th>
            <th scope="col">Fecha de prestamo</th>
            <th scope="col">Fecha de entrega</th>
            <th scope="col">Días de retraso</th>
          </tr>
        </thead>
        <tbody id="t-prestamo-d">
         
         
        </tbody>
    </table>
</div>

<script>


    function iniciarBusqueda() {
        document.getElementById('inicio').value = '2024-01-01';
        document.getElementById('fin').value = '2024-12-31';

        let el = document.getElementById('administrar dashboard');
        el.classList.add('active');

        
        buscar();

    }

    function buscar() {
        var url = "/dashboard/prestamo/" + document.getElementById('inicio').value + '/' + document.getElementById('fin').value ;
        
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
        document.getElementById('p-encontrados').innerHTML = data.length
        var el = document.getElementById('t-prestamo-d');
        el.innerHTML = '';
        var html = '';
        data.forEach(element => {
            html += `
            <tr clas="mt-4 mb-4">
                <th scope="row">${element.titulo}</th>
                <td>${element.usuario}</td>
                <td>${element.fecha_hora_prestamo}</td>
                <td>${element.fecha_hora_entrega}</td>
                <td>${element.diif_dias >= 0 ? '<span class="badge text-bg-danger">' + element.diif_dias + '</span>'  : '<span class="badge text-bg-primary">En tiempo</span>'}</td>
            </tr>
            
            `
        });
        el.innerHTML = html;
    }
</script>