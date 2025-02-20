<?php

/**
 * @author Sergio Ricart Alabau
 */
require_once 'Mamifero.php';

// Clase Gato que extiende de Mamifero
class Gato extends Mamifero {
    private $nombre; // Nombre del gato
    private $raza;   // Raza del gato

    // Constructor de la clase Gato
    public function __construct() {
        parent::__construct(); // Llama al constructor de la clase padre Mamifero
        $this->raza = "";      // Inicializa la raza como una cadena vacía
    }

    // Método estático para construir un Gato con sexo y nombre
    public static function consSexoNombre($sexo, $nombre) {
        $gato = new self();    // Crea una nueva instancia de Gato
        $gato->sexo = $sexo;   // Asigna el sexo al gato
        $gato->nombre = $nombre; // Asigna el nombre al gato
        return $gato;          // Retorna la instancia de Gato
    }

    // Método estático para construir un Gato con sexo, nombre y raza
    public static function consFull($sexo, $nombre, $raza) {
        $gato = new self();    // Crea una nueva instancia de Gato
        $gato->sexo = $sexo;   // Asigna el sexo al gato
        $gato->nombre = $nombre; // Asigna el nombre al gato
        $gato->raza = $raza;   // Asigna la raza al gato
        return $gato;          // Retorna la instancia de Gato
    }

    // Método para obtener el nombre del gato
    public function getNombre() {
        return $this->nombre ?? ""; // Retorna el nombre del gato o una cadena vacía si no tiene nombre
    }

    // Método para establecer el nombre del gato
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    // Método para que el gato amamante
    public function amamantar() {
        echo "Gato " . $this->getNombre() . ":" . parent::amamantar();
    }

    // Método para que el gato se duerma
    public function dormirse() {
        echo "Gato " . $this->getNombre() . ": " . parent::dormirse();
    }

    // Método para que el gato muera
    public function morirse() {
        echo "Gato " . $this->getNombre() . ": " . parent::morirse();
    }

    // Método para que el gato maulle
    public function maulla() {
        echo "Gato " . $this->getNombre() . ": Miauuuu<br>"; // Imprime el maullido del gato
    }

    // Método para que el gato se alimente
    public function alimentarse($comida = "pescado") {
        echo "Gato " . $this->getNombre() . ": " . parent::alimentarse($comida);
    }


    // Método __toString para representar el objeto como una cadena
    public function __toString() {
        return parent::__toString() . ", en concreto un Gato, con raza " . $this->raza . 
               ($this->nombre ? " y mi nombre es " . $this->nombre : " y no tengo nombre") . "<br>";
               // Retorna una cadena con la información del gato
    }
}