<main class="registro">
    <h2 class="registro__heading"><?php echo $titulo; ?></h2>
    <p class="registro__descripcion">Elige tu Plan</p>
    
    <div class="paquetes__grid">
        <div <?php aos_animacion(); ?> class="paquete">
            <h3 class="paquete_nombre">Pase Gratis</h3>
            <ul class="paquete__lista">
                <li class="paquete_elemento">Acceso Virtual a DevWebCamp</li>
                <p class="paquete__precio">$0</p>
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