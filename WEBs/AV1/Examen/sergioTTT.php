<?php
/**
 * @author Sergio Ricart Alabau
 */


 iniciarPartida();
function iniciarPartida (){
    $jugador1 = readline("Cual es tu nombre?");
    $simbolo1 = readline("Simbolo que quieres usar?");
    $jugador2 = readline("Cual es tu nombre?");
    $simbolo2 = readline("Simbolo que quieres usar?");
    $condicion = 3;
    $tablero = [];
    $ultimo = 0;

    $tablero = inicializarTablero($tablero);
    while($condicion == 3){
        for ($i = 0; $i < 2; $i++){
            if ($i == 0 && $condicion == 3){
                echo "Turno de " . $jugador1 . " (" . $simbolo1 . ")";
                $cordenadaX = readline("Dime la cordeanda de las x");
                $cordenaday = readline("Dime la cordeanda de las y");
                $tablero [$cordenadaX][$cordenaday] = $simbolo1;
                imprimirTablero( $tablero);
            }
            else if($i == 1 && $condicion == 3){
                echo "Turno de " . $jugador2 . " (" . $simbolo2 . ")";
                $cordenadaX = readline("Dime la cordeanda de las x");
                $cordenaday = readline("Dime la cordeanda de las y");
                $tablero [$cordenadaX][$cordenaday] = $simbolo2;
                imprimirTablero($tablero);    
            }
            $condicion = verificarGandor($tablero);
            $ultimo = $i;
    
        }
    }

    if ($ultimo = 0 && $condicion = 1){

        echo "\n Ha ganado el jugador" . $jugador1;
    }else if ($ultimo = 1 && $condicion = 1){
        echo "\n Ha ganado el jugador" . $jugador2;
    }else{
        echo "\n Empate";
    }

}





function inicializarTablero ($tablero) {
    for ($i = 0 ; $i < 3; $i++){
        echo"-------";
        echo "\n";

        echo "|";
        for ($y = 0 ; $y < 3; $y++){
            $tablero [$i][$y] = " "; 
            echo $tablero [$i][$y] . "|";
        };
        echo "\n";
    };
    echo"-------";
    return $tablero;
}

function imprimirTablero ($tablero){
    for ($i = 0 ; $i < 3; $i++){
        echo"-------";
        echo "\n";

        echo "|";
        for ($y = 0 ; $y < 3; $y++){
            echo $tablero[$i][$y] . "|";
        };
        echo "\n";
    };
    echo"-------";

}

function verificarGandor ($tablero){

    if( (($tablero[0][0] == $tablero[0][1] && $tablero[0][1] = $tablero[0][2]) && ($tablero[0][0] != " " && $tablero[0][1] != " " && $tablero[0][2] != " ")) ||
        (($tablero[1][0] == $tablero[1][1] && $tablero[1][1] = $tablero[1][2]) && ($tablero[1][0] != " " && $tablero[1][1] != " " && $tablero[1][2] != " ")) ||
        (($tablero[2][0] == $tablero[2][1] && $tablero[2][1] = $tablero[2][2]) && ($tablero[2][0] != " " && $tablero[2][1] != " " && $tablero[2][2] != " ")) ||

        (($tablero[0][0] == $tablero[1][0] && $tablero[1][0] = $tablero[2][0]) && ($tablero[0][0] != " " && $tablero[1][0] != " " && $tablero[2][0] != " ")) ||
        (($tablero[0][1] == $tablero[1][1] && $tablero[1][1] = $tablero[2][1]) && ($tablero[0][1] != " " && $tablero[1][1] != " " && $tablero[2][1] != " ")) ||
        (($tablero[0][2] == $tablero[1][2] && $tablero[1][2] = $tablero[2][2]) && ($tablero[0][2] != " " && $tablero[1][2] != " " && $tablero[2][2] != " ")) ||

        (($tablero[0][0] == $tablero[1][1] && $tablero[1][1] = $tablero[2][2]) && ($tablero[0][0] != " " && $tablero[1][1] != " " && $tablero[2][2] != " ")) ||
        (($tablero[2][0] == $tablero[1][1] && $tablero[1][1] = $tablero[0][2]) && ($tablero[2][0] != " " && $tablero[1][1] != " " && $tablero[0][2] != " "))

        ){
            $condicion = 1;
        }elseif ($tablero[0][0] != " " && $tablero[0][1] != " " && $tablero[0][2] != " " && $tablero[1][0] != " " && $tablero[1][1] != " " && $tablero[1][2] != " " && $tablero[2][0] != " " && $tablero[2][1] != " " && $tablero[2][2] != " "){
            $condicion = 2;
        }
        else {
            $condicion = 3;
        }

        return $condicion;
}