(function(){
    function actualizarTotalAPagar() {
      const totalAPagarElement = document.getElementById('totalAPagar');
      const tipoEnvioSelect = document.getElementById('tipoEnvio');
      const cantidadInputs = document.querySelectorAll('.cantidad-input');
      let totalAPagar = 0;
      let total = 0;

      cantidadInputs.forEach(input => {
            const tipoEnvio = parseFloat(tipoEnvioSelect.value);
            const precio = parseFloat(input.dataset.precio);
            const cantidad = parseInt(input.value);

            if (!isNaN(precio) && !isNaN(cantidad) && !isNaN(tipoEnvio)) {

                totalAPagar += precio * cantidad;
                total = totalAPagar + tipoEnvio;
            }
      });

      totalAPagarElement.textContent = 'Total a Pagar: $' + total.toFixed(1);
  }

  const cantidadInputs = document.querySelectorAll('.cantidad-input');
  const tipoEnvioSelect = document.querySelectorAll('.formulario__input--option');
  cantidadInputs.forEach(input => {
      input.addEventListener('change', () => {
          actualizarTotalAPagar();
      });
  });  
  tipoEnvioSelect.forEach(input => {
      input.addEventListener('change', () => {
          actualizarTotalAPagar();
      });
  });  
})();