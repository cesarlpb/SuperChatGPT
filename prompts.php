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

echo "<h2>Prompts</h2>";

$id = $_GET["id"];
echo "id:" . $id . "<br><br>";

if($id > 0){
    $query = "SELECT * FROM prompts WHERE id=" . $id;
    $resultado = mysqli_query($conn, $query); 
    $fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
    echo "<a href='prompts.php'>Volver a Prompts!</a>";
    echo "<a href='?id=" . $fila["id"] . "'><h2>#" . $fila["id"] . "</h2></a>";
    echo "preguntas: " . $fila["preguntas"] . "<br>";
    echo "respuestas: " . $fila["respuestas"] . "<br>";
}else{
    // Query para sacar lista de usuario con id 1:
    $query = "SELECT * FROM prompts";
    $resultado = mysqli_query($conn, $query);
    // Bucle para escribir todos los prompts:
    echo "<a href='index.php'>Volver a Home!</a>";
    while($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
        echo "<a href='?id=" . $fila["id"] . "'><h2>#" . $fila["id"] . "</h2></a>";
        echo "preguntas: " . $fila["preguntas"] . "<br>";
        echo "respuestas: " . $fila["respuestas"] . "<br>";
    }
}

// Solo tenemos un dato asi que no ponemos bucle :)

// Liberamos memoria
mysqli_free_result($resultado);

//Closing the connection
mysqli_close($conn);
?>