<?php

    /**
     * Desarrollo web en Entorno Servidor
     * curso 2024|25
     * 
     * @author Antonio J. Sánchez
     */

    require_once "./clases/Pelicula.php" ;

    # Array de películas y series
    $datos = [

        new Pelicula(
            "Interestellar",
            "https://m.media-amazon.com/images/M/MV5BYzdjMDAxZGItMjI2My00ODA1LTlkNzItOWFjMDU5ZDJlYWY3XkEyXkFqcGc@._V1_FMjpg_UY3600_.jpg",
            "Max",
            8.7,
            "Un equipo de exploradores viaja a través de un agujero de gusano en el espacio en un intento de garantizar la supervivencia de la humanidad."
        ),
        new Pelicula(
            "Deadpool y Lobezno",
            "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/9TFSqghEHrlBMRR63yTx80Orxva.jpg",
            "Disney +",
            7.7,
            "Un apático Wade Wilson se afana en la vida civil tras dejar atrás sus días como Deadpool, un mercenario moralmente flexible. Pero cuando su mundo natal se enfrenta a una amenaza existencial, Wade debe volver a vestirse a regañadientes con un Lobezno aún más reacio a ayudar."
        ),
        new Pelicula(
            "Agatha, ¿quién si no?",
            "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/sCCxIHlXRXPABbJ4JVMOi7RhQmq.jpg",
            "Disney +",
            7.5,
            "Agatha Harkness reúne un aquelarre de brujas y parte hacia la Senda de las Brujas."
        ),
        new Pelicula(
            "Frasier",
            "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/gYAb6GCVEFsU9hzMCG5rxaxoIv3.jpg",
            "Sky Showtime",
            7.7,
            "El doctor Frasier Crane es un estirado psiquiatra que, tras su divorcio, se traslada de Boston a Seattle para llevar un programa-consultorio de radio. Nada más llegar, se entera de que tiene que vivir con su padre, un gruñón expolicía lisiado en acto de servicio. Frasier queda con frecuencia con su hermano (también psiquiatra, y todavía mucho más snob), con el que tiene conversaciones muy peculiares sobre arte, mujeres y la vida en general. En la vida de Frasier sólo hay dos mujeres estables: su asistenta, una inglesa muy deseada su hermano; y la directora de su programa, una soltera desesperada por tener novio."
        ),
        new Pelicula(
            "Downton Abbey",
            "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/7HgDYRYjym4BwbhKaqTQq771SKb.jpg",
            "Netflix",
            8.1,
            "Serie británica que se desarrolla en el año 1912, durante el reinado de Jorge V, y que retrata a la sociedad aristocrática de aquella época y sus litigios para ganar o mantener sus títulos nobiliarios."
        ),
        new Pelicula(
            "Lo que hacemos en las sombras",
            "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/5C9fDLP6N9595ENLvrOBOfo4T2Z.jpg",
            "Max",
            8.0,
            "Ambientada en Nueva York, sigue a tres vampiros que han sido compañeros de piso durante cientos y cientos de años, y cuenta sus experiencias en ese periodo."
        ),
        new Pelicula(
            "La maldición de Hill House",
            "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/flBIpQHga5217QgLE4BanIAzMix.jpg",
            "Netflix",
            8.0,
            "Un grupo de hermanos que, cuando eran niños, crecieron en lo que luego se convertiría en la casa embrujada más famosa del país. Ahora adultos, y forzados a volver a estar juntos frente a la tragedia, la familia finalmente debe enfrentarse a los fantasmas de su pasado — algunos de los cuales aún acechan en sus mentes, mientras que otros pueden acechar en las sombras."
        ),
        new Pelicula(
            "Cobra Kai",
            "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/gAVLXz0vpqSbT1iv2ijSC2FY6B9.jpg",
            "Netflix",
            8.2,
            "Enemigos acérrimos. Dojos rivales. Sangre fresca. En esta secuela de las películas de ‘Karate Kid’, Daniel y Johnny reavivan viejas rencillas en el West Valley."
        ),
        new Pelicula(
            "Stranger Things",
            "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/wHhjZMlYGT9yUEyGpP9jmR6Jq3I.jpg",
            "Netflix",
            8.6,
            "A raíz de la desaparición de un niño, un pueblo desvela un misterio relacionado con experimentos secretos, fuerzas sobrenaturales aterradoras y una niña muy extraña."
        ),
        new Pelicula(
            "Gru 4. Mi villano favorito",
            "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/wTpzSDfbUuHPEgqgt5vwVtPHhrb.jpg",
            "Amazon Prime",
            7.2,
            "Gru, Lucy y las niñas -Margo, Edith y Agnes- dan la bienvenida a un nuevo miembro en la familia: Gru Junior, que parece llegar con el propósito de ser un suplicio para su padre. Gru tendrá que enfrentarse en esta ocasión a su nueva némesis Maxime Le Mal y su sofisticada y malévola novia Valentina, lo que obligará a la familia a tener que darse a la fuga. Cuarta entrega de 'Gru, mi villano favorito'."
        ),
        new Pelicula(
            "Inception",
            "https://image.tmdb.org/t/p/original/tXQvtRWfkUUnWJAn2tN3jERIUG.jpg",
            "Amazon Prime Video",
            "8.8",
            "Dom Cobb (DiCaprio) es un especialista en sustraer información del subconsciente de las personas a través de sus sueños."
        ),
        new Pelicula(
            "The Matrix",
            "https://image.tmdb.org/t/p/original/qK76PKQLd6zlMn0u83Ej9YQOqPL.jpg",
            "HBO Max",
            "8.7",
            "Thomas Anderson es un brillante programador de una respetable compañía de software. Pero fuera del trabajo es Neo, un hacker que un día recibe una misteriosa visita."
        ),
        new Pelicula(
            "The Dark Knight",
            "https://image.tmdb.org/t/p/original/8QDQExnfNFOtabLDKqfDQuHDsIg.jpg",
            "HBO Max",
            "9.0",
            "Batman se enfrenta al Joker, un criminal psicópata que quiere sumir a Gotham en la anarquía."
        ),
        new Pelicula(
            "Pulp Fiction",
            "https://image.tmdb.org/t/p/original/1yWmCAIGSVNuTOGyz9F48W9g1Ux.jpg",
            "Netflix",
            "8.9",
            "Las vidas de dos sicarios, un boxeador, la esposa de un gánster y dos bandidos se entrelazan en cuatro historias de violencia y redención."
        ),
        new Pelicula(
            "Fight Club",
            "https://image.tmdb.org/t/p/original/hNcQAuquJxTxl2fJFs1R42DrWcf.jpg",
            "Amazon Prime Video",
            "8.8",
            "Un oficinista insomne y un vendedor de jabón forman un club de lucha clandestino que se convierte en algo mucho más."
        ),
        new Pelicula(
            "Forrest Gump",
            "https://image.tmdb.org/t/p/original/oiqKEhEfxl9knzWXvWecJKN3aj6.jpg",
            "Netflix",
            "8.8",
            "La vida de Forrest Gump, un hombre con un coeficiente intelectual bajo, que presencia y participa en algunos de los eventos más importantes de la historia de EE.UU."
        ),
        new Pelicula(
            "The Shawshank Redemption",
            "https://image.tmdb.org/t/p/original/uRRTV7p6l2ivtODWJVVAMRrwTn2.jpg",
            "HBO Max",
            "9.3",
            "Dos hombres encarcelados forjan una amistad a lo largo de varios años, encontrando consuelo y redención a través de actos de decencia común."
        ),
        new Pelicula(
            "The Godfather",
            "https://image.tmdb.org/t/p/original/ApiEfzSkrqS4m1L5a2GwWXzIiAs.jpg",
            "Amazon Prime Video",
            "9.2",
            "El envejecido patriarca de una dinastía criminal traslada el control de su imperio clandestino a su hijo reacio."
        ),
        new Pelicula(
            "The Lord of the Rings: The Return of the King",
            "https://image.tmdb.org/t/p/original/mWuFbQrXyLk2kMBKF9TUPtDwuPx.jpg",
            "HBO Max",
            "8.9",
            "Gandalf y Aragorn lideran el Mundo de los Hombres contra el ejército de Sauron para distraerlo mientras Frodo y Sam se acercan al Monte del Destino con el Anillo Único."
        ),
        new Pelicula(
            "Breaking Bad",
            "https://image.tmdb.org/t/p/original/ggFHVNu6YYI5L9pCfOacjizRGt.jpg",
            "Netflix",
            "9.5",
            "Un profesor de química de secundaria convertido en fabricante de metanfetaminas se asocia con un exalumno para asegurar el futuro de su familia."
        ),
        new Pelicula(
            "Game of Thrones",
            "https://image.tmdb.org/t/p/original/u3bZgnGQ9T01sWNhyveQz0wH0Hl.jpg",
            "HBO Max",
            "9.3",
            "Nueve familias nobles luchan por el control de la mítica tierra de Westeros mientras una antigua enemiga regresa después de estar ausente durante miles de años."
        ),
        new Pelicula(
            "Stranger Things",
            "https://image.tmdb.org/t/p/original/x2LSRK2Cm7MZhjluni1msVJ3wDF.jpg",
            "Netflix",
            "8.7",
            "Cuando un niño desaparece, su madre, un jefe de policía y sus amigos deben enfrentar fuerzas terroríficas para recuperarlo."
        ),
        new Pelicula(
            "The Witcher",
            "https://image.tmdb.org/t/p/original/1qIBNFEHRxcs1nV4YpN8kJXb1eW.jpg",
            "Netflix",
            "8.2",
            "Geralt de Rivia, un cazador de monstruos mutado para ganar poderes sobrenaturales, lucha por encontrar su lugar en un mundo donde las personas son a menudo más crueles que las bestias."
        ),
        new Pelicula(
            "The Mandalorian",
            "https://image.tmdb.org/t/p/original/sWgBv7LV2PRoQgkxwlibdGXKz1S.jpg",
            "Disney+",
            "8.8",
            "Después de las historias de Jango y Boba Fett, otro guerrero emerge en el universo de Star Wars. El Mandaloriano sigue a un pistolero solitario en los confines de la galaxia, lejos de la autoridad de la Nueva República."
        )

    ];
    
