
<label for="editorial">Selecciona una editorial:</label>
<select id="recurso-editorial-editar" name="editorial_id" class="form-control"></select>

<script>
  async function populateCountries() {
    const select = document.getElementById('recurso-editorial-editar');
    select.innerHTML = '';
    try {
    
      const response = await fetch('editorial/json/get');
      const editorials = await response.json();

      editorials.forEach(editorial => {
        const option = document.createElement('option');
        option.value = editorial.id;
        option.text = editorial.nombre;
        select.appendChild(option);
      });

    } catch (error) {
      console.error('Error fetching country data:', error);
    }
  }
  document.addEventListener('DOMContentLoaded', populateCountries);
</script>
