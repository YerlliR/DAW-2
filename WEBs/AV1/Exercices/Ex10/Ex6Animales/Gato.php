<?php
include_once "Mamifero.php"; // Incluye la clase Mamifero

class Gato extends Mamifero {
    private $nombre;
    private $raza;

    public function __construct() {
        parent::__construct();
        $this->raza = "";
    }

    public static function consSexoNombre($sexo, $nombre) {
        $gato = new self();
        $gato->sexo = $sexo;
        $gato->nombre = $nombre;
        return $gato;
    }

    public static function consFull($sexo, $nombre, $raza) {
        $gato = new self();
        $gato->sexo = $sexo;
        $gato->nombre = $nombre;
        $gato->raza = $raza;
        return $gato;
    }

    public function getNombre() {
        return $this->nombre ?? "";
    }

    public function maulla() {
        echo "Gato " . $this->getNombre() . ": Miauuuu<br>";
    }

    public function alimentarse() {
        echo "Gato " . $this->getNombre() . ": Estoy comiendo pescado<br>";
    }

    public function __toString() {
        return "Soy un Animal, un Mamífero, en concreto un Gato, con sexo " . $this->getSexoTexto() . 
               ", raza " . $this->raza . ($this->nombre ? " y mi nombre es " . $this->nombre : " y no tengo nombre") . "<br>";
    }
}
?>