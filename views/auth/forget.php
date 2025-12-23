<div class="contenedor olvide">

    <?php include_once  __DIR__ . '/../templates/site-name.php' ?>

    <div class="contenedor-sm">
        <p class="descripcion-pagina">Crea tu cuenta en Uptask</p>
        <form action="/" class="formulario" method="POST">

            <div class="campo">
                <label for="email">Email</label>
                <input type="email"
                    id="email"
                    placeholder="Tu correo"
                    name="email">
            </div>

            <input type="submit" class="boton" value="Enviar Instrucciones">
        </form>

        <div class="acciones">
            <a href="/">¿Ya tienes una cuenta? Incia Sesion.</a>
            <a href="/create">Aun no tienes una cuenta? Crea una.</a>
        </div>

    </div> <!-- contenedor sm -->
</div>