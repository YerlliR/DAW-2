<?php
include_once "Ave.php"; // Incluye la clase Ave

class Canario extends Ave {
    private $nombre;

    public function __construct() {
        parent::__construct();
    }

    public static function consSexo($sexo) {
        $canario = new self();
        $canario->sexo = $sexo;
        return $canario;
    }

    public static function consFull($sexo, $nombre) {
        $canario = new self();
        $canario->sexo = $sexo;
        $canario->nombre = $nombre;
        return $canario;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getNombre() {
        return $this->nombre ?? "";
    }

    public function pia() {
        echo "Canario " . $this->getNombre() . ": Pio pio pio<br>";
    }

    public function alimentarse() {
        echo "Canario " . $this->getNombre() . ": Estoy comiendo alpiste<br>";
    }

    public function __toString() {
        return "Soy un Animal, un Ave, en concreto un Canario, con sexo " . $this->getSexoTexto() . 
               ($this->nombre ? ", llamado " . $this->nombre : "") . "<br>";
    }
}
?>