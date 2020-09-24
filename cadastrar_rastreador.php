<?php

require_once('Conexao.php');

$codigo = $_POST['codigo'];
$localizacao = $_POST['localizacao'];

$sql = "INSERT INTO rastreador (codigo, localizacao) VALUES ('$codigo', '$localizacao')";

$objDb = new ConexaoBD();
$link = $objDb->conecta_mysql();

    //executar a query
    if(mysqli_query($link, $sql)){

        header('Location: cadastro_rastreador.html?erro=1');
        
        echo "Usuário registrado com sucesso!";
    }else{
        echo "Erro ao registrar o usuário!";
    }

?>

