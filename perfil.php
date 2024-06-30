<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/8b4042ccf0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/perfil.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js" integrity="sha384-THVO/sM0mFD9h7dfSndI6TS0PgAGavwKvB5hAxRRvc0o9cPLohB0wb/PTA7LdUHs" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <title>Perfil</title>
</head>
<body>
    <div class="loader-content">
        <div class="loader-circle"></div>
    </div>
<?php
    session_start();
    ?>
   
    <ul class="dadosPessoais">
        <h4>Dados pessoais</h4>
        <li><b>ID:</b> <?php  echo $_SESSION['usuarioId']; ?></li>
        <li><b>Usuario:</b> <?php  echo $_SESSION['usuarioNome']; ?></li>
        <li><b>Telefone:</b> <?php  echo $_SESSION['usuarioTelefone']; ?></li>
        <li><b>Email:</b> <?php   echo $_SESSION['usuarioEmail']; ?></li>
        <li><b>Endereço:</b> <?php   echo $_SESSION['usuarioEnd']; ?></li>
        <li><a href="sair.php"><b>Sair</b></a></li>
    </ul>       

    <div class="pedidos">
        <h4>Pedidos</h4>
        <table border="1">
            <tr> 
                <td><b>Pizza</b></td> 
                <td><b>Valor</b></td> 
                <td><b>Tamanho</b></td>
                <td><b>Quantidade</b></td> 
                <td><b>Dia</b></td> 
                <td><b>Hora</b></td> 
            </tr> 
           <?php while($_SESSION['usuarios']){ ?>
            <tr> 
                <td><?php echo $_SESSION['usuarioPizza']; ?></td>
                <td><?php echo $_SESSION['usuarioPreco']; ?></td> 
                <td><?php echo $_SESSION['usuarioTamanho'] ?></td> 
                <td><?php echo $_SESSION['usuarioQtd']; ?></td> 
                <td><?php echo $_SESSION['usuarioDia']; ?></td>
                <td><?php echo $_SESSION['usuarioHora']; ?></td> 
            </tr>   
            <?php } ?>         
        </table>
    </div>

    <footer>
        <a href="https://www.linkedin.com/in/matheus-cruz-533610215/" target="_blank">© Developed by Matheus Cruz</a>
    </footer>
    <script src="js/nav.js"></script>  
   
</body>
</html>
