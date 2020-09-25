<?php
header("Content-type:text/html; charset=utf8");
//importar a classe Alunos
require_once "Motorista.php";
//instaciar a classe Alunos
$Motorista = new Motorista();

//recuperar os dados do aluno escolhido no index_alunos.php
if(isset($_GET["codigo"])) {
    $dadosMotorista = $Motorista->listarID($_GET["codigo"]);

}
//chamando a função alterar após o usuário clicar no botão salvar
if(isset($_POST["Salvar"])){
//   chamar a funcao alterar
    $Motorista->alterar();
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
            <form action="alterar_motorista.php?codigo=<?php echo $dadosMotorista->codigo; ?>" method="post">
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" class="form-control" value="<?php echo $dadosMotorista->nome; ?>" >
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="habilitacao">Habilitação</label>
                            <input type="text" name="habilitacao" class="form-control" value="<?php echo  $dadosMotorista->habilitacao; ?>">
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="veiculo_chassi">Chassi</label>
                            <input type="text" name="veiculo_chassi" class="form-control" value="<?php echo $dadosMotorista->veiculo_chassi; ?>">
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="rastreador_codigo">Rastreador</label>
                            <input type="text" name="rastreador_codigo" class="form-control" value="<?php echo $dadosMotorista->rastreador_codigo; ?>">
                        </div>

                    </div>
                    <div align="center">
                        <button class="btn btn-success" type="submit" name="Salvar">Salvar</button>
                        <a class="btn btn-outline-danger" href="menu_motoristas.php">Cancelar</a>
                    </div>
            </form>
        </div>
    </div>
</div>
</body>
</html