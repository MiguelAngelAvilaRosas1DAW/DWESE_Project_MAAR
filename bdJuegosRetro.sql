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
    imgJue varchar(500),
	descJue varchar(1000),
	urlJue varchar(500),
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
    "Bruxter",
    "elmasalto"
);

INSERT INTO juegosRetro (titJue, imgJue, descJue, urlJue)
VALUES (
    "Super Mario Bros",
    "https://images.emulatorgames.net/nintendo/super-mario-bros.webp",
    "¡Rescata a la princesa Peach y salva al reino champiñon de las garras del malvado rey Bowser en este clasico plataformero!",
    "https://www.emulatorgames.net/roms/nintendo/super-mario-bros/"
),(
    "The Legend of Zelda",
    "https://images.emulatorgames.net/nintendo/zelda-the-legend-of-zelda.webp",
    "Cumple con tu destino y salva a Hyrule del poder sombrio de rey demonio Ganon junto con la princesa Zelda.",
    "https://www.emulatorgames.net/roms/nintendo/zelda-the-legend-of-zelda/"
),(
    "Kirby's Adventure",
    "https://images.emulatorgames.net/nintendo/kirby-s-adventure.webp",
    "¡Absorve de todo en este divertidisimo juego de plataformas! ¡Y ayuda a Kirby a detener al Rey Dedede!",
    "https://www.emulatorgames.net/roms/nintendo/kirbys-adventure/"
),(
    "Sonic the Hedgehog",
    "https://images.emulatorgames.net/sega-genesis/sonic-the-hedgehog-jue.webp",
    "¡Corre a toda velocidad para detener al malvado doctor Robotnick y salvar a los indefensos animalitos de South Island!",
    "https://www.emulatorgames.net/roms/sega-genesis/sonic-the-hedgehog-jue/"
),(
    "Castelvania",
    "https://images.emulatorgames.net/nintendo/castlevania.webp",
    "Ayuda al cazavampiros Simon Belmont a detener al malvado Dracula y devolver a los no muertos a su tumba.",
    "https://www.emulatorgames.net/roms/nintendo/castlevania/"
),(
    "Punch Out",
    "https://images.emulatorgames.net/nintendo/nude-punch-out-hack.webp",
    "Conviertete en el campeon de la W.V.B.A y enfrentate a Mike Tyson en un conbate de ensueño.",
    "https://www.emulatorgames.net/roms/nintendo/nude-punch-out-hack/"
);