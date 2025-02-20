<?php
class Movil extends Terminal {
    private $tarifa;
    private $tiempoTarificado;
    
    private static $tarifas = [
        "rata" => 0.06,    // 6 céntimos por minuto
        "mono" => 0.12,    // 12 céntimos por minuto
        "bisonte" => 0.30  // 30 céntimos por minuto
    ];
    
    public function __construct($numero, $tarifa) {
        parent::__construct($numero);
        $this->tarifa = strtolower($tarifa);
        $this->tiempoTarificado = 0;
    }
    
    public function llama($terminal, $segundosDeLlamada) {
        // Actualizar tiempo para ambos terminales
        $this->actualizaTiempo($segundosDeLlamada);
        $terminal->actualizaTiempo($segundosDeLlamada);
        
        // Solo se tarifica al que llama
        $this->tiempoTarificado += $segundosDeLlamada;
    }
    
    public function __toString() {
        $minutosTotales = floor($this->tiempoConversacion / 60);
        $segundosTotales = $this->tiempoConversacion % 60;
        
        $minutosTarificados = floor($this->tiempoTarificado / 60);
        $segundosTarificados = $this->tiempoTarificado % 60;
        
        // Calcular importe en euros (convertir de céntimos a euros)
        $importe = ($this->tiempoTarificado / 60) * self::$tarifas[$this->tarifa];
        
        return "Nº " . $this->numero . " – " . $minutosTotales . " m y " . $segundosTotales . 
               "s de conversación en total - tarificados " . $minutosTarificados . " m y " . 
               $segundosTarificados . " s por un importe de " . number_format($importe, 2) . " euros";
    }
}