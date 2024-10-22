<?php
require_once "conexao.php";
// // Permitir CORS para qualquer origem
// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
// header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With");


// // Ler o corpo da requisição JSON
// $inputJSON = file_get_contents('php://input');
// $input = json_decode($inputJSON, TRUE);

// var_dump($input);
// die;

class Usuario
{
    private $conn;

    public function __construct()
    {
        $conexao = new Conexao();
        $this->conn = $conexao->conectar();
    }

    // Cadastro de usuario
    public function create($usuario, $senha) {
        $sql = "INSERT INTO usuario (usuario, senha) 
                        VALUES 
                (:usuario, :senha)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":usuario", $usuario);
        $stmt->bindParam(":senha", $senha);

        if ($stmt->execute()) {
            echo json_encode(["message" => "Usuário criado com sucesso!"]);
        } else {
            echo json_encode(["message" => "Usuário não cadastrado"]);
        }
    }

    public function read($idUsuario) {
      
      if ($idUsuario) {
      $sql = "SELECT 
                * 
               FROM usuario  
               WHERE id_usuario = :id_usuario";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":id_usuario", $idUsuario);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        $sql = "SELECT * FROM usuario";
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    echo json_encode($result);
      
    }

}
