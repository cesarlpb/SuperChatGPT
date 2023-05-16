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

// Query para sacar lista de usuario con id 1:
$query = "SELECT * FROM prompts";
$resultado = mysqli_query($conn, $query);
// Pasamos el objeto a un array:
$arr = mysqli_fetch_array($resultado); 

// Bucle para avisar si el query funcionó

echo "<h2>Prompts</h2>";
// Escribir los resultados (normalmente con un bucle):
echo "id: " . $arr["id"] . "<br>";
echo "preguntas: " . $arr["preguntas"] . "<br>";
echo "respuestas: " . $arr["respuestas"] . "<br>";
// Solo tenemos un dato asi que no ponemos bucle :)
?>