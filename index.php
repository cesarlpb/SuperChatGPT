<!DOCTYPE html> 
<html lang="es"> 

<head>
  <meta charset="UTF-8"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SuperChatGPT</title> 
  <link rel="icon" href="./logo.png">
  <link href="styles.css" rel="stylesheet">
</head>
 
<body> 
 <header>
    <div class="encabezado">
      <h1 class="titulo">SuperChatGPT</h1>
      <div class="logo">
        <img class="img_logo" src="https://raw.githubusercontent.com/cesarlpb/SuperChatGPT/main/logo.png" alt="logo">
      </div>
      <div>
        <a href="prompts.php" style="color: white;">Ver prompts</a>
      </div>
    </div>
 </header>

 <div class="container">
  <div class="background">
    <div id="my-div"></div>

  <section class="sec-pre">
      <label for="question">Pregunta:</label><br>
      <textarea id="question" name="question" rows="4" cols="50" placeholder="🥑🥑🥑¿Te gustan los aguacates?🥑🥑🥑"></textarea>
      <br><br>
      <button onclick="pedirPrompt()">Enviar</button>
  </section>    

  <section class="sec-res">   
    <form>
      <label for="answer">Respuesta:</label><br>
      <textarea id="answer" name="answer" rows="10" cols="77" placeholder="🥑🥑🥑Me gustan los aguacates y las papayas...;D🥑🥑🥑"></textarea>
      <button onclick="">Guardar respuesta</button>
    </form> 
  </section> 
  </div>
 </div>  

    <footer>
    <p>Derechos de SuperChatGPT © 2023</p>
    <small class="text-muted">No se lastimaron aguacates en esta página. Presuntamente.</small>
  </footer>
  <script>
    function pedirPrompt(){
      // let elementApiKey = document.getElementById("api-key-input");
      // let valor = elementApiKey.value;
      let elementPrompt = document.getElementById("question")
      let prompt = elementPrompt.value;
      let elementAnswer = document.getElementById("answer")
      //elementAnswer.innerText = valor + valor2
      fetch("https://api.openai.com/v1/completions", {
              method: "POST",
              headers: {
                "Content-Type": "application/json",
                "Authorization": "Bearer " + valor
              },
              body: JSON.stringify({
                "model": "text-davinci-003",
                "prompt": prompt,
                "max_tokens": 3000,
                "temperature": 0
              })
            })
            .then(response => response.json())
            .then(data => document.getElementById("answer").innerText=data.choices[0].text)
            .catch(error => console.error(error))

    }

   </script>  
</body>
</html>