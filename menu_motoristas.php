<?php
header("Content-type:text/html; charset=utf8");
require_once "Motorista.php";
$motorista = new Motorista();
$listaMotorista = $motorista->listarTodos();
if(isset($_GET["codigo"])){
    $motorista->excluir($_GET["codigo"]);
}
?>


<!doctype html>
<html lang="en">
  <head>
    <title>LocaTrans</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/">
    <link rel="stylesheet" href="js/">
</head>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">
    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Proprietario</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="Login_proprietario.php">Sair</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">

          <li class="nav-item">
            <a class="nav-link" href="menu_proprietario.php">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="menu_motoristas.php">
              <span data-feather="file"></span>
              Menu Motoristas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cadastro_veiculo.html">
              <span data-feather="file"></span>
              Cadastro Veiculo
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cadastro_rastreador.html">
              <span data-feather="file"></span>
              Cadastro Rastreador
            </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="cadastro_motorista.html">
                  <span data-feather="file"></span>
                  Cadastro Motorista
                </a>
                </li>
          <li class="nav-item">
              <a class="nav-link" href="cadastro_usuario.html">
                <span data-feather="file"></span>
                Cadastro Usuario
              </a>
            </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Menu Motoristas</h1>
      </div>
    </main>
  </div>
</div>







<div class="container lista">
    <div class="row">
        <div class="col-md-10">
            <h3>Frota</h3>
        </div>
    </div>
    <div style="overflow-x:auto;">
        <table class="table table-active" style="border-radius: 10px">
            <thead>
                 <tr>
                    <th>Codigo</th>
                    <th>Nome</th>
                    <th>Habilitação</th>
                    <th>Chassi</th>
                    <th>Rastreador</th>
                </tr>
            </thead>

            <tbody>
<!--            Listar os alunos vindo do banco de dados-->
                <?php if($listaMotorista) :
                     foreach ($listaMotorista as $motorista) : ?>
                        <tr>
                        <td><?php echo $motorista->codigo; ?></td>
                        <td><?php echo $motorista->nome; ?></td>
                        <td><?php echo $motorista->habilitacao; ?></td>
                        <td><?php echo $motorista->veiculo_chassi; ?></td>
                        <td><?php echo $motorista->rastreador_codigo; ?></td>
                        <td>
                            <a href="alterar_motorista.php?codigo=<?php echo $motorista->codigo; ?>" class="btn btn-outline-success"><img src="imagens/edit.png"></a>
                            <a href="menu_motoristas.php?codigo=<?php echo $motorista->codigo; ?>" class="btn btn-outline-danger"><img src="imagens/delete.png"></a>
                        </td>
                    </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td colspan="6">Nenhum Funcionario Efetuou o Cadastro.</td>
            </tr>
            <?php endif; ?>
            </tbody>
        </table>
        </div>
    </div>
</div>
























<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="dashboard.js"></script></body>
</html>
