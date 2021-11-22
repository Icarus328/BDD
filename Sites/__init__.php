<?php

// Este archivo se puede importar en cada archivo .php, y se puede tener
// aquí todo lo necesario para no tener que agregarlo para cada archivo.
// No tiene nada de mágico, es un archivo php cualquiera con un nombre arbitrario.

// Cargamos los datos para poder iniciar la BDD
// require_once __DIR__ . "/config/data.php";

// Se conecta a la BDD
// require_once __DIR__ . "/config/conexion.php";

// Se crea siempre una sesión
//  session_start();


// Funciones propias de utilidad

/**
 * Volver al inicio, tiene que se llamada antes de entregar HTML.
 */
function go_home() {
  header("Location: " . '/~grupo77/');
  exit();
}

