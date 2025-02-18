<?php
abstract class Animal {
    protected $sexo;
    private static $totalAnimales = 0;

    protected function __construct($sexo = "M") {
        $this->sexo = $sexo;
        self::$totalAnimales++;
    }

    public static function getTotalAnimales() {
        return "Hay un total de " . self::$totalAnimales . " animales<br>";
    }

    public function dormirse() {
        echo "Animal " . $this->getNombre() . ": Zzzzzzz<br>";
    }

    public abstract function alimentarse();

    public function morirse() {
        echo "Animal " . $this->getNombre() . ": Adiós!<br>";
        self::$totalAnimales--;
    }

    protected function getSexoTexto() {
        return $this->sexo === "H" ? "HEMBRA" : "MACHO";
    }

    public abstract function getNombre();
}
?>