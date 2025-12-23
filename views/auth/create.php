<div class="contenedor crear">
    
    <?php include_once  __DIR__ .'/../templates/site-name.php'?> 

    <div class="contenedor-sm">
        <p class="descripcion-pagina">Crea tu cuenta en Uptask</p>

        <form action="/" class="formulario" method="POST">
            <div class="campo">
                <label for="nombre">Nombre</label>
                <input type="text"
                    id="nombre"
                    placeholder="Tu Nombre"
                    name="nombre"
                    
                    >
            </div>

        
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

            <div class="campo">
                <label for="password2">Repetir Password</label>
                <input type="password"
                    id="password2"
                    placeholder="Repite tu password"
                    name="password2"
                    
                    >
            </div>

            <input type="submit" class="boton" value="Crear Cuenta">
        </form>

        <div class="acciones">
            <a href="/create">¿Ya tienes una cuenta? Incia Sesion.</a>
            <a href="/forget">¿Olvidaste tu password?</a>
        </div>

    </div> <!-- contenedor sm -->
</div>