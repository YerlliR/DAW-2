<?php
class Bicicleta extends Vehiculo {
    public function hacerCaballito() {
        echo "¡Estoy haciendo el caballito con la bicicleta!<br>\n";
    }
    
    public function ponerCadena() {
        echo "He puesto la cadena a la bicicleta<br>\n";
    }
    
    public function verKMRecorridos() {
        return "La bicicleta ha recorrido " . $this->kilometrosRecorridos . " km<br>\n";
    }
}