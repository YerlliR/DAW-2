<?php
/**
 * @author Sergio Ricart Alabau
 */
require_once "Animal.php";

// Clase abstracta Ave que hereda de Animal
abstract class Ave extends Animal {
    // Variable estática para contar el total de aves
    private static $totalAves = 0;

    // Constructor protegido que incrementa el contador de aves
    protected function __construct($sexo = "M") {
        parent::__construct($sexo);
        self::$totalAves++;
    }

    // Método estático para obtener el total de aves
    public static function getTotalAves() {
        return "Hay un total de " . self::$totalAves . " aves <br>";
    }

    // Método para simular la acción de poner un huevo
    public function ponerHuevo() {
        if ($this->sexo === "H") {
            echo "Ave " . $this->getNombre() . ": He puesto un huevo! <br>";
        } else {
            echo "Ave " . $this->getNombre() . ": Soy macho, no puedo poner huevos<br>";
        }
    }

    // Método para simular la muerte del ave y decrementar el contador de aves
    public function morirse(){
        parent::morirse();
        self::$totalAves--;
    }

    // Método __toString para representar el objeto como una cadena
    public function __toString() {
        return parent::__toString() . "un ave";
    }
}