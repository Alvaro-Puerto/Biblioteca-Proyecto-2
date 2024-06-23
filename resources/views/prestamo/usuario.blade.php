
<label for="prestamo">Selecciona un usuario:</label>
<select id="prestamo-usuario" name="usuario_id" class="js-example-basic-single" style="width: 480px"></select>

<script>
  async function populateCountries() {
    const select = document.getElementById('prestamo-usuario');
    select.innerHTML = '';
    try {
    
      const response = await fetch('usuario/json/get');
      const categorias = await response.json();

       const option = document.createElement('option');
      option.value = '';
      option.text = '';
      select.appendChild(option);


      categorias.forEach(categoria => {
        const option = document.createElement('option');
        option.value = categoria.id;
        option.text = categoria.nombres + ' ' + categoria.apellidos;
        select.appendChild(option);
      });
    } catch (error) {
      console.error('Error fetching country data:', error);
    }
  }
  document.addEventListener('DOMContentLoaded', populateCountries);
</script>
