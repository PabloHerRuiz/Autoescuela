<?php
class Dificultad{
    private $idDificultad;
    private $nombre;

    //constructor
    public function __construct($idDificultad, $nombre){
        $this->idDificultad=$idDificultad;
        $this->nombre=$nombre;
    }


    //getter y setter

    public function getIdDificultad()
    {
        return $this->idDificultad;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
}

?>