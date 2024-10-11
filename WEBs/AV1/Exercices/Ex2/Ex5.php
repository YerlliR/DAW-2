<?php
/**
 * @author Sergio Ricart Alabau
 */

$tiempoLlamada = readline("Tiempo de duracion de la llamada? (en minutos)");
echo (($tiempoLlamada - 3) * 5) + 10 . " centimos ha costado la llamada";