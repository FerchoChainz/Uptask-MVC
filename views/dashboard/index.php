<?php include_once __DIR__ . '/../dashboard/header-dashboard.php' ?>

<?php if(count($projects) === 0){ ?>
    <P class="no-projects">Aun no hay ningun proyecto creado
        <a href="/create-project">Comienza creando uno</a>
    </P>
    
<?php } else { ?>
    <ul class="projects-list">
        <?php foreach($projects as $project){ ?>

            <li class="project">
                <a href="/project?url=<?php echo $project->url ?>">
                    <?php echo $project->project ?>
                </a>
            </li>

        <?php } ?>
    </ul>
<?php } ?>

<?php include_once __DIR__ . '/../dashboard/footer-dashboard.php' ?>