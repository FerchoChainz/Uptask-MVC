<?php include_once __DIR__ . '/../dashboard/header-dashboard.php' ?>

 
<div class="contenedor-sm">
    <?php include_once __DIR__ . '/../templates/alerts.php' ?>


    <form method="POST" action="/create-project" class="formulario">

        <?php include_once __DIR__ . '/project-form.php' ?>

        <input type="submit" value="Crear Proyecto" name="" id="">
    </form>
</div>

<?php include_once __DIR__ . '/../dashboard/footer-dashboard.php' ?>