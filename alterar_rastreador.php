<?php
header("Content-type:text/html; charset=utf8");
//importar a classe Alunos
require_once "Rastreador.php";
//instaciar a classe Alunos
$Rastreador = new Rastreador();

//recuperar os dados do aluno escolhido no index_alunos.php
if(isset($_GET["codigo"])) {
    $dadosRastreador = $Rastreador->listarID($_GET["codigo"]);

}
//chamando a função alterar após o usuário clicar no botão salvar
if(isset($_POST["Salvar"])){
//   chamar a funcao alterar
    $Rastreador->alterar();
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
            <form action="alterar_rastreador.php?codigo=<?php echo $dadosRastreador->codigo; ?>" method="post">
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label for="codigo">Codigo</label>
                            <input type="text" name="codigo" class="form-control" value="<?php echo $dadosRastreador->codigo; ?>" >
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="localizacao">Localizacao</label>
                            <input type="text" name="localizacao" class="form-control" value="<?php echo  $dadosRastreador->localizacao; ?>">
                        </div>

                    </div>
                    <div align="center">
                        <button class="btn btn-success" type="submit" name="Salvar">Salvar</button>
                        <a class="btn btn-outline-danger" href="menu_rastreador.php">Cancelar</a>
                    </div>
            </form>
        </div>
    </div>
</div>
</body>
</html