<?php
/**
 * @author Sergio Ricart Alabau
 */

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
    // Método para obtener la raza del perro
    public function getRaza() {
        return $this->raza;
    }

    // Método para establecer la raza del perro
    public function setRaza($raza) {
        $this->raza = $raza;
    }

    // Método para establecer el nombre del perro
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    // Método para simular el amamantamiento del perro
    public function amamantar() {
        echo "Perro " . $this->getNombre() . ": " . parent::amamantar();
    }

    // Método para simular que el perro se duerme
    public function dormirse() {
        echo "Perro " . $this->getNombre() . ": " . parent::dormirse();
    }

    // Método para simular que el perro se muere
    public function morirse() {
        echo "Perro " . $this->getNombre() . ": " . parent::morirse();
    }

    // Método para simular el ladrido del perro
    public function ladra() {
        echo "Perro " . $this->getNombre() . ": Guau guau<br>";
    }

    // Método para simular la alimentación del perro
    public function alimentarse($comida = "carne") {
        echo "Perro " . $this->getNombre() . ": " . parent::alimentarse($comida);
    }

    // Método __toString para representar el objeto como una cadena
    public function __toString() {
        return parent::__toString() . ", en concreto un Perro, con raza " . $this->raza . 
               ($this->nombre ? " y mi nombre es " . $this->nombre : " y no tengo nombre") . "<br>";
    }
}