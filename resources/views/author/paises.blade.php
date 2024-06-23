
<label for="pais">Seleccione un pais:</label>
<select id="author-pais" name="pais" class="form-control"></select>

<script>
  async function populateCountries() {
    const select = document.getElementById('author-pais');
    select.innerHTML = '';
    try {
    
      const response = await fetch('https://restcountries.com/v3.1/all');
      const countries = await response.json();

      countries.forEach(country => {
        const option = document.createElement('option');
        option.value = country.translations.spa.common;
        option.text = country.translations.spa.common;
        select.appendChild(option);
      });

    } catch (error) {
      console.error('Error fetching country data:', error);
    }
  }
  document.addEventListener('DOMContentLoaded', populateCountries);
</script>
