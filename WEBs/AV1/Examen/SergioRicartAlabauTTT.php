<?php
/**
 * @autor Sergio Ricart Alabau
 */


$jugador1 = [
    'nombre' => readline("Jugador 1, ¿cuál es tu nombre? "),
    'simbolo' => readline("Jugador 1, ¿qué símbolo quieres usar? "),
    'victorias' => 0,
    'derrotas' => 0,
    'copas' => 0
];
$jugador2 = [
    'nombre' => readline("Jugador 2, ¿cuál es tu nombre? "),
    'simbolo' => readline("Jugador 2, ¿qué símbolo quieres usar? "),
    'victorias' => 0,
    'derrotas' => 0,
    'copas' => 0
];

function iniciarTorneo($jugador1, $jugador2) {

    $rondas = 1;

    while ($rondas <= 3) {
        echo "\nInicio de la ronda $rondas\n";
        $ganador = iniciarPartida($jugador1, $jugador2);

        if ($ganador === 1) {
            $jugador1['victorias']++;
            $jugador2['derrotas']++;
            echo "\n{$jugador1['nombre']} gana la ronda $rondas!\n";
        } elseif ($ganador === 2) {
            $jugador2['victorias']++;
            $jugador1['derrotas']++;
            echo "\n{$jugador2['nombre']} gana la ronda $rondas!\n";
        } else {
            echo "\nLa ronda $rondas termina en empate.\n";
        }

        $rondas++;
    }

    if ($jugador1['victorias'] > $jugador2['victorias']) {
        $jugador1['copas']++;
        echo "\n{$jugador1['nombre']} gana el torneo!\n";
    } elseif ($jugador2['victorias'] > $jugador1['victorias']) {
        $jugador2['copas']++;
        echo "\n{$jugador2['nombre']} gana el torneo!\n";
    } else {
        echo "\nEl torneo termina en empate.\n";
    }

    mostrarEstadisticas($jugador1, $jugador2);

    if (strtolower(readline("¿Quieres jugar otro torneo? (s/n): ")) === 's') {
        $jugador1['victorias'] = 0;
        $jugador2['victorias'] = 0;
        $jugador1['derrotas'] = 0;
        $jugador2['derrotas'] = 0;
        iniciarTorneo($jugador1,$jugador2);
    }
}

function iniciarPartida($jugador1, $jugador2) {
    $tablero = inicializarTablero();
    $turno = 0;

    while (true) {
        imprimirTablero($tablero);
        $jugadorActual = $turno % 2 === 0 ? $jugador1 : $jugador2;
        echo "Turno de {$jugadorActual['nombre']} ({$jugadorActual['simbolo']})\n";
        $cordenadaX = readline("Dime la coordenada de las x: ");
        $cordenadaY = readline("Dime la coordenada de las y: ");

        if ($cordenadaX === 's' || $cordenadaY === 's') {
            return $turno % 2 === 0 ? 2 : 1;
        }

        if (isset($tablero[$cordenadaX][$cordenadaY]) && $tablero[$cordenadaX][$cordenadaY] === " ") {
            $tablero[$cordenadaX][$cordenadaY] = $jugadorActual['simbolo'];
            $ganador = verificarGanador($tablero);
            if ($ganador !== 0) {
                imprimirTablero($tablero);
                return $ganador;
            }
            if (tableroLleno($tablero)) {
                imprimirTablero($tablero);
                return 0; 
            }
            $turno++;
        } else {
            echo "Movimiento inválido, intenta de nuevo.\n";
        }
    }
}

function inicializarTablero() {
    $tablero = [];
    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 3; $j++) {
            $tablero[$i][$j] = " ";
        }
    }
    return $tablero;
}

function imprimirTablero($tablero) {
    for ($i = 0; $i < 3; $i++) {
        echo " ";
        for ($j = 0; $j < 3; $j++) {
            
            if($j == 0 || $j == 1){
                echo $tablero[$i][$j] . " | ";
            }else{
                echo $tablero[$i][$j];
            }
        }
        echo "\n";
        if ($i == 0 || $i == 1){
            echo "---|---|---\n";
        }
    }
}

function verificarGanador($tablero) {
    for ($i = 0; $i < 3; $i++) {
        if ($tablero[$i][0] === $tablero[$i][1] && $tablero[$i][1] === $tablero[$i][2] && $tablero[$i][0] !== " ") {
            return $tablero[$i][0] === "X" ? 1 : 2;
        }
        if ($tablero[0][$i] === $tablero[1][$i] && $tablero[1][$i] === $tablero[2][$i] && $tablero[0][$i] !== " ") {
            return $tablero[0][$i] === "X" ? 1 : 2;
        }
    }

    if ($tablero[0][0] === $tablero[1][1] && $tablero[1][1] === $tablero[2][2] && $tablero[0][0] !== " ") {
        return $tablero[0][0] === "X" ? 1 : 2;
    }
    if ($tablero[2][0] === $tablero[1][1] && $tablero[1][1] === $tablero[0][2] && $tablero[2][0] !== " ") {
        return $tablero[2][0] === "X" ? 1 : 2;
    }

    return 0;
}

function tableroLleno($tablero) {
    foreach ($tablero as $fila) {
        foreach ($fila as $celda) {
            if ($celda === " ") {
                return false;
            }
        }
    }
    return true;
}

function mostrarEstadisticas($jugador1, $jugador2) {
    echo "\nEstadísticas del torneo:\n";
    echo $jugador1['nombre'] . " - Victorias: " . $jugador1['victorias'] . ", Derrotas: " . $jugador1['derrotas'] . ", Copas: " . $jugador1['copas'] . "\n";
    echo $jugador2['nombre'] . " - Victorias: " . $jugador2['victorias'] . ", Derrotas: " . $jugador2['derrotas'] . ", Copas: " . $jugador2['copas'] . "\n";
}

iniciarTorneo($jugador1, $jugador2);