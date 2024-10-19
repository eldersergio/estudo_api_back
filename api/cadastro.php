<?php 
// Permitir CORS para qualquer origem
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With");


// Ler o corpo da requisição JSON
$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);

var_dump($input);
die;

