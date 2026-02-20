<?php include_once __DIR__ . '/../dashboard/header-dashboard.php' ?>

<div class="contenedor">
    <div class="contenedor-nueva-tarea">
        <button
        type="button"
        class="add-task"
        id="add-task"
        >&#43Nueva Tarea</button>
    </div>
</div>

<?php include_once __DIR__ . '/../dashboard/footer-dashboard.php' ?>

<?php  
    $script = '
        <script src="build/js/task.js"></script>
    '
?>