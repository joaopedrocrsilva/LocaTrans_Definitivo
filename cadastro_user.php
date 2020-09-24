<?php

require_once('Conexao.php');

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$cargo = $_POST['cargo'];

$sql = "INSERT INTO usuarios (usuario, senha, cargo) VALUES ('$usuario', '$senha', '$cargo')";

$objDb = new ConexaoBD();
$link = $objDb->conecta_mysql();

    //executar a query
    if(mysqli_query($link, $sql)){

        header('Location: cadastro_usuario.html?erro=1');
        
        echo "Usuário registrado com sucesso!";
    }else{
        echo "Erro ao registrar o usuário!";
    }

?>



