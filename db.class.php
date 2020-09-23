<?php

class db
{

    //atributos

    private $servidor;
    private $banco;
    private $usuario;
    private $senha;

    //metodos

    function __construct()
    {
        //definir os valores para conexao
        $this->servidor = "localhost";
        $this->banco = "locatrans_def";
        $this->usuario = "root";
        $this->senha = "";
    }

    //metodo para criar a conexao
    public function conectar()
    {
        try {
            //criar a conexao com o PDO
            $con = new PDO("mysql:host=" . $this->servidor . ";dbname=".$this->banco.";charset=utf8;", $this->usuario, $this->senha);
            //retornar a conexao
            return $con;
        } catch (PDOException $msg) {
            echo "Erro ao conectar: " . $msg->getMessage();
        } finally {
            //metodo sempre executado
            //$con = null;
        }
    }
}

?>
