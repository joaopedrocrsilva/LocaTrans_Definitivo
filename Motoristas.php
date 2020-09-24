<?php

require_once "db.class.php";
class Motoristas
{

    //atributos
    public $codigo;
    public $nome;
    public $numero_onibus;
    public $habilitacao;
    public $localizacao;
    public $status;


    //metodos
    public function listarTodos()
    {
        try {
            $bd = new db();
            $con = $bd->conectar();
            $sql = $con->prepare("select * from funcionario");
            $sql->execute();
            if ($sql->rowCount() > 0) {
                return $result = $sql->fetchAll(PDO::FETCH_CLASS);
            }
        } catch (PDOException $msg) {
            echo "Erro ao listar os Funcionarios: " . $msg->getMessage();
        }
    }

// Descobrir como listar apenas o que foi adiconado 

    public function listarFuncionario()
    {
        try {
            $bd = new db();
            $con = $bd->conectar();
            $sql = $con->prepare("select * from funcionario ");
            $sql->execute();
            if ($sql->rowCount() > 0) {
                return $result = $sql->fetchAll(PDO::FETCH_CLASS);
            }
        } catch (PDOException $msg) {
            echo "Erro ao listar os Funcionarios: " . $msg->getMessage();
        }
        
    }

    public function inserir()
    {
        try {
            if (isset($_POST['nome']) && isset($_POST['numero_onibus'])) {
                $this->nome = $_POST["nome"];
                $this->numero_onibus = $_POST["numero_onibus"];
                $this->habilitacao = $_POST["habilitacao"];
                $this->localizacao = $_POST["localizacao"];
                $this->status = $_POST["status"];

                $bd = new db();
                $con = $bd->conectar();
                $sql = $con->prepare("insert into funcionario(codigo,nome,numero_onibus,habilitacao,localizacao,status)
                                  values (null,?,?,?,?,?)");
                $sql->execute(array(
                    $this->nome,
                    $this->numero_onibus,
                    $this->habilitacao,
                    $this->localizacao,
                    $this->status,
                ));
                if ($sql->rowCount() > 0) {
                    header("location:index_funcionario.php");
                }
            } else {
                header("location:index_funcionario.php");
            }
        } catch (PDOException $msg) {
            echo "Não foi possivel inserir Funcionario: " . $msg->getMessage();
        }
    }


    public function excluir($codigo)
    {
        try {
            if (isset($codigo)) {
                $this->codigo = $codigo;
                $bd = new db();
                $con = $bd->conectar();
                $sql = $con->prepare("delete from funcionario where codigo = ?");
                $sql->execute(array($this->codigo));
                if ($sql->rowCount() > 0) {
                    header("location:index_proprietario.php");
                }
            } else {
                header("location:index_proprietario.php");

            }
        } catch
        (PDOException $msg) {
            echo "Não foi possível excluir o Funcionario " . $msg->getMessage();

        }
    }

    public function alterar()
    {
        try {
            if (isset($_POST['Salvar'])) {
                $this->codigo = $_GET ["codigo"];
                $this->nome = $_POST ["nome"];
                $this->numero_onibus = $_POST ["numero_onibus"];
                $this->habilitacao = $_POST ["habilitacao"];
                $this->localizacao = $_POST ["localizacao"];
                $this->status = $_POST ["status"];
                $bd = new db();
                $con = $bd->conectar();
                $sql = $con->prepare("update funcionario set nome=?,numero_onibus=?,habilitacao=?,localizacao=?,status=? where codigo=?");
                $sql->execute(array(
                    $this->nome,
                    $this->numero_onibus,
                    $this->habilitacao,
                    $this->localizacao,
                    $this->status,
                    $this->codigo,
                ));
                if ($sql->rowCount() > 0) {
                    header("location: index_proprietario.php");
                }
            } else {
                header("location: index_proprietario.php");
            }
        } catch
        (PDOException $msg) {
            echo "Não foi possivel alterar dados do Funcionario: " . $msg->getMessage();
        }
    }
    public function listarID($codigo)
    {
        try {
            if (isset($codigo)) {
                $this->codigo = $codigo;
                $bd = new db();
                $con = $bd->conectar();
                $sql = $con->prepare("select * from funcionario where codigo = ?");
                $sql->execute(array($this->codigo));
                if ($sql->rowCount() > 0) {
                    return $result = $sql->fetchObject();
                }
            }
        } catch
        (PDOException $msg) {
            echo "Não foi possível listar os Funcionarios: " . $msg->getMessage();

        }
    }
}

