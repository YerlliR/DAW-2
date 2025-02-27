<?php

/**
 * @author Sergio Ricart Alabau
 */

require_once 'Ave.php';

// Clase Pinguino que extiende de Ave
class Pinguino extends Ave {
    private $nombre;

    // Constructor de la clase Pinguino
    public function __construct() {
        parent::__construct();
    }

    // Método estático para construir un pingüino con sexo
    public static function consSexo($sexo) {
        $pinguino = new self();
        $pinguino->sexo = $sexo;
        return $pinguino;
    }

    // Método estático para construir un pingüino con sexo y nombre
    public static function consFull($sexo, $nombre) {
        $pinguino = new self();
        $pinguino->sexo = $sexo;
        $pinguino->nombre = $nombre;
        return $pinguino;
    }

    // Setter para el nombre del pingüino
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    // Getter para el nombre del pingüino
    public function getNombre() {
        return $this->nombre ?? "";
    }

    // Método para simular que el pingüino está programando
    public function programar() {
        echo "Pingüino " . $this->getNombre() . ": Soy un pingüino programando en PHP<br>";
    }

    // Método para simular que el pingüino se está alimentando
    public function alimentarse($comida = "peces") {
        echo "Pingüino " . $this->getNombre() . ": " . parent::alimentarse($comida);
    }

    // Método para simular que el pingüino se está durmiendo
    public function dormirse() {
        echo "Pingüino " . $this->getNombre() . ":" . parent::dormirse();
    }

    // Método para simular que el pingüino está poniendo un huevo
    public function ponerHuevo() {
        echo "Pingüino " . $this->getNombre() . ": "  . parent::ponerHuevo();
    }

    // Método para simular que el pingüino se está muriendo
    public function morirse() {
        echo "Pingüino " . $this->getNombre() . ":"  . parent::morirse();
    }



    // Método __toString para representar el objeto como una cadena
    public function __toString() {
        return parent::__toString() . ", en concreto un Pingüino" . 
               ($this->nombre ? ", llamado " . $this->nombre : "") . "<br>";
    }
}