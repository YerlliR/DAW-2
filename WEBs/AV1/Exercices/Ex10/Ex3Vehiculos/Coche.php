<?php
class Coche extends Vehiculo {
    private $deposito;
    
    public function __construct() {
        parent::__construct();
        $this->deposito = 50; // Iniciamos con 50 litros
    }
    
    public function quemaRueda() {
        if ($this->deposito >= 5) {
            $this->deposito -= 5;
            echo "¡Quemando rueda! Has gastado 5 litros de combustible<br>\n";
        } else {
            echo "No hay suficiente combustible para quemar rueda<br>\n";
        }
    }
    
    public function llenarDeposito() {
        $litrosNecesarios = 50 - $this->deposito;
        $this->deposito = 50;
        return "Has llenado " . $litrosNecesarios . " litros del depósito<br>\n";
    }
    
    public function avanza($km) {
        $consumo = $km * 0.1; // 0.1 litros por kilómetro
        if ($this->deposito >= $consumo) {
            parent::avanza($km);
            $this->deposito -= $consumo;
            echo "Combustible restante: " . $this->deposito . " litros<br>\n";
        } else {
            echo "No hay suficiente combustible para recorrer esa distancia<br>\n";
        }
    }
    
    public function verKMRecorridos() {
        return "El coche ha recorrido " . $this->kilometrosRecorridos . " km<br>\n";
    }
}