// Para ejecutar:
// Abrir consola en navegador
// Pegar codigo
// cambiar API_KEY
// Enter
// :)

fetch("https://api.openai.com/v1/completions", {
  method: "POST",
  headers: {
    "Content-Type": "application/json",
    "Authorization": "Bearer tu-api-key"
  },
  body: JSON.stringify({
    "model": "text-davinci-003",
    "prompt": "Hazme un archivo html para una app que pida un prompt y me muestre la respuesta",
    "max_tokens": 3000,
    "temperature": 0
  })
})
.then(response => response.json())
.then(data => console.log(data.choices[0].text))
.catch(error => console.error(error))