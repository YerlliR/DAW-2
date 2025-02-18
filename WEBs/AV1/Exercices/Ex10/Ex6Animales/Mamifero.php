<?php
include_once "Animal.php"; // Incluye la clase Animal

abstract class Mamifero extends Animal {
    private static $totalMamiferos = 0;

    protected function __construct($sexo = "M") {
        parent::__construct($sexo);
        self::$totalMamiferos++;
    }

    public static function getTotalMamiferos() {
        return "Hay un total de " . self::$totalMamiferos . " mamíferos<br>";
    }

    public function amamantar() {
        if ($this->sexo === "H") {
            echo "Mamífero " . $this->getNombre() . ": Amamantando a mis crías<br>";
        } else {
            echo "Mamífero " . $this->getNombre() . ": Soy macho, no puedo amamantar<br>";
        }
    }

    public function morirse() {
        parent::morirse();
        self::$totalMamiferos--;
    }
}
?>