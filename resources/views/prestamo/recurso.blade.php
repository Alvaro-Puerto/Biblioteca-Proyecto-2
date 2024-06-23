
<label for="prestamo">Selecciona un recurso:</label>
<select id="prestamo-recurso" name="recurso_id" class="js-example-basic-single" style="width: 480px;"></select>

<script>
   
  async function populateCountries() {
   
    const select = document.getElementById('prestamo-recurso');
    select.innerHTML = '';
    try {
    
      const response = await fetch('recurso/json/get');
      const categorias = await response.json();

      const option = document.createElement('option');
      option.value = '';
      option.text = '';
      select.appendChild(option);

      categorias.forEach(categoria => {
        const option = document.createElement('option');
        option.value = categoria.id;
        option.text = categoria.titulo;
        select.appendChild(option);
      });
    } catch (error) {
      console.error('Error fetching country data:', error);
    }
  }
  document.addEventListener('DOMContentLoaded', populateCountries);


</script>
