<?php
require_once 'Mamifero.php';

// Clase Perro que extiende de Mamifero
class Perro extends Mamifero {
    private $nombre; // Nombre del perro
    private $raza;   // Raza del perro

    // Constructor por defecto, inicializa la raza a "teckel"
    public function __construct() {
        parent::__construct();
        $this->raza = "teckel";
    }

    // Constructor estático que crea un Perro con sexo y nombre
    public static function consSexoNombre($sexo, $nombre) {
        $perro = new self();
        $perro->sexo = $sexo;
        $perro->nombre = $nombre;
        return $perro;
    }

    // Constructor estático que crea un Perro con sexo, nombre y raza
    public static function consFull($sexo, $nombre, $raza) {
        $perro = new self();
        $perro->sexo = $sexo;
        $perro->nombre = $nombre;
        $perro->raza = $raza;
        return $perro;
    }

    // Método para obtener el nombre del perro
    public function getNombre() {
        return $this->nombre ?? "";
    }

    // Método para simular el ladrido del perro
    public function ladra() {
        echo "Perro " . $this->getNombre() . ": Guau guau<br>";
    }

    // Método para simular la alimentación del perro
    public function alimentarse() {
        echo "Perro " . $this->getNombre() . ": Estoy comiendo carne<br>";
    }

    // Método mágico __toString para representar el objeto como una cadena
    public function __toString() {
        return parent::__toString() . ", en concreto un Perro, con raza " . $this->raza . 
               ($this->nombre ? " y mi nombre es " . $this->nombre : " y no tengo nombre") . "<br>";
    }
}