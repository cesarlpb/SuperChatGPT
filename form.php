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
    'temperature' => 0
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
?>