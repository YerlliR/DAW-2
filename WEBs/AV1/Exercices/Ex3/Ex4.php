<?php
/**
 * @author Sergio Ricart Alabau
 */
$array1 = [];
$array2 = [];
$array3 = [];

// Usando un bucle for
for ($i = 0; $i < 101; $i++) {
    if ($i % 5 == 0) {
        $array1[] = $i;
    }
}
print_r($array1);

// Usando un bucle while
$i = 0;
while ($i < 101) {
    if ($i % 5 == 0) {
        $array2[] = $i;
    }
    $i++;
}
print_r($array2);

// Usando un bucle do-while
$i = 0;
do {
    if ($i % 5 == 0) {
        $array3[] = $i;
    }
    $i++;
} while ($i < 101);
print_r($array3);
