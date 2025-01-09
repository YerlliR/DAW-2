<?php
/**
 * @autor Sergio Ricart Alabau
 */

class Jugador {
    public $nombre;
    public $simbolo;
    public $victorias = 0;
    public $derrotas = 0;
    public $copas = 0;

    public function __construct($nombre, $simbolo) {
        $this->nombre = $nombre;
        $this->simbolo = $simbolo;
    }
}

function iniciarTorneo() {
    $jugador1 = new Jugador(readline("Jugador 1, ¿cuál es tu nombre? "), readline("Jugador 1, ¿qué símbolo quieres usar? "));
    $jugador2 = new Jugador(readline("Jugador 2, ¿cuál es tu nombre? "), readline("Jugador 2, ¿qué símbolo quieres usar? "));

    $rondas = 1;

    while ($rondas <= 3) {
        echo "\nInicio de la ronda $rondas\n";
        $ganador = iniciarPartida($jugador1, $jugador2);

        if ($ganador === 1) {
            $jugador1->victorias++;
            $jugador2->derrotas++;
            echo "\n$jugador1->nombre gana la ronda $rondas!\n";
        } elseif ($ganador === 2) {
            $jugador2->victorias++;
            $jugador1->derrotas++;
            echo "\n$jugador2->nombre gana la ronda $rondas!\n";
        } else {
            echo "\nLa ronda $rondas termina en empate.\n";
        }

        $rondas++;
    }

    if ($jugador1->victorias > $jugador2->victorias) {
        $jugador1->copas++;
        echo "\n$jugador1->nombre gana el torneo!\n";
    } elseif ($jugador2->victorias > $jugador1->victorias) {
        $jugador2->copas++;
        echo "\n$jugador2->nombre gana el torneo!\n";
    } else {
        echo "\nEl torneo termina en empate.\n";
    }

    mostrarEstadisticas($jugador1, $jugador2);

    if (strtolower(readline("¿Quieres jugar otro torneo? (s/n): ")) === 's') {
        $jugador1->victorias = 0;
        $jugador2->victorias = 0;
        $jugador1->derrotas = 0;
        $jugador2->derrotas = 0;
        iniciarTorneo();
    }
}

function iniciarPartida($jugador1, $jugador2) {
    $tablero = inicializarTablero();
    $turno = 0;

    while (true) {
        imprimirTablero($tablero);
        $jugadorActual = $turno % 2 === 0 ? $jugador1 : $jugador2;
        echo "Turno de $jugadorActual->nombre ($jugadorActual->simbolo)\n";
        $cordenadaX = readline("Dime la coordenada de las x: ");
        $cordenadaY = readline("Dime la coordenada de las y: ");

        if ($cordenadaX === 's' || $cordenadaY === 's') {
            return $turno % 2 === 0 ? 2 : 1;
        }

        if (isset($tablero[$cordenadaX][$cordenadaY]) && $tablero[$cordenadaX][$cordenadaY] === " ") {
            $tablero[$cordenadaX][$cordenadaY] = $jugadorActual->simbolo;
            $ganador = verificarGanador($tablero);
            if ($ganador !== 0) {
                imprimirTablero($tablero);
                return $ganador;
            }
            if (tableroLleno($tablero)) {
                imprimirTablero($tablero);
                return 0; // Empate
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
        echo "-------\n";
        echo "|";
        for ($j = 0; $j < 3; $j++) {
            echo $tablero[$i][$j] . "|";
        }
        echo "\n";
    }
    echo "-------\n";
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
    echo "$jugador1->nombre - Victorias: $jugador1->victorias, Derrotas: $jugador1->derrotas, Copas: $jugador1->copas\n";
    echo "$jugador2->nombre - Victorias: $jugador2->victorias, Derrotas: $jugador2->derrotas, Copas: $jugador2->copas\n";
}

iniciarTorneo();
