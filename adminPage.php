<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/generalStyle.css">
    <link rel="shortcut icon" href="./assets/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Pagina de administración</title>
</head>

<body>
    <h1 class="administracion">Pagina de administración</h1>
    <footer>
        <div>
            <a href="./insertGame.php">
                <button class="green__button footer__buttons--admin">Añadir juegos <i class="fa fa-plus" aria-hidden="true"></i></button>
            </a>
        </div>
        <div>
            <a href="./updateGame.php">
                <button class="purple__button footer__buttons--admin">Actualizar juegos <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
            </a>
        </div>
        <div>
            <a href="./deleteGame.php">
                <button class="red__button footer__buttons--admin">Borrar juegos <i class="fa fa-times" aria-hidden="true"></i></button>
            </a>
        </div>
        <div>
            <a href="./libs/logout.php">
                <button class="red__button footer__buttons--admin">Cerrar sesión</button>
            </a>
        </div>
    </footer>
</body>

</html>