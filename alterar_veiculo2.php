<?php
header("Content-type:text/html; charset=utf8");
//importar a classe Alunos
require_once "Veiculo2.php";
//instaciar a classe Alunos
$Veiculo = new Veiculo2();

//recuperar os dados do aluno escolhido no index_alunos.php
if(isset($_GET["chassi"])) {
    $dadosVeiculo = $Veiculo->listarID($_GET["chassi"]);

}
//chamando a função alterar após o usuário clicar no botão salvar
if(isset($_POST["Salvar"])){
//   chamar a funcao alterar
    $Veiculo->alterar();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>LocaTrans</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand/logo -->
    <a class="navbar-brand" href="index.php">Locatrans</a>
</nav>

<div class="container lista">
            <div align="center">
                <img src="imagens/logo-locatrans.png" alt="Logo" widght="200" height="200">
            </div>
        <div class="row">
        <div class="col-lg-12">
            <form action="alterar_veiculo2.php?codigo=<?php echo $dadosVeiculo->chassi; ?>" method="post">
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label for="chassi">Chassi</label>
                            <input type="text" name="chassi" class="form-control" value="<?php echo $dadosVeiculo->chassi; ?>" >
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="modelo">Modelo</label>
                            <input type="text" name="modelo" class="form-control" value="<?php echo  $dadosVeiculo->modelo; ?>">
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="marca">Marca</label>
                            <input type="text" name="marca" class="form-control" value="<?php echo $dadosVeiculo->marca; ?>">
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="ano">Ano</label>
                            <input type="text" name="ano" class="form-control" value="<?php echo $dadosVeiculo->ano; ?>">
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="placa">Placa</label>
                            <input type="text" name="placa" class="form-control" value="<?php echo $dadosVeiculo->placa; ?>">
                        </div>
                        <div class="form-group col-lg-12">
                        <label for="status">Status</label>
                            <select  name="status" class="form-control" >
                                <option value="<?php echo $dadosVeiculo->status; ?>">Normal</option>
                                <option value="<?php echo $dadosVeiculo->status; ?>">Assalto</option>
                                <option value="<?php echo $dadosVeiculo->status; ?>">Problema Mecanico</option>
                                <option value="<?php echo $dadosVeiculo->status; ?>">Acidente</option>
                            </select>
                        </div>

                    </div>
                    <div align="center">
                        <button class="btn btn-success" type="submit" name="Salvar">Salvar</button>
                        <a class="btn btn-outline-danger" href="menu_veiculo2.php">Cancelar</a>
                    </div>
            </form>
        </div>
    </div>
</div>
</body>
</html




                        