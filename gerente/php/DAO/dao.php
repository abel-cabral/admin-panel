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

        //Grava Novos Moradores
        public function cadastro($nome, $sexo, $tel, $curso, $mensalidade, $quarto){
           
            $republica = '';
            switch ($quarto) {
                case '01':
                    $quarto = 'Quadruplo';
                    $republica = 'Centro';
                    break;
                case '02':
                    $quarto = 'Duplo';
                    $republica = 'Centro';
                    break;
                case '03':
                    $quarto = 'Quadruplo';
                    $republica = 'Inga';
                    break;                
                case '04':
                    $quarto = 'Duplo';
                    $republica = 'Inga';
                    break;

                case '05':
                    $quarto = 'Quadruplo';
                    $republica = 'Praia Vermelha';
                    break;

                case '06':
                    $quarto = 'Duplo';
                    $republica = 'Praia Vermelha';
                    break;
            } 


            $sql = "INSERT INTO moradores values (default, '$nome', '$sexo', '$tel', '$curso', '$mensalidade', '$quarto','$republica')";
            $resultado = mysqli_query($this->conexao->getCon(), $sql);
        }

        //Lista de Todos os Moradores
        public function consultarTodosMoradores(){
            $sql = "SELECT * FROM moradores";
            $resultado = mysqli_query($this->conexao->getCon(), $sql);
         
            //Esse paramentro 'mysqli_num_rows' ve quantos resultados obtivemos
            if(mysqli_num_rows($resultado) > 0){//Aqui comparamos se é maior que 0
               return $resultado; 
            }else{//Se nao achar nada a função acaba.
                return false;
            }
        }

        //Deletar Morador
        public function deletar_morador($id_morador){
            $sql = "DELETE FROM moradores WHERE id_morador=$id_morador";
            $resultado = mysqli_query($this->conexao->getCon(), $sql);
        }

        
    }//FIM DA CLASSE

        

        
        
        
        /*          BASE DE CONHECIMENTO
        //Busca todos os dados de todos no BD
        public function consultarTodosUsuarios(){
            $sql = "SELECT * FROM usuarios";
            $resultado = mysqli_query($this->conexao->getCon(), $sql);
            
            //Esse paramentro 'mysqli_num_rows' ve quantos resultados obtivemos
            if(mysqli_num_rows($resultado) > 0){//Aqui comparamos se é maior que 0
               return $resultado; 
            }else{//Se nao achar nada a função acaba.
                return false;
            }
        }
        
        //Busca via ID todos os dados relacionados
        public function consultarUsuario($id_user){
            $sql = "SELECT * FROM usuarios where id = '$id_user'";
            $resultado = mysqli_query($this->conexao->getCon(), $sql);
            
            //Esse paramentro 'mysqli_num_rows' ve quantos resultados obtivemos
            if(mysqli_num_rows($resultado) > 0){//Aqui comparamos se é maior que 0
               return $resultado; 
            }else{//Se nao achar nada a função acaba.
                return false;
            }
        }
        
        //Cruza dados informados usando parametros de idade e sexo
        public function consultar_caracteristicas($idade, $sexo){
            $sql = "SELECT * FROM usuarios where idade <= $idade AND sexo = '$sexo'";
            $resultado = mysqli_query($this->conexao->getCon(), $sql);
            
            //Esse paramentro 'mysqli_num_rows' ve quantos resultados obtivemos
            if(mysqli_num_rows($resultado) > 0){//Aqui comparamos se é maior que 0
               return $resultado; 
            }else{//Se nao achar nada a função acaba.
                return false;
            }
        }
        
         //Aqui Estamos Fazendo uma consulta a outra tabela.
        public function consulta_endereco($codigo){
            $sql = "SELECT e.*, u.* FROM endereco as e INNER JOIN usuarios as u on (e.idUsuario = u.id) where u.id = $codigo ";
            $resultado = mysqli_query($this->conexao->getCon(), $sql);
            
            //Esse paramentro 'mysqli_num_rows' ve quantos resultados obtivemos
            if(mysqli_num_rows($resultado) > 0){//Aqui comparamos se é maior que 0
               return $resultado; 
            }else{//Se nao achar nada a função acaba.
                return false;
            }
        }
        
    }
    FIM*/    
?>