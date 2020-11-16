<?php

require_once "db.class.php";
class Motorista2
{

    //atributos
    public $codigo;
    public $nome;
    public $habilitacao;
    public $veiculo_chassi;
    public $rastreador_codigo;


    //metodos
    public function listarTodos()
    {
        try {
            $bd = new db();
            $con = $bd->conectar();
            $sql = $con->prepare("select * from motorista");
            $sql->execute();
            if ($sql->rowCount() > 0) {
                return $result = $sql->fetchAll(PDO::FETCH_CLASS);
            }
        } catch (PDOException $msg) {
            echo "Erro ao listar os Funcionarios: " . $msg->getMessage();
        }
    }

// Descobrir como listar apenas o que foi adiconado 

    public function listarMotorista()
    {
        try {
            $bd = new db();
            $con = $bd->conectar();
            $sql = $con->prepare("select * from motorista ");
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
            if (isset($_POST['nome']) && isset($_POST['habilitacao'])) {
                $this->nome = $_POST["nome"];
                $this->habilitacao = $_POST["habilitacao"];
                $this->veiculo_chassi = $_POST["veiculo_chassi"];
                $this->rastreador_codigo = $_POST["rastreador_codigo"];

                $bd = new db();
                $con = $bd->conectar();
                $sql = $con->prepare("insert into motorista(codigo,nome,habilitacao,veiculo_chassi,rastreador_codigo)
                                  values (null,?,?,?,?)");
                $sql->execute(array(
                    $this->codigo,
                    $this->nome,
                    $this->habilitacao,
                    $this->veiculo_chassi,
                    $this->rastreador_codigo,
                ));
                if ($sql->rowCount() > 0) {
                    header("location:menu_motoristas2.php");
                }
            } else {
                header("location:menu_motoristas2.php");
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
                $sql = $con->prepare("delete from motorista where codigo = ?");
                $sql->execute(array($this->codigo));
                if ($sql->rowCount() > 0) {
                    header("location:menu_motoristas2.php");
                }
            } else {
                header("location:menu_motoristas2.php");

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
                $this->nome = $_POST["nome"];
                $this->habilitacao = $_POST["habilitacao"];
                $this->veiculo_chassi = $_POST["veiculo_chassi"];
                $this->rastreador_codigo = $_POST["rastreador_codigo"];
                $bd = new db();
                $con = $bd->conectar();
                $sql = $con->prepare("update motorista set nome=?,habilitacao=?,veiculo_chassi=?,rastreador_codigo=? where codigo=?");
                $sql->execute(array(
                    $this->codigo,
                    $this->nome,
                    $this->habilitacao,
                    $this->veiculo_chassi,
                    $this->rastreador_codigo,
                ));
                if ($sql->rowCount() > 0) {
                    header("location: menu_motoristas2.php");
                }
            } else {
                header("location: menu_motoristas2.php");
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
                $sql = $con->prepare("select * from motorista where codigo = ?");
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

