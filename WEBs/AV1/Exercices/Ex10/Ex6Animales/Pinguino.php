<?php
include_once "Ave.php"; // Incluye la clase Ave

class Pinguino extends Ave {
    private $nombre;

    public function __construct() {
        parent::__construct();
    }

    public static function consSexo($sexo) {
        $pinguino = new self();
        $pinguino->sexo = $sexo;
        return $pinguino;
    }

    public static function consFull($sexo, $nombre) {
        $pinguino = new self();
        $pinguino->sexo = $sexo;
        $pinguino->nombre = $nombre;
        return $pinguino;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getNombre() {
        return $this->nombre ?? "";
    }

    public function programar() {
        echo "Pingüino " . $this->getNombre() . ": Soy un pingüino programando en PHP<br>";
    }

    public function alimentarse() {
        echo "Pingüino " . $this->getNombre() . ": Estoy comiendo peces<br>";
    }

    public function __toString() {
        return "Soy un Animal, un Ave, en concreto un Pingüino, con sexo " . $this->getSexoTexto() . 
               ($this->nombre ? ", llamado " . $this->nombre : "") . "<br>";
    }
}
?>