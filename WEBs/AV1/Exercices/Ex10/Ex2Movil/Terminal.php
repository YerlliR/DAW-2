<?php
class Terminal {
    protected $numero;
    protected $tiempoConversacion;
    
    public function __construct($numero) {
        $this->numero = $numero;
        $this->tiempoConversacion = 0;
    }
    
    public function getNumero() {
        return $this->numero;
    }
    
    public function getTiempoConversacion() {
        return $this->tiempoConversacion;
    }
    
    protected function actualizaTiempo($segundos) {
        $this->tiempoConversacion += $segundos;
    }
    
    public function __toString() {
        $minutos = floor($this->tiempoConversacion / 60);
        $segundos = $this->tiempoConversacion % 60;
        return "Nº " . $this->numero . " - " . $minutos . " m y " . $segundos . "s de conversación en total";
    }
}