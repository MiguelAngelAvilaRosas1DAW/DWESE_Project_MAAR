<?php
    # recuperamos el usuario de la sesión.
    require_once "./clases/Usuario.php" ;
    $usuario = unserialize($_SESSION["_usuario"]) ;
?>
<nav>
    <div class="row mt-4">
        <div class="col-sm-1">
            <img class="profile" src="<?= $usuario->getFoto() ?>" />    
        </div>
        <div class="col">
            <h2>Bienvenido/a, <?= $usuario ?></h2>

            <div class="row">
                <div class="col-sm-2">
                    <a href="crear.php">Añadir película</a>
                </div>
                <div class="col-sm-2">
                    <a href="perfil.php">Perfil</a>
                </div>
                <div class="col-sm-2">
                    <a href="logout.php">Cerrar sesion</a>
                </div>
            </div>

        </div>
    </div>
    
</nav>