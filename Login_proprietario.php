<?php
	$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;
?>

<!DOCTYPE html>
<html>



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

        
        <form method="post" action="validar_acesso.php" id="formLogin">

            <div class="form-group">
            <label for="usuario">Usuario</label>
            <input type="text" class="form-control" id="campo_usuario" name="usuario" placeholder="Usuário" />
            </div>
    
            <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" class="form-control red" id="campo_senha" name="senha" placeholder="Senha" />
            </div>


            <div class="form-group">
                  <label for="cargo">Cargo</label>
                  <select  id="campo_cargo" name="cargo" placeholder="Cargo" class="form-control" >
                      <option value="proprietario">Proprietario</option>
                      <option value="funcionario">Funcionario</option>
                  </select>
              </div>

            <div align = "center">
            <button type="buttom" class="btn btn-sucess" id="btn_login">Entrar</button>
            </div>



        </form>

        <?php
            if($erro == 1){
                echo '<font color="#FF0000">Usuário e ou senha inválido(s)</font>';
                    }
        ?>
        
    </div>
</div>
<!-- Fim LOGIN -->





</body>
</html>




