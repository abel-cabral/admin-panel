<?php
header('Content-Type: text/html; charset=utf-8');
class Conexao{
    private $usuario = "u211833621_abel";
    private $senha = "fcJC1DUwv4f4";
    private $caminho = "mysql.hostinger.com.br";
    private $banco = "u211833621_rpb";
    private $con;
    
    public function __construct(){
        $this->con = mysqli_connect($this->caminho, $this->usuario, $this->senha) or die('Falha na Conexão com o Banco de Dados'. mysqli_erro($this->con));  
        $this->con->set_charset("utf8");//Definimos pro PHP estabelecer uma concexao utf8 com o BD, obs tem que configurar o banco de dados para utf8      
        mysqli_select_db($this->con, $this->banco) or die ('Conexão com o Banco Falhou'. mysqli_error($this->con));
    }
    
    public function getCon(){
        return $this->con;
    }
}
?>