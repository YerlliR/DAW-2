<?php
include_once "Animal.php"; // Incluye la clase Animal

abstract class Ave extends Animal {
    private static $totalAves = 0;

    protected function __construct($sexo = "M") {
        parent::__construct($sexo);
        self::$totalAves++;
    }

    public static function getTotalAves() {
        return "Hay un total de " . self::$totalAves . " aves<br>";
    }

    public function ponerHuevo() {
        if ($this->sexo === "H") {
            echo "Ave " . $this->getNombre() . ": He puesto un huevo!<br>";
        } else {
            echo "Ave " . $this->getNombre() . ": Soy macho, no puedo poner huevos<br>";
        }
    }

    public function morirse() {
        parent::morirse();
        self::$totalAves--;
    }
}
?>