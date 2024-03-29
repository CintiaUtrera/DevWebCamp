<main class="registro">
    <h2 class="registro__heading"><?php echo $titulo; ?></h2>
    <p class="registro__descripcion">Elige tu Plan</p>

    <div class="paquetes__grid">
        <div <?php aos_animacion(); ?> class="paquete">
            <h3 class="paquete_nombre">Pase Gratis</h3>
            <ul class="paquete__lista">
                <li class="paquete_elemento">Acceso Virtual a DevWebCamp</li>
                <p class="paquete__precio">$0</p>

                <form method="POST" action="/finalizar-registro/gratis" >
                    <input type="submit" class="paquetes__submit" value="Inscripción Gratis" />
                </form>
            </ul>
        </div>

        <div <?php aos_animacion(); ?> class="paquete">
            <h3 class="paquete_nombre">Pase Presencial</h3>
            <ul class="paquete__lista">
                <li class="paquete_elemento">Acceso Presencial a DevWebCamp</li>
                <li class="paquete_elemento">Pase por 2 días</li>
                <li class="paquete_elemento">Acceso a talleres y conferencias</li>
                <li class="paquete_elemento">Acceso a Grabaciones</li>
                <li class="paquete_elemento">Camisa del evento</li>
                <li class="paquete_elemento">Comida y Bebida</li>
                <p class="paquete__precio">$2000</p>
            </ul>

            <div id="smart-button-container">
                <div style="text-align: center;">
                    <div id="paypal-button-container"></div>
                </div>
            </div>
        </div>

        <div <?php aos_animacion(); ?> class="paquete">
            <h3 class="paquete_nombre">Pase Virtual</h3>
            <ul class="paquete__lista">
                <li class="paquete_elemento">Acceso Virtual a DevWebCamp</li>
                <li class="paquete_elemento">Pase por 2 días</li>
                <li class="paquete_elemento">Acceso a talleres y conferencias</li>
                <li class="paquete_elemento">Acceso a Grabaciones</li>
                
                <p class="paquete__precio">$1000</p>
            </ul>
        </div>

    </div>
</main>


<script src="https://www.paypal.com/sdk/js?client-id=AdbomR8r-nX7Uw6ROhWaD56wh3R0syXddGCqglPTgmHMBxUhcRHxLCTkfd4X3KeE90FMGHqh8y5Q7ETz&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
 
<script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'blue',
          layout: 'vertical',
          label: 'pay',
        },
 
        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"description":"1","amount":{"currency_code":"USD","value":2000}}]
          });
        },
 
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
 
            const datos = new FormData();
            datos.append('paquete_id', orderData.purchase_units[0].description);
            datos.append('pago_id', orderData.purchase_units[0].payments.captures[0].id);

            fetch('/finalizar-registro/pagar', {
              method: 'POST',
              body: datos
            })
            .then( respuesta => respuesta.json())
            .then( resultado => {
              if(resultado.resultado){
                actions.redirect('http://localhost:3000/finalizar-registro/conferencias');
              }
            })

          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }

  initPayPalButton();
</script>
