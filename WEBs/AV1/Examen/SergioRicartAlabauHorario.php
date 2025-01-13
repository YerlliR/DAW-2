<?php
/**
 * @autor Sergio Ricart Alabau
 */

$horario = [
    "Lunes" => ["14:10" => "DWEC", "15:05" => "DWEC", "16:00" => "DWES", "16:55" => "P", "17:15" => "DWES", "18:10" => "EIE", "19:05" => "DAW", "20:00" => "DAW"],
    "Martes" => ["14:10" => "DWEC", "15:05" => "DWEC", "16:00" => "DIW", "16:55" => "A", "17:15" => "DIW", "18:10" => "DWES", "19:05" => "DWES", "20:00" => "--"],
    "Miércoles" => ["14:10" => "--", "15:05" => "DWEC", "16:00" => "DWEC", "16:55" => "T", "17:15" => "DWEC", "18:10" => "DAW", "19:05" => "DAW", "20:00" => "TUT"],
    "Jueves" => ["14:10" => "DWES", "15:05" => "DWES", "16:00" => "EIE", "16:55" => "I", "17:15" => "DIW", "18:10" => "DIW", "19:05" => "DAW", "20:00" => "DAW"],
    "Viernes" => ["14:10" => "EIE", "15:05" => "DWES", "16:00" => "DWES", "16:55" => "O", "17:15" => "DIW", "18:10" => "DIW", "19:05" => "--", "20:00" => "--"]
];

$horas = ["14:10", "15:05", "16:00", "16:55", "17:15", "18:10", "19:05", "20:00"];
echo "|" . str_repeat("-", 77) . "|" . "\n";
printf("| %-10s | %-10s | %-10s | %-11s | %-10s | %-10s |\n", "Hora", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes");
echo "|" . str_repeat("-", 77) . "|" . "\n";

foreach ($horas as $hora) {
    printf("| %-10s ", $hora);
    foreach ($horario as $dia => $modulos) {
        printf("| %-10s ", $modulos[$hora]);
    }
    echo "|\n";
}

echo "|" . str_repeat("-", 77) . "|" . "\n";

?>