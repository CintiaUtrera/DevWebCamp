<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>
    <p class="auth__texto">Coloca tu Nuevo Password</p>

    <?php require_once __DIR__ . '/../templates/alertas.php'; ?>

    <?php if($token_valido) { ?>
    <form class="formulario" method="POST">
        <div class="formulario__campo">
            <label for="password" class="formulario__label">Nuevo Password</label>
            <input type="password" class="formulario__input"  id="password" name="password" />
        </div>
        
        <input type="submit" class="formulario__submit" value="Guardar Password">
    </form>

    <?php } ?>

    <div class="acciones">
        <a href="/login" class="acciones__enlace">¿Ya tienes cuenta? Iniciar sesión</a>
        <a href="/registrar" class="acciones__enlace">¿Aún no tienes un cuenta? Obtener una</a>
    </div>

</main>