-- Creamos tabla "prompts"
CREATE TABLE IF NOT EXISTS prompts 
( 
    id INT AUTO_INCREMENT PRIMARY KEY, 
    preguntas TEXT, 
    respuestas TEXT 
);

-- Query para insertar un dato:

INSERT INTO prompts (preguntas, respuestas) 
VALUES ("Dime que es JS?","Dicen que se programa en eso...");

-- Query para leer todos los prompts:

SELECT * from prompts;