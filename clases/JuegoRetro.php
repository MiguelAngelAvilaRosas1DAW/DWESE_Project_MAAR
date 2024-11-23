<?php

class JuegoRetro{

    private int $idJue;
    private string $titJue;
    private string $imgJue;
    private string $descJue;
    private string $urlJue;

    /**
     * @param array $juegos
     */
    public function __construct(array $juegos)
    {
        $this->idJue = $juegos["idJue"];
        $this->titJue = $juegos["titJue"];
        $this->imgJue = $juegos["imgJue"];
        $this->descJue = $juegos["descJue"];
        $this->urlJue = $juegos["urlJue"];
    }

    /**
     * @return string
     */
    public function getIdJue(): string{
        return $this->idJue;
    }

    /**
     * @return string
     */
    public function getTitulo(): string {
        return $this->titJue;
    }

    /**
     * @return string
     */
    public function getEnlace(): string {
        return $this->urlJue;
    }

    /**
     * Contenido de la card de cada juego
     * @return string
     */
    public function __toString()
    {
        return "<div class=\"grid2Games gameContent\">
                        <div>
                            <img src=\"{$this->imgJue}\" alt=\"Poster de {$this->titJue}\" /><br/><br/>
                        </div>
                        <div>
                            <h1>{$this->titJue}</h1><br/>
                            <p>{$this->descJue}</p><br/>
                        </div>";
    }
}
