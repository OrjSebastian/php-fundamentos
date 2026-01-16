<?php

/**
 * ============================================================
 * Archivo: condicionales_y_tipos.php
 * Autor: Juan Sebastián Ortiz
 *
 * Objetivo del archivo:
 * - Comprender el comportamiento de los condicionales en PHP
 * - Analizar el type juggling (conversión automática de tipos)
 * - Identificar riesgos al usar comparaciones débiles (==)
 * - Aplicar validaciones seguras con early return
 *
 * Este archivo contiene ejemplos controlados con fines educativos.
 * ============================================================
 */


/*
|--------------------------------------------------------------------------
| Comparaciones débiles (==) vs estrictas (===)
|--------------------------------------------------------------------------
| PHP realiza conversiones automáticas de tipo cuando se usa ==.
| Esto puede producir resultados inesperados o peligrosos.
| El operador === compara tanto valor como tipo.
|
| Descomentar para observar resultados.
|
*/

// var_dump(18 == "18");    // true  -> conversión implícita
// var_dump(18 === "18");  // false -> tipos distintos

// var_dump(0 == false);   // true
// var_dump(0 === false); // false

// var_dump("0" == false);   // true
// var_dump("0" === false); // false


/*
|--------------------------------------------------------------------------
| Operadores lógicos
|--------------------------------------------------------------------------
| Evaluación de operadores AND (&&), OR (||) y NOT (!).
| Se observan combinaciones con comparaciones y valores null.
|
*/

// var_dump(true && false); 
// var_dump(!true); 

// var_dump(18 >= 18 && "18" === 18); // false
// var_dump(18 >= 18 && "18" == 18);  // true

// var_dump(null || false); // false
// var_dump(null && true);  // null


/*
|--------------------------------------------------------------------------
| Condicionales sin validación (ejemplo NO recomendado)
|--------------------------------------------------------------------------
| Se compara directamente un valor sin validar su tipo.
| PHP intenta hacer conversiones implícitas.
|
| Esto es peligroso en sistemas reales.
|
*/

// $edad = "dieciocho";

// if ($edad >= 18) {
//     echo "Mayor de edad\n";
// } else {
//     echo "Menor de edad\n";
// }

// if ($edad === 18) {
//     echo "Mayor de edad (estricto)\n";
// } else {
//     echo "Menor de edad (estricto)\n";
// }


/*
|--------------------------------------------------------------------------
| Validación con if/else anidados (mejor, pero no ideal)
|--------------------------------------------------------------------------
| Se valida si el valor es numérico antes de comparar.
| Aún se puede mejorar la legibilidad y el flujo.
|
*/

// $edad = "dieciocho";

// if (!is_numeric($edad)) {
//     echo "Edad inválida\n";
// } else {
//     if ((int)$edad >= 18) {
//         echo "Mayor de edad\n";
//     } else {
//         echo "Menor de edad\n";
//     }
// }


/*
|--------------------------------------------------------------------------
| Versión con errores (ejemplo educativo)
|--------------------------------------------------------------------------
| Esta versión contiene errores de sintaxis y malas prácticas.
| Se conserva únicamente con fines de aprendizaje.
|
*/

// $edad = "17";

// if (!is_numeric($edad)) {
//     echo "Edad inválida\n";
//     return;
// }

// if (int)$edad < 18 { // ❌ error de sintaxis
//     echo "Menor de edad\n";
//     return;
// }

// if (int)$edad >= 18 { // ❌ error de sintaxis
//     echo "Mayor de edad\n";
//     return;
// }


/*
|--------------------------------------------------------------------------
| Versión final — validación segura con early return
|--------------------------------------------------------------------------
| - Se valida el tipo antes de comparar
| - Se convierte explícitamente el valor
| - Se evita el uso innecesario de else
| - Flujo claro y legible
|
*/

$edad = "17";

// Validación de tipo
if (!is_numeric($edad)) {
    echo "Edad inválida\n";
    return;
}

// Conversión explícita de tipo
$edad = (int) $edad;

// Lógica de negocio
if ($edad < 18) {
    echo "Menor de edad\n";
    return;
}

echo "Mayor de edad\n";
