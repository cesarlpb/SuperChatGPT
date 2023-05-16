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
// echo "Conexión exitosa!";

// Query para sacar lista de usuario con id 1:
$query = "SELECT * FROM prompts";
$resultado = mysqli_query($conn, $query); 

// Bucle para avisar si el query funcionó

echo "<h2>Prompts</h2>";

// Bucle para escribir todos los prompts:
while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
    echo "<h2>#" . $fila["id"] . "</h2>";
    echo "preguntas: " . $fila["preguntas"] . "<br>";
    echo "respuestas: " . $fila["respuestas"] . "<br>";
}
// Solo tenemos un dato asi que no ponemos bucle :)

// Liberamos memoria
mysqli_free_result($resultado);

//Closing the connection
mysqli_close($conn);
?>