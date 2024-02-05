<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>
<div class="dashboard__contenedor--boton">
    <a class="dashboard__boton" href="/admin/eventos/crear">
        <i class="fa-solid fa-circle-plus"></i> Añadir Evento
    </a>
</div>

<div class="dashboard__contenedor">
    <?php if(!empty($eventos)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th class="table__th" scope="col">Evento</th>
                    <th class="table__th" scope="col">Categoría</th>
                    <th class="table__th" scope="col">Dia - Hora</th>
                    <th class="table__th" scope="col">Ponente</th>
                </tr>
            </thead>
            <tbody class="table__tbody">
                <?php foreach($eventos as $evento) { ?>
                    <tr class="table__tr">
                        <td class="table__td"><?php echo $evento->nombre; ?></td>
                        
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    <?php } else { ?>
        <p class="text-center">No hay Eventos Aún</p>
    <?php } ?>
</div>


<?php  echo $paginacion;


?>