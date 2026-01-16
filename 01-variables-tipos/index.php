<?php

// Definicion de variables en PHP //
// Tipos de datos: string, integer, float, boolean, null //
// las variables se declaran anteponiendo el simbolo $ a su nombre //

$nombre = "Juan";
$edad = 18;
$altura = 1.77;
$esEstudiante = true;


// Imprimir las variables //
// se utiliza la funcion echo para imprimir en pantalla //

/*
echo $nombre;
echo "\n";
echo $edad;
echo "\n";
echo $altura;
echo "\n";
echo $esEstudiante;
echo "\n";
*/

// al sumar una variable integer con una float, el resultado es float //

/*
$suma = $edad + $altura;
*/

//la funcion var_dump muestra el tipo de dato y su valor //

/*
var_dump($nombre);
var_dump($edad);
var_dump($altura);
var_dump($esEstudiante);
var_dump($suma);
*/

//Condicionales//

/*
if ($esEstudiante == true) {
    echo "$nombre es estudiante.\n";
} else {
    echo "$nombre no es estudiante.\n";
}
*/

if ($edad >= 18) {
    echo "$nombre es mayor de edad.\n";
} else {
    echo "$nombre es menor de edad.\n";
}   

?>