<?php

// Inicia sessões
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pizzaria";
$charset = 'utf8mb4';

// Cria conexão
$conn = new mysqli($servername, $username, $password, $dbname);


// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

//O campo usuário e senha preenchido entra no if para validar
if((isset($_POST['user'])) && (isset($_POST['pass']))){
    $usuario = mysqli_real_escape_string($conn, $_POST['user']); //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
    $senha = mysqli_real_escape_string($conn, $_POST['pass']);
   

    //Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
    $result_usuario = "SELECT * FROM testepedidos WHERE user = '$usuario' && pass = '$senha'";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    $resultado = mysqli_fetch_assoc($resultado_usuario);    

     //Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
     if(isset($resultado)){       
            $_SESSION['usuarios'] = mysqli_fetch_assoc($resultado_usuario);
            $_SESSION['usuarioId'] = $resultado['id'];
            $_SESSION['usuarioNome'] = $resultado['nome'];
            $_SESSION['usuarioTelefone'] = $resultado['telefone'];
            $_SESSION['usuarioEmail'] = $resultado['email'];
            $_SESSION['usuarioEnd'] = $resultado['endereco'];
            $_SESSION['usuarioPizza'] = $resultado['pizza'];
            $_SESSION['usuarioPreco'] = $resultado['preco'];
            $_SESSION['usuarioTamanho'] = $resultado['tamanho'];
            $_SESSION['usuarioQtd'] = $resultado['qtd'];
            $_SESSION['usuarioDia'] = $resultado['dia'];
            $_SESSION['usuarioHora'] = $resultado['hora'];
       
        header("Location: perfil.php");
       
    //Não foi encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
    //redireciona o usuario para a página de login
    }else{    
        //Váriavel global recebendo a mensagem de erro
        $_SESSION['loginErro'] = "Usuário ou senha Inválido";
        header("Location: login.html");
    }
//O campo usuário e senha não preenchido entra no else e redireciona o usuário para a página de login
}else{
    $_SESSION['loginErro'] = "Usuário ou senha inválido";
    header("Location: login.html");

}



