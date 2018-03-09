<?php
    class UsuarioDAO{
        private $conexao;
        
        public function __construct(){
           $this->conexao = new Conexao(); 
        }
        
        //Autênticar Login
        public function login($nome, $senha){
            $sql = "SELECT * FROM login where nome='$nome' and senha='$senha'";
            $resultado = mysqli_query($this->conexao->getCon(), $sql);
            
            if(mysqli_num_rows($resultado) > 0){//Se confirmar os dados
                return $resultado; 
             }else{//Se não confirmar os dados
                 return false;
             }  
        }

    }
    
?>