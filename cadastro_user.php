<?php

    require_once('Conexao.php');

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $cargo = $_POST['cargo'];

    $objDb = new Conexao();
    $link = $objDb->conectar();

    $sql = "INSERT INTO usuarios (usuario, senha, cargo) VALUES ('$usuario', '$senha', '$cargo')";

    //executar a query
    if(mysqli_query($link, $sql)){
        echo "Usuário registrado com sucesso!";
    }else{
        echo "Erro ao registrar o usuário!";
    }

?>