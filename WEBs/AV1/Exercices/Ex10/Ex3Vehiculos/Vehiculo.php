<?php
class Vehiculo {
    // Atributos de clase
    private static $vehiculosCreados = 0;
    private static $kilometrosTotales = 0;
    
    // Atributo de instancia
    protected $kilometrosRecorridos;
    
    public function __construct() {
        self::$vehiculosCreados++;
        $this->kilometrosRecorridos = 0;
    }
    
    public function avanza($km) {
        $this->kilometrosRecorridos += $km;
        self::$kilometrosTotales += $km;
        echo "Has avanzado $km kilómetros<br>\n";
    }
    
    public function verKMRecorridos() {
        return "El vehículo ha recorrido " . $this->kilometrosRecorridos . " km<br>\n";
    }
    
    public static function verKMTotales() {
        return "Los vehículos han recorrido un total de " . self::$kilometrosTotales . " km<br>\n";
    }
    
    public static function verVehiculosCreados() {
        return "Se han creado " . self::$vehiculosCreados . " vehículos<br>\n";
    }
}