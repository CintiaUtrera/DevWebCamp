<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Evento</legend>

    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre Evento</label>
        <input type="text" class="formulario__input" id="nombre" name="nombre"  value="<?php echo $ponente->nombre ?? ''; ?>" />
    </div>

    <div class="formulario__campo">
        <label for="descripcion" class="formulario__label">Descripción</label>
        <textarea class="formulario__input" id="descripcion" name="descripcion" rows="6" value="<?php echo $ponente->nombre ?? ''; ?>"></textarea>
    </div>

    <div class="formulario__campo">
        <label for="categoria" class="formulario__label">Categoría o Tipo de Evento</label>
        <select class="formulario__select" name="categoria_id" id="categoria">
            <option value="">- Seleccionar -</option>
            <?php foreach($categorias as $categoria) { ?>
                <option value="<?php echo $categoaria->id; ?>"><?php echo $categoria->nombre; ?></option>
            <?php } ?>
        </select>
    </div>



</fieldset>