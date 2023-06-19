<?php
echo "<h2>Respuestas</h2>";
// echo "Formulario recibido";

$prompt = $_POST["question"];
echo "<p>Pregunta: " . $prompt . "</p>";

$url = 'https://api.openai.com/v1/completions';
$api_key = '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'; // Reemplaza con tu token de autorización

$data = array(
    'model' => 'text-davinci-003',
    'prompt' => $prompt,
    'max_tokens' => 3000,
    'temperature' => 1 
);

$payload = json_encode($data);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $api_key
));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response, true);
$answer = $result['choices'][0]['text'];

echo "<p>Respuesta:</p>";
echo $answer;

// Guardado automático?
if(isset($prompt) && isset($answer)){
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
    $query = "INSERT INTO prompts (preguntas, respuestas) 
    VALUES ('$prompt','$answer')";
    $resultado = mysqli_query($conn, $query);
    echo "<br><br>Resultado:" . $resultado;
}
?>