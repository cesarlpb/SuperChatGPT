const http = require("http")

http.createServer(function(req, res){
  // Establecer las cabeceras CORS
  res.setHeader('Access-Control-Allow-Origin', '*');
  res.setHeader('Access-Control-Allow-Methods', 'GET');
  res.setHeader('Access-Control-Allow-Headers', 'Content-Type');
  res.writeHead(200, {"Content-Type": "application/json; charset = UTF-8"});
  res.end(JSON.stringify("{'data': 'prompts'}"))
}).listen(5000, () => console.log("http://localhost:5000/prompts"))