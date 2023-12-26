<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>
    <p class="auth__texto">Recupera tu acceso a DevWebCamp</p>

    <form class="formulario" action="">
        <div class="formulario__campo">
            <label for="email" class="formulario__label">Email</label>
            <input type="email" class="formulario__input"  id="email" name="email" />
        </div>
        
        <input type="submit" class="formulario__submit" value="Enviar instrucciones">
    </form>

    <div class="acciones">
        <a href="/login" class="acciones__enlace">¿Ya tienes cuenta? Iniciar sesión</a>
        <a href="/registrar" class="acciones__enlace">¿Aún no tienes un cuenta? Obtener una</a>
    </div>

</main>