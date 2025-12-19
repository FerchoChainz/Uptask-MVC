<div class="contenedor login">
    <h1 class="uptask">Uptask</h1>
    <p class="tagline">Crea y Administra tus proyectos</p>


    <div class="contenedor-sm">
        <p class="descripcion-pagina">Iniciar Sesion</p>

        <form action="/" class="formulario" method="POST">
            <div class="campo">
                <label for="email">Email</label>
                <input type="email"
                    id="email"
                    placeholder="Tu correo"
                    name="email"
                    
                    >
            </div>
            <div class="campo">
                <label for="password">Password</label>
                <input type="password"
                    id="password"
                    placeholder="Tu password"
                    name="password"
                    
                    >
            </div>

            <input type="submit" class="boton" value="Iniciar Sesion">
        </form>

        <div class="acciones">
            <a href="/create">¿Aun no tienes una cuenta? Crea una.</a>
            <a href="/forget">¿Olvidaste tu password?</a>
        </div>

    </div> <!-- contenedor sm -->
</div>