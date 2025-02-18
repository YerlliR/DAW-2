<?php
include_once "Animal.php"; // Incluye la clase Animal

class Lagarto extends Animal {
    private $nombre;

    public function __construct() {
        parent::__construct();
    }

    public static function consSexo($sexo) {
        $lagarto = new self();
        $lagarto->sexo = $sexo;
        return $lagarto;
    }

    public static function consFull($sexo, $nombre) {
        $lagarto = new self();
        $lagarto->sexo = $sexo;
        $lagarto->nombre = $nombre;
        return $lagarto;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getNombre() {
        return $this->nombre ?? "";
    }

    public function tomarSol() {
        echo "Lagarto " . $this->getNombre() . ": Estoy tomando el Sol<br>";
    }

    public function alimentarse() {
        echo "Lagarto " . $this->getNombre() . ": Estoy comiendo insectos<br>";
    }

    public function __toString() {
        return "Soy un Animal, en concreto un Lagarto, con sexo " . $this->getSexoTexto() . 
               ($this->nombre ? ", llamado " . $this->nombre : "") . "<br>";
    }
}
?>