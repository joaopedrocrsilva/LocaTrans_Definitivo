<?php

require_once('Conexao.php');

$chassi = $_POST['chassi'];
$modelo = $_POST['modelo'];
$marca = $_POST['marca'];
$ano = $_POST['ano'];
$placa = $_POST['placa'];
$status = $_POST['status'];

$sql = "INSERT INTO veiculo (chassi, modelo, marca, ano, placa, status) VALUES ('$chassi', '$modelo', '$marca', '$ano', '$placa', '$status')";

$objDb = new ConexaoBD();
$link = $objDb->conecta_mysql();

    //executar a query
    if(mysqli_query($link, $sql)){

        header('Location: cadastro_veiculo.html?erro=1');
        
        echo "Veiculo registrado com sucesso!";
    }else{
        echo "Erro ao registrar o usuário!";
    }

?>



