<?php

    require_once('Conexao.php');

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $cargo = $_POST['cargo'];

    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha' AND cargo = '$cargo'";

    $objDb = new ConexaoBD();
    $link = $objDb->conecta_mysql();

    $resultado_id = mysqli_query($link, $sql);

    if($resultado_id){

        $dados_usuario = mysqli_fetch_array($resultado_id);

        if(isset($dados_usuario['usuario']) && $cargo == 'proprietario' ){

            header('Location: menu_proprietario.php?erro=1');

        }
        else if (isset($dados_usuario['usuario']) && $cargo == 'funcionario' ){
            
            header('Location: menu_funcionario.php?erro=1');

        }
        else{

            header('Location: Login_proprietario.php?erro=1');

        }

    }else{
        
        echo "Erro na execução da consulta, favor entrar em contato com o admin do site";

    }

?>