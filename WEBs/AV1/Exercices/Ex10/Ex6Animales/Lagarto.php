<?php
require_once "Animal.php";

// Clase Lagarto que extiende de la clase Animal
class Lagarto extends Animal {
    // Propiedad privada para almacenar el nombre del lagarto
    private $nombre;

    // Constructor de la clase Lagarto
    public function __construct() {
        parent::__construct();
    }

    // Método estático para construir un Lagarto con un sexo específico
    public static function consSexo($sexo) {
        $lagarto = new self();
        $lagarto->sexo = $sexo;
        return $lagarto;
    }

    // Método estático para construir un Lagarto con un sexo y nombre específicos
    public static function consFull($sexo, $nombre) {
        $lagarto = new self();
        $lagarto->sexo = $sexo;
        $lagarto->nombre = $nombre;
        return $lagarto;
    }

    // Método para establecer el nombre del lagarto
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    // Método para obtener el nombre del lagarto
    public function getNombre() {
        return $this->nombre ?? "";
    }

    // Método para simular que el lagarto está tomando el sol
    public function tomarSol() {
        echo "Lagarto " . $this->getNombre() . ": Estoy tomando el Sol<br>";
    }

    // Método para simular que el lagarto se está alimentando
    public function alimentarse() {
        echo "Lagarto " . $this->getNombre() . ": Estoy comiendo insectos<br>";
    }

    // Método mágico __toString para representar el objeto Lagarto como una cadena
    public function __toString() {
        return parent::__toString() . ", en concreto un Lagarto" . 
               ($this->nombre ? ", llamado " . $this->nombre : "") . "<br>";
    }
}
