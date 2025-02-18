<?php
abstract class Animal {
    // Propiedad protegida para almacenar el sexo del animal
    protected $sexo;
    
    // Propiedad estática para llevar la cuenta del número total de animales
    private static $totalAnimales = 0;

    // Constructor para inicializar el sexo del animal e incrementar el conteo total de animales
    protected function __construct($sexo = "M") {
        $this->sexo = $sexo;
        self::$totalAnimales++;
    }

    // Método estático para obtener el número total de animales
    public static function getTotalAnimales() {
        return "Hay un total de " . self::$totalAnimales . " animales <br>";
    }

    // Método para simular que el animal se duerme
    public function dormirse() {
        echo "Animal " . $this->getNombre() . ": Zzzzzzz <br>";
    }

    // Método abstracto que debe ser implementado por las subclases para definir cómo se alimenta el animal
    public abstract function alimentarse();

    // Método para simular que el animal muere y decrementar el conteo total de animales
    public function morirse() {
        echo "Animal " . $this->getNombre() . ": Adiós! <br>";
        self::$totalAnimales--;
    }

    // Método protegido para obtener la representación en texto del sexo del animal
    protected function getSexoTexto() {
        return $this->sexo === "H" ? "HEMBRA" : "MACHO";
    }

    // Método mágico para devolver una representación en cadena del animal
    public function __toString() {
        return "Soy un Animal ";
    }
}