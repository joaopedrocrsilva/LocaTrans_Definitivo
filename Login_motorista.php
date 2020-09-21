<?php
header("Content-type:text/html; charset=utf8");
?>

<!DOCTYPE html>
<html lang="en">



<head>
<title>LocaTrans</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
</head>





<body>





<!-- LOGIN -->
<div class="tudo">
    <div class="login">

        <div align="center">
        <img src="imagens/logo-locatrans.png" alt="" width="200px" height="200px" >
        </div>

        <form method="post" action="#" id="login_forms">

            <div class="form-group"> 
            <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Código"/>
            </div>
            
            <div class="form-group">
            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuário" />
            </div>
    
            <div class="form-group">
            <input type="password" class="form-control red" id="senha" name="senha" placeholder="Senha" />
            </div>


            <div align = "center">
            <a href="#" class="btn btn-outline-primary">Entrar</a>
            </div>

        </form>

    </div>
</div>
<!-- Fim LOGIN -->





</body>
</html>