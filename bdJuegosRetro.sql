CREATE DATABASE bdJuegosRetro;

USE bdJuegosRetro;

CREATE TABLE usuarios
(
    idUsu INT AUTO_INCREMENT,
    nomUsu VARCHAR (50),
    claveUsu VARCHAR (50),
    CONSTRAINT pk_usuarios PRIMARY KEY (idUsu)
);

CREATE TABLE juegosRetro
(
    idJue INT AUTO_INCREMENT,
    titJue VARCHAR (100),
    imgJue varchar(255) NULL,
	descJue varchar(255),
	urlJue varchar(255),
    CONSTRAINT pk_juegosRetro PRIMARY KEY (idJue)
);

CREATE TABLE juegosRetro_usuarios
(
	idUsu INT,
    idJue INT,
    CONSTRAINT pk_juegosRetro_usuarios PRIMARY KEY (idUsu, idJue),
    CONSTRAINT fk_juegosRetro_usuarios_usuarios FOREIGN KEY (idUsu) REFERENCES usuarios(idUsu)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
    CONSTRAINT fk_juegosRetro_usuarios_juegosRetro FOREIGN KEY (idJue) REFERENCES juegosRetro(idJue)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

INSERT INTO usuarios (nomUsu, claveUsu) VALUES (
    "root",
    md5("root")
),(
    "Bruxter",
    md5("elmasalto")
);

INSERT INTO juegosRetro (titJue, imgJue, descJue, urlJue)
VALUES (
    "Super Mario Bros",
    "https://images.emulatorgames.net/nintendo/super-mario-bros.webp",
    "¡Rescata a la princesa Peach y salva al reino champiñon de las garras del malvado rey Bowser en este clasico plataformero!",
    "https://www.emulatorgames.net/download/?rom=super-mario-bros"
),(
    "The Legend of Zelda",
    "https://images.emulatorgames.net/nintendo/zelda-the-legend-of-zelda.webp",
    "Cumple con tu destino y salva a Hyrule del poder sombrio de rey demonio Ganon junto con la princesa Zelda.",
    "https://www.emulatorgames.net/download/?rom=zelda-the-legend-of-zelda"
),(
    "Kirby's Adventure",
    "https://images.emulatorgames.net/nintendo/kirby-s-adventure.webp",
    "¡Absorve de todo en este divertidisimo juego de plataformas! ¡Y ayuda a Kirby a detener al Rey Dedede!",
    "https://www.emulatorgames.net/download/?rom=kirbys-adventure"
),(
    "Metroid",
    "https://images.emulatorgames.net/nintendo/metroid.webp",
    "¡Ayuda a la cazarecompensas Samus Aran y adentrarte hasta las profundidades del planeta Zebes para eliminar al líder de los Piratas Espaciales y traer la paz a la galaxia!",
    "https://www.emulatorgames.net/download/?rom=metroid"
),(
    "Tetris",
    "https://images.emulatorgames.net/nintendo/tetris.webp",
    "¡Posiciona bloques con estrategia y consigue la mayor puntuación en este clasico de la NES!",
    "https://www.emulatorgames.net/download/?rom=tetris"
),(
    "Sonic the Hedgehog",
    "https://images.emulatorgames.net/sega-genesis/sonic-the-hedgehog-jue.webp",
    "¡Corre a toda velocidad para detener al malvado doctor Robotnick y salvar a los indefensos animalitos de South Island!",
    "https://www.emulatorgames.net/download/?rom=sonic-the-hedgehog-jue"
),(
    "Pacman",
    "https://images.emulatorgames.net/mame-037b11/pacman.webp",
    "¡Atiborrate de puntos y evita a los fantamas en este clasico para recreativas!",
    "https://www.emulatorgames.net/download/?rom=pacman"
),(
    "Contra",
    "https://images.emulatorgames.net/nintendo/contra.webp",
    "¡Ayuda a Bill Rizer y Lance Bean a detener a la malvada Organización Red Falcon disparando a lo loco por la selva!",
    "https://www.emulatorgames.net/download/?rom=contra"
),(
    "Castelvania",
    "https://images.emulatorgames.net/nintendo/castlevania.webp",
    "Ayuda al cazavampiros Simon Belmont a detener al malvado Dracula y devolver a los no muertos a su tumba.",
    "https://www.emulatorgames.net/download/?rom=castlevania"
),(
    "Punch Out",
    "https://images.emulatorgames.net/nintendo/nude-punch-out-hack.webp",
    "Conviertete en el campeon de la W.V.B.A y enfrentate a Mike Tyson en un conbate de ensueño.",
    "https://www.emulatorgames.net/download/?rom=nude-punch-out-hack"
);