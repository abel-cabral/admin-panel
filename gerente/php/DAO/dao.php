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
            
            $republica;

            //DESCUBRO A REPUBLICA
            //Primeiro a Variavel descobre qual valor de republica.
            if($quarto == '01' || $quarto == '02'){
                $republica = '1';
            }elseif($quarto == '03' || $quarto == '04'){
                $republica = '2';
            }else{
                $republica = '3';
            }
            
            //DESCUBRO O SEXO E O QUARTO
            if($sexo == 'F'){//OK
                if($quarto % 2 !== 0){//Se o Quarto for Impar, logo ele é QUADRUPLO
                    $quarto = 4;//Na tabela 'quartos' quarto femininos são pares;
                }else{//Se o quarto for Par
                    $quarto = 2;
                }
            }else{
                if($quarto % 2 == 0){//DUPLO - Quartos Masculinos são Impares 1 e 3
                    $quarto = 1;//Na tabela 'quartos' quarto masculino são impares
                }else{//QUADRUPLO
                    $quarto = 3;
                }
            }
            
            $sql = "INSERT INTO moradores values (default, '$nome', '$sexo', '$tel', '$curso', '$mensalidade', '$quarto','$republica')";
            $resultado = mysqli_query($this->conexao->getCon(), $sql);
        }

        //Lista de Todos os Moradores
        public function consultarTodosMoradores(){
            $sql = "select m.*, r.* from moradores as m join republicas as r ON r.id_republica = m.moradia order by m.nome";
            
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

        //Atualizar Morador
        public function atualizar_morador($nome, $sexo, $tel, $curso, $mensalidade, $quarto, $republica, $id_morador){
            $sql = "UPDATE moradores set nome='$nome', sexo='$sexo', telefone='$tel', curso='$curso', mensalidade='$mensalidade', quarto='$quarto',republica='$republica WHERE id_morador='$id_morador'";
            $resultado = mysqli_query($this->conexao->getCon(), $sql);
        }

        //Contar Vagas Ocupadas
        public function vaga_ocupada($ondeContar){            
            $sql= "select count(m.moradia) as conte, m.*, q.*, r.nome_republica from moradores as m join quartos as q on m.quarto = q.id_quarto join republicas as r on m.moradia = r.id_republica where $ondeContar";            
            $resultado = mysqli_query($this->conexao->getCon(), $sql);
            

            //Esse paramentro 'mysqli_num_rows' ve quantos resultados obtivemos
            if(mysqli_num_rows($resultado) > 0){//Aqui comparamos se é maior que 0
                return $resultado; 
             }else{//Se nao achar nada a função acaba.
                 return false;
             }
        }

        
    }//FIM DA CLASSE 
?>