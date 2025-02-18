<?php
require_once "Ave.php";

// Clase Canario que extiende de la clase Ave
class Canario extends Ave {
    private $nombre; // Nombre del canario

    // Constructor de la clase Canario
    public function __construct() {
        parent::__construct(); // Llama al constructor de la clase padre Ave
    }

    // Método estático para construir un Canario con un sexo específico
    public static function consSexo($sexo) {
        $canario = new self();
        $canario->sexo = $sexo;
        return $canario;
    }

    // Método estático para construir un Canario con un sexo y nombre específicos
    public static function consFull($sexo, $nombre) {
        $canario = new self();
        $canario->sexo = $sexo;
        $canario->nombre = $nombre;
        return $canario;
    }

    // Establece el nombre del canario
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    // Obtiene el nombre del canario
    public function getNombre() {
        return $this->nombre ?? ""; // Devuelve el nombre o una cadena vacía si no está establecido
    }

    // Método para que el canario emita su sonido característico
    public function pia() {
        echo "Canario " . $this->getNombre() . ": Pio pio pio<br>";
    }

    // Método para que el canario se alimente
    public function alimentarse() {
        echo "Canario " . $this->getNombre() . ": Estoy comiendo alpiste<br>";
    }

    // Método mágico __toString para representar el objeto como una cadena
    public function __toString() {
        return parent::__toString() . ", en concreto un Canario, con sexo " . $this->getSexoTexto() . 
               ($this->nombre ? ", llamado " . $this->nombre : "") . "<br>";
    }
}
