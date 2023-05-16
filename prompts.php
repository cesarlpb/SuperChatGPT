<?php

// Conexión a la base de datos local
// Variables de conexión:
$db_host = "localhost";
$db_user = "root"; // TODO: en el futuro, crearemos un usuario con permisos
$db_password = "";
$db_name = "pruebas";

// Crear conexión
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

// Comprobar si hay errores
if(!$conn){
    die("Error en la conexión: " . mysqli_connect_error());
}
echo "Conexión exitosa!";

?>