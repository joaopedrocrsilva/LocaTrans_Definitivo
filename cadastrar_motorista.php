<?php

require_once('Conexao.php');

$nome = $_POST['nome'];
$habilitacao = $_POST['habilitacao'];
$habilitacao = $_POST['habilitacao'];
$veiculo_chassi = $_POST['veiculo_chassi'];
$rastreador_codigo = $_POST['rastreador_codigo'];


$sql = "INSERT INTO motorista (nome, habilitacao, veiculo_chassi, rastreador_codigo ) VALUES ('$nome', '$habilitacao', '$veiculo_chassi', '$rastreador_codigo')";

$objDb = new ConexaoBD();
$link = $objDb->conecta_mysql();

    //executar a query
    if(mysqli_query($link, $sql)){

        header('Location: cadastro_motorista.html?erro=1');
        
        echo "Usuário registrado com sucesso!";
    }else{
        echo "Erro ao registrar o usuário!";
    }

?>

