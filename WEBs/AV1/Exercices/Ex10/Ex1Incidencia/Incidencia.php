<?php
class Incidencia {
    private static $codigo_siguiente = 1;
    private static $pendientes = 0;
    
    private $codigo;
    private $puesto;
    private $descripcion;
    private $estado;
    private $resolucion;
    
    public function __construct($puesto, $descripcion) {
        $this->codigo = self::$codigo_siguiente++;
        $this->puesto = $puesto;
        $this->descripcion = $descripcion;
        $this->estado = "Pendiente";
        $this->resolucion = "";
        self::$pendientes++;
    }
    
    public function resuelve($resolucion) {
        if ($this->estado == "Pendiente") {
            $this->estado = "Resuelta";
            $this->resolucion = $resolucion;
            self::$pendientes--;
        }
    }
    
    public static function getPendientes() {
        return self::$pendientes;
    }
    
    public function __toString() {
        $resultado = "Incidencia " . $this->codigo . " - Puesto: " . $this->puesto;
        $resultado .= " - " . $this->descripcion . " - " . $this->estado;
        if ($this->estado == "Resuelta") {
            $resultado .= " - " . $this->resolucion;
        }
        return $resultado . "<br>";
    }
}
?>