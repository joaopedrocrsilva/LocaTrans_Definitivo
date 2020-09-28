<?php

require_once "db.class.php";
class Rastreador
{

    //atributos
    public $codigo;
    public $localizacao;


    //metodos
    public function listarTodos()
    {
        try {
            $bd = new db();
            $con = $bd->conectar();
            $sql = $con->prepare("select * from rastreador");
            $sql->execute();
            if ($sql->rowCount() > 0) {
                return $result = $sql->fetchAll(PDO::FETCH_CLASS);
            }
        } catch (PDOException $msg) {
            echo "Erro ao listar os Rastreador: " . $msg->getMessage();
        }
    }

// Descobrir como listar apenas o que foi adiconado 

    public function listarVeiculo()
    {
        try {
            $bd = new db();
            $con = $bd->conectar();
            $sql = $con->prepare("select * from rastreador ");
            $sql->execute();
            if ($sql->rowCount() > 0) {
                return $result = $sql->fetchAll(PDO::FETCH_CLASS);
            }
        } catch (PDOException $msg) {
            echo "Erro ao listar os Rastreador: " . $msg->getMessage();
        }
        
    }

    public function inserir()
    {
        try {
            if (isset($_POST['codigo']) && isset($_POST['localizacao'])) {
                $this->codigo = $_POST["codigo"];
                $this->localizacao = $_POST["localizacao"];

                $bd = new db();
                $con = $bd->conectar();
                $sql = $con->prepare("insert into rastreador(codigo,localizacao)
                                  values (?,?)");
                $sql->execute(array(
                    $this->codigo,
                    $this->localizacao,
                ));
                if ($sql->rowCount() > 0) {
                    header("location:menu_rastreador.php");
                }
            } else {
                header("location:menu_rastreador.php");
            }
        } catch (PDOException $msg) {
            echo "Não foi possivel inserir Rastreador: " . $msg->getMessage();
        }
    }


    public function excluir($codigo)
    {
        try {
            if (isset($codigo)) {
                $this->chassi = $codigo;
                $bd = new db();
                $con = $bd->conectar();
                $sql = $con->prepare("delete from rastreador where codigo = ? ");
                $sql->execute(array($this->chassi));
                if ($sql->rowCount() > 0) {
                    header("location:menu_rastreador.php");
                }
            } else {
                header("location:menu_rastreador.php");

            }
        } catch
        (PDOException $msg) {
            echo "Não foi possível excluir o Rastreador " . $msg->getMessage();

        }
    }

    public function alterar()
    {
        try {
            if (isset($_POST['Salvar'])) {
                $this->codigo = $_POST["codigo"];
                $this->localizacao = $_POST["localizacao"];
                $bd = new db();
                $con = $bd->conectar();
                $sql = $con->prepare("update rastreador set codigo=?, localizacao=?");
                $sql->execute(array(
                    $this->codigo,
                    $this->localizacao,
                ));
                if ($sql->rowCount() > 0) {
                    header("location: menu_rastreador.php");
                }
            } else {
                header("location: menu_rastreador.php");
            }
        } catch
        (PDOException $msg) {
            echo "Não foi possivel alterar dados do Rastreador: " . $msg->getMessage();
        }
    }
    public function listarID($codigo)
    {
        try {
            if (isset($codigo)) {
                $this->codigo = $codigo;
                $bd = new db();
                $con = $bd->conectar();
                $sql = $con->prepare("select * from rastreador where codigo = ?");
                $sql->execute(array($this->codigo));
                if ($sql->rowCount() > 0) {
                    return $result = $sql->fetchObject();
                }
            }
        } catch
        (PDOException $msg) {
            echo "Não foi possível listar os Rastreador: " . $msg->getMessage();

        }
    }
}

