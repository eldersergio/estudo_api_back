<?php
require_once "cadastro.php";

$cadastro = new Usuario();

$metodo = $_SERVER['REQUEST_METHOD'];

header("Content-Type: application/json");

switch ($metodo) {
    case 'POST':
        $data = json_decode(file_get_contents("php://input"));
        $cadastro->create($data->usuario, $data->senha);
        break;
    
    case 'GET':    
        if (isset($_GET['id_usuario'])) {
            $cadastro->read($_GET['id_usuario']);
        } else {
            $cadastro->read($_GET);
        }
        break;
    default:
        # code...
        break;
}