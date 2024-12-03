<?php

    /**
     * Desarrollo web en Entorno Servidor
     * curso 2024|25
     * 
     * @author Antonio J. Sánchez
     */


    function mostrar($pelicula) {
return<<<EOD

    <div class="item">
        <img src="{$pelicula->poster}" />
        <h2>{$pelicula->titulo}</h2>
        <h5>{$pelicula->nota}</h5>
        <p>{$pelicula->argumento}</p>        
    </div>
    
EOD;
    }
        