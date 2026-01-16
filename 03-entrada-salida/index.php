<?php
/**
 * BLOQUE 3 — ENTRADA Y SALIDA BÁSICA
 *
 * OBJETIVO DEL ARCHIVO
 * --------------------
 * - Aprender a recibir datos desde la URL usando $_GET
 * - Validar que el dato exista
 * - Validar que el contenido no esté vacío
 * - Proteger la salida contra ejecución de código (XSS)
 *
 * EJEMPLO DE USO
 * --------------
 * http://localhost/03-entrada-salida/index.php?nombre=Juan
 *
 * NOTA IMPORTANTE
 * ---------------
 * Nunca se debe confiar en la entrada del usuario.
 * Todo dato externo debe validarse y sanearse antes de usarse.
 */


/*
|--------------------------------------------------------------------------
| 1. VALIDAR EXISTENCIA DEL PARÁMETRO
|--------------------------------------------------------------------------
| Verificamos si el parámetro 'nombre' fue enviado en la URL.
| Si no existe, detenemos la ejecución inmediatamente.
*/
if (!isset($_GET['nombre'])) {
    echo "Falta el nombre";
    return;
}


/*
|--------------------------------------------------------------------------
| 2. OBTENER Y NORMALIZAR EL VALOR
|--------------------------------------------------------------------------
| Usamos trim() para eliminar espacios en blanco al inicio y al final.
| Esto evita que valores como "   " pasen como válidos.
*/
$nombre = trim($_GET['nombre']);


/*
|--------------------------------------------------------------------------
| 3. VALIDAR CONTENIDO
|--------------------------------------------------------------------------
| Verificamos que el nombre no esté vacío después de aplicar trim().
| Usamos comparación estricta para evitar conversiones implícitas.
*/
if ($nombre === '') {
    echo "Nombre vacío";
    return;
}


/*
|--------------------------------------------------------------------------
| 4. PROTEGER LA SALIDA (SEGURIDAD)
|--------------------------------------------------------------------------
| htmlspecialchars() evita que el navegador ejecute código HTML o JavaScript
| enviado por el usuario (protección básica contra XSS).
*/
$nombreSeguro = htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8');


/*
|--------------------------------------------------------------------------
| 5. SALIDA FINAL
|--------------------------------------------------------------------------
| Mostramos el valor ya validado y seguro.
*/
echo "Hola $nombreSeguro";
