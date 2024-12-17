<?php
/**
 * @author Sergio Ricart Alabau
 */

 $horas = ["14:10", "15:05", "16:00", "16:55", "17:15", "18:10", "19:05", "20:00"];
 $lunes = ["DWEC", "DWEC", "DWES", "P", "DWES", "EIE", "DAW", "DAW"];
 $martes = ["DWEC", "DWEC", "DIW", "A", "DIW", "DWES", "DWES", "--"];
 $miercoles = ["--", "DWEC", "DWEC", "T", "DWEC", "DAW", "DAW", "TUT"];
 $jueves = ["DWES", "DWES", "EIE", "I", "DIW", "DIW", "DAW", "DAW"];
 $viernes = ["EIE", "DWES", "DWES", "O", "DIW", "DIW", "--", "--"];


 echo "|-----------------------------------------------------------------------------------|\n";
 echo "|Hora         |Lunes        |Martes       |Miercoles    |Jueves       |Viernes      |\n";
 echo "|-----------------------------------------------------------------------------------|\n";
for ($i = 0; $i < 8; $i++ ){
    printf( "%-14s","|".$horas[$i]);
    printf( "%-14s","|".$lunes[$i]);
    printf( "%-14s","|".$martes[$i]);
    printf( "%-14s","|".$miercoles[$i]);
    printf( "%-14s","|".$jueves[$i]);
    printf( "%-14s","|".$viernes[$i]);
    echo "|";
    echo "\n";
};
echo "|-----------------------------------------------------------------------------------|\n";

