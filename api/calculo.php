<?php 
    


// header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
// header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With");


// Ler o corpo da requisição JSON
//echo json_encode($_GET);
// var_dump($_GET);
//die;



header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');

if (isset($_GET['n1']) && isset($_GET['n2']) && isset($_GET['operacao'])) {
    $n1 = (float)$_GET['n1'];
    $n2 = (float)$_GET['n2'];
    $operacao = $_GET['operacao'];
    $resultado = 0;

    switch ($operacao) {
    case '+':
            $resultado = $n1 + $n2;
            break;
        case '-':
            $resultado = $n1 - $n2;
            break;
        case '*':
            $resultado = $n1 * $n2;
            break;
        case '/':
            if ($n2 != 0) {
                $resultado = $n1 / $n2;
            } else {
                echo json_encode(["error" => "Divisão por zero não é permitida."]);
                exit;
            }
            break;
        default:
            echo json_encode(["error" => "Operação inválida."]);
            exit;
    }

    echo json_encode(["resultado" => $resultado]);
} else {
    echo json_encode(["error" => "Parâmetros inválidos."]);
}

