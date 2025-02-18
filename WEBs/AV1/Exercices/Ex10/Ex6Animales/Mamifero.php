<?php
require_once "Animal.php";

// Clase abstracta Mamifero que extiende de Animal
abstract class Mamifero extends Animal {
    // Variable estática para contar el total de mamíferos
    private static $totalMamiferos = 0;

    // Constructor protegido que incrementa el contador de mamíferos
    protected function __construct($sexo = "M") {
        parent::__construct($sexo);
        self::$totalMamiferos++;
    }

    // Método estático para obtener el total de mamíferos
    public static function getTotalMamiferos() {
        return "Hay un total de " . self::$totalMamiferos . " mamíferos<br>";
    }

    // Método para amamantar, solo si el mamífero es hembra
    public function amamantar() {
        if ($this->sexo === "H") {
            echo "Mamífero " . $this->getNombre() . ": Amamantando a mis crías<br>";
        } else {
            echo "Mamífero " . $this->getNombre() . ": Soy macho, no puedo amamantar<br>";
        }
    }

    // Método para manejar la muerte del mamífero y decrementar el contador
    public function morirse() {
        parent::morirse();
        self::$totalMamiferos--;
    }

    // Método mágico __toString para representar el objeto como una cadena
    public function __toString() {
        return parent::__toString() . "un mamífero";
    }
}