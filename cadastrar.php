<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pizzaria";

// Cria conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verifica se os dados foram enviados
if (isset($_POST['info'])) {
    $info = json_decode($_POST['info'], true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        echo json_encode(array("status" => "error", "message" => "Erro na decodificação JSON: " . json_last_error_msg()));
        exit;
    }

    $nome = $conn->real_escape_string($info['nome']);
    $cpf = $conn->real_escape_string($info['cpf']);
    $email = $conn->real_escape_string($info['email']);
    $telefone = $conn->real_escape_string($info['telefone']);
    $pizza = $conn->real_escape_string($info['pizza']);
    $desc = $conn->real_escape_string($info['desc']);
    $qtd = $conn->real_escape_string($info['qtd']);
    $preco = $conn->real_escape_string($info['preco']);
    $tamanho = $conn->real_escape_string($info['tamanho']);
    $dia = $conn->real_escape_string($info['dia']);
    $hora = $conn->real_escape_string($info['hora']);
    $user = $conn->real_escape_string($info['user']);
    $pass = $conn->real_escape_string($info['pass']);
    $end = $conn->real_escape_string($info['end']);
    $pag = $conn->real_escape_string($info['pagamento']);

    // Insere os dados no banco de dados
    $sql = "INSERT INTO testepedidos (nome, cpf, email, telefone, pizza, descricao, qtd, preco, tamanho, dia, hora, user, pass, endereco, pagamento) 
    VALUES ('$nome', '$cpf', '$email', '$telefone', '$pizza', '$desc', '$qtd', '$preco', '$tamanho', '$dia', '$hora', '$user', '$pass', '$end', '$pag')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(array("status" => "success", "message" => "Pedido inserido com sucesso"));
    } else {
        echo json_encode(array("status" => "error", "message" => "Erro: " . $conn->error));
    }
} else {
    echo json_encode(array("status" => "error", "message" => "Nenhum dado recebido"));
}

$conn->close();

