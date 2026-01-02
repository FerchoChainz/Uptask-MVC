<div class="contenedor recover">
    
<?php include_once __DIR__ . '/../templates/site-name.php'?>



<div class="contenedor-sm">
    <?php include_once __DIR__ . '/../templates/alerts.php' ?>
    <?php if($error) return null ?>
    <p class="descripcion-pagina">Coloca tu nuevo password</p>

        <form  class="formulario" method="POST">
            <div class="campo">
                <label for="password">Password</label>
                <input type="password"
                    id="password"
                    placeholder="Tu password"
                    name="password"
                    
                    >
            </div>

            <input type="submit" class="boton" value="Guardar Password">
        </form>

        <div class="acciones">
            <a href="/create">¿Aun no tienes una cuenta? Crea una.</a>
            <a href="/forget">¿Olvidaste tu password?</a>
        </div>

    </div> <!-- contenedor sm -->
</div>