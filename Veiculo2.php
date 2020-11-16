<?php

require_once "db.class.php";
class Veiculo2
{

    //atributos
    public $chassi;
    public $modelo;
    public $marca;
    public $ano;
    public $placa;
    public $status;


    //metodos
    public function listarTodos()
    {
        try {
            $bd = new db();
            $con = $bd->conectar();
            $sql = $con->prepare("select * from veiculo");
            $sql->execute();
            if ($sql->rowCount() > 0) {
                return $result = $sql->fetchAll(PDO::FETCH_CLASS);
            }
        } catch (PDOException $msg) {
            echo "Erro ao listar os Veiculos: " . $msg->getMessage();
        }
    }

// Descobrir como listar apenas o que foi adiconado 

    public function listarVeiculo()
    {
        try {
            $bd = new db();
            $con = $bd->conectar();
            $sql = $con->prepare("select * from veiculo ");
            $sql->execute();
            if ($sql->rowCount() > 0) {
                return $result = $sql->fetchAll(PDO::FETCH_CLASS);
            }
        } catch (PDOException $msg) {
            echo "Erro ao listar os Veiculos: " . $msg->getMessage();
        }
        
    }

    public function inserir()
    {
        try {
            if (isset($_POST['chassi']) && isset($_POST['modelo'])) {
                $this->chassi = $_POST["chassi"];
                $this->modelo = $_POST["modelo"];
                $this->marca = $_POST["marca"];
                $this->ano = $_POST["ano"];
                $this->placa = $_POST["placa"];
                $this->status = $_POST["status"];

                $bd = new db();
                $con = $bd->conectar();
                $sql = $con->prepare("insert into veiculo(chassi,modelo,marca,ano,placa,status)
                                  values (?,?,?,?,?,?)");
                $sql->execute(array(
                    $this->chassi,
                    $this->modelo,
                    $this->marca,
                    $this->ano,
                    $this->placa,
                    $this->status,
                ));
                if ($sql->rowCount() > 0) {
                    header("location:menu_veiculo2.php");
                }
            } else {
                header("location:menu_veiculo2.php");
            }
        } catch (PDOException $msg) {
            echo "Não foi possivel inserir Veiculo: " . $msg->getMessage();
        }
    }


    public function excluir($chassi)
    {
        try {
            if (isset($chassi)) {
                $this->chassi = $chassi;
                $bd = new db();
                $con = $bd->conectar();
                $sql = $con->prepare("delete from veiculo where chassi = ? ");
                $sql->execute(array($this->chassi));
                if ($sql->rowCount() > 0) {
                    header("location:menu_veiculo2.php");
                }
            } else {
                header("location:menu_veiculo2.php");

            }
        } catch
        (PDOException $msg) {
            echo "Não foi possível excluir o Veiculo " . $msg->getMessage();

        }
    }

    public function alterar()
    {
        try {
            if (isset($_POST['Salvar'])) {
                $this->chassi = $_POST["chassi"];
                $this->modelo = $_POST["modelo"];
                $this->marca = $_POST["marca"];
                $this->ano = $_POST["ano"];
                $this->placa = $_POST["placa"];
                $this->status = $_POST["status"];
                $bd = new db();
                $con = $bd->conectar();
                $sql = $con->prepare("update veiculo set chassi=?, modelo=?,marca=?,ano=?,placa=?,status=?");
                $sql->execute(array(
                    $this->chassi,
                    $this->modelo,
                    $this->marca,
                    $this->ano,
                    $this->placa,
                    $this->status,
                ));
                if ($sql->rowCount() > 0) {
                    header("location: menu_veiculo2.php");
                }
            } else {
                header("location: menu_veiculo2.php");
            }
        } catch
        (PDOException $msg) {
            echo "Não foi possivel alterar dados do Veiculo: " . $msg->getMessage();
        }
    }
    public function listarID($chassi)
    {
        try {
            if (isset($chassi)) {
                $this->chassi = $chassi;
                $bd = new db();
                $con = $bd->conectar();
                $sql = $con->prepare("select * from veiculo where chassi = ?");
                $sql->execute(array($this->chassi));
                if ($sql->rowCount() > 0) {
                    return $result = $sql->fetchObject();
                }
            }
        } catch
        (PDOException $msg) {
            echo "Não foi possível listar os Veiculo: " . $msg->getMessage();

        }
    }
}

