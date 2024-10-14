<?php
/**
 * @author Sergio Ricart Alabau
 */
// Inicializamos un array para almacenar las notas
$notas = [];

// Leemos el número de alumnos
$numAlumnos = (int)readline("Ingrese el número de alumnos: ");

// Leemos las notas de cada alumno
for ($i = 1; $i <= $numAlumnos; $i++) {
    $nota = (float)readline("Ingrese la nota del alumno $i: ");
    $notas[] = $nota;
}

// Calculamos la media
$sumaNotas = array_sum($notas);
$media = $sumaNotas / $numAlumnos;

// Contamos cuántos alumnos tienen notas mayores a la media
$alumnosSobreMedia = 0;

foreach ($notas as $nota) {
    if ($nota > $media) {
        $alumnosSobreMedia++;
    }
}

// Mostramos los resultados
echo "La media de la clase es: " . number_format($media, 2) . "\n";
echo "Número de alumnos con nota mayor a la media: $alumnosSobreMedia\n";
?>
