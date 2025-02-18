<?php
include_once "Mamifero.php"; // Incluye la clase Mamifero

class Perro extends Mamifero {
    private $nombre;
    private $raza;

    public function __construct() {
        parent::__construct();
        $this->raza = "teckel";
    }

    public static function consSexoNombre($sexo, $nombre) {
        $perro = new self();
        $perro->sexo = $sexo;
        $perro->nombre = $nombre;
        return $perro;
    }

    public static function consFull($sexo, $nombre, $raza) {
        $perro = new self();
        $perro->sexo = $sexo;
        $perro->nombre = $nombre;
        $perro->raza = $raza;
        return $perro;
    }

    public function getNombre() {
        return $this->nombre ?? "";
    }

    public function ladra() {
        echo "Perro " . $this->getNombre() . ": Guau guau<br>";
    }

    public function alimentarse() {
        echo "Perro " . $this->getNombre() . ": Estoy comiendo carne<br>";
    }

    public function __toString() {
        return "Soy un Animal, un Mamífero, en concreto un Perro, con sexo " . $this->getSexoTexto() . 
               ", raza " . $this->raza . ($this->nombre ? " y mi nombre es " . $this->nombre : " y no tengo nombre") . "<br>";
    }
}
?>