<?php
/**
 * @author Sergio Ricart Alabau
 */

iniciarTorneo();

function iniciarTorneo() {
    $jugador1 = readline("Cual es tu nombre?");
    $simbolo1 = readline("Simbolo que quieres usar?");
    $jugador2 = readline("Cual es tu nombre?");
    $simbolo2 = readline("Simbolo que quieres usar?");

    $victoriasJugador1 = 0;
    $victoriasJugador2 = 0;
    $rondas = 1;

    while ($victoriasJugador1 < 2 && $victoriasJugador2 < 2) {
        echo "\nInicio de la ronda $rondas\n";
        $ganador = iniciarPartida($jugador1, $simbolo1, $jugador2, $simbolo2);

        if ($ganador === 1) {
            $victoriasJugador2++;
            echo "\n$jugador2 gana la ronda $rondas!\n";
        } elseif ($ganador === 2) {
            $victoriasJugador1++;
            echo "\n$jugador1 gana la ronda $rondas!\n";
        } else {
            echo "\nLa ronda $rondas termina en empate.\n";
        }

        $rondas++;
    }

    if ($victoriasJugador1 === 2) {
        echo "\n$jugador1 gana el torneo!\n";
    } else {
        echo "\n$jugador2 gana el torneo!\n";
    }
}

function iniciarPartida($jugador1, $simbolo1, $jugador2, $simbolo2) {
    $tablero = [];
    $tablero = inicializarTablero($tablero);
    $condicion = 3;
    $ultimo = -1;

    while ($condicion === 3) {
        for ($i = 0; $i < 2; $i++) {
            if ($i === 0 && $condicion === 3) {
                echo "Turno de $jugador1 ($simbolo1)\n";
                $cordenadaX = readline("Dime la coordenada de las x: ");
                $cordenadaY = readline("Dime la coordenada de las y: ");
                $tablero[$cordenadaX][$cordenadaY] = $simbolo1;
                imprimirTablero($tablero);
            } elseif ($i === 1 && $condicion === 3) {
                echo "Turno de $jugador2 ($simbolo2)\n";
                $cordenadaX = readline("Dime la coordenada de las x: ");
                $cordenadaY = readline("Dime la coordenada de las y: ");
                $tablero[$cordenadaX][$cordenadaY] = $simbolo2;
                imprimirTablero($tablero);
            }
            $condicion = verificarGanador($tablero);
            $ultimo = $i;
        }
    }

    if ($condicion === 1) {
        return $ultimo === 0 ? 1 : 2;
    }

    return 0; // Empate
}

function inicializarTablero($tablero) {
    for ($i = 0; $i < 3; $i++) {
        for ($y = 0; $y < 3; $y++) {
            $tablero[$i][$y] = " ";
        }
    }
    imprimirTablero($tablero);
    return $tablero;
}

function imprimirTablero($tablero) {
    for ($i = 0; $i < 3; $i++) {
        echo "-------\n";
        echo "|";
        for ($y = 0; $y < 3; $y++) {
            echo $tablero[$i][$y] . "|";
        }
        echo "\n";
    }
    echo "-------\n";
}

function verificarGanador($tablero) {
    for ($i = 0; $i < 3; $i++) {
        if ($tablero[$i][0] === $tablero[$i][1] && $tablero[$i][1] === $tablero[$i][2] && $tablero[$i][0] !== " ") {
            return 1;
        }
        if ($tablero[0][$i] === $tablero[1][$i] && $tablero[1][$i] === $tablero[2][$i] && $tablero[0][$i] !== " ") {
            return 1;
        }
    }

    if ($tablero[0][0] === $tablero[1][1] && $tablero[1][1] === $tablero[2][2] && $tablero[0][0] !== " ") {
        return 1;
    }
    if ($tablero[2][0] === $tablero[1][1] && $tablero[1][1] === $tablero[0][2] && $tablero[2][0] !== " ") {
        return 1;
    }

    foreach ($tablero as $fila) {
        foreach ($fila as $celda) {
            if ($celda === " ") {
                return 3;
            }
        }
    }

    return 2;
}
