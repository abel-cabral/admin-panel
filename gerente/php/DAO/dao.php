<?php
class UsuarioDAO
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    //Autênticar Login
    public function login($nome, $senha)
    {
        $sql = "SELECT * FROM login where nome='$nome' and senha='$senha'";
        $resultado = mysqli_query($this
            ->conexao
            ->getCon() , $sql);

        if (mysqli_num_rows($resultado) > 0)
        { //Se confirmar os dados
            return $resultado;
        }
        else
        { //Se não confirmar os dados
            return false;
        }
    }

    //Grava Novos Moradores
    public function cadastro($nome, $sexo, $tel, $curso, $quarto)
    {

        $republica;

        //DESCUBRO A REPUBLICA
        //Primeiro a Variavel descobre qual valor de republica.
        if ($quarto == '01' || $quarto == '02')
        {
            $republica = '1';
        }
        elseif ($quarto == '03' || $quarto == '04')
        {
            $republica = '2';
        }
        else
        {
            $republica = '3';
        }

        //DESCUBRO O SEXO E O QUARTO
        if ($sexo == 'F' || $sexo == 'f')
        { //OK
            if ($quarto % 2 !== 0)
            { //Se o Quarto for Impar, logo ele é QUADRUPLO
                $quarto = 4; //Na tabela 'quartos' quarto femininos são pares;
                $tipo = 'quadruplo_feminino';   
                
            }
            else
            { //Se o quarto for Par
                $quarto = 2;
                $tipo = 'duplo_feminino';
            }
        }
        else
        {
            if ($quarto % 2 == 0)
            { //DUPLO - Quartos Masculinos são Impares 1 e 3
                $quarto = 1; //Na tabela 'quartos' quarto masculino são impares
                $tipo = 'duplo_masculino';
            }
            else
            { //QUADRUPLO
                $quarto = 3;    
                $tipo = 'quadruplo_masculino';            
            }
        }
             
       $sql = "SELECT $tipo FROM republicas WHERE id_republica = $republica;";
       $resultado =  mysqli_query($this->conexao->getCon(), $sql);//Permite rodar mais de uma consulta;   
       $linha = mysqli_fetch_array($resultado, MYSQL_ASSOC);//Recebe o valor solicitado                  
         
        if($linha[$tipo] > '0'){
            $sql = "UPDATE republicas SET $tipo = $tipo - 1 WHERE id_republica = $republica;";//Ao add morador ele subtrair o valor de 1 vaga        
            $sql .= "INSERT INTO moradores values (default, '$nome', '$sexo', '$tel', '$curso', '$quarto','$republica');";
            $resultado =  mysqli_multi_query($this->conexao->getCon(), $sql);                   
            return 'sucesso';            
        }else{
            return 'erro';
        }
    }

    //Lista de Todos os Moradores
    public function consultarTodosMoradores()
    {
        $sql = "select m.*, r.*,q.* from moradores as m join republicas as r ON r.id_republica = m.moradia join quartos as q ON m.quarto = q.id_quarto order by m.nome ";

        $resultado = mysqli_query($this
            ->conexao
            ->getCon() , $sql);

        //Esse paramentro 'mysqli_num_rows' ve quantos resultados obtivemos
        if (mysqli_num_rows($resultado) > 0)
        { //Aqui comparamos se é maior que 0
            return $resultado;
        }
        else
        { //Se nao achar nada a função acaba.
            return false;
        }
    }

    //Deletar Morador
    public function deletar_morador($id_morador, $id_republica, $sexo, $quarto)
    {
        //DESCUBRO O SEXO E O QUARTO
        if ($sexo == 'F' || $sexo == 'f' )
        { //OK
            if ($quarto == 4)
            { //Se o Quarto for Impar, logo ele é QUADRUPLO                
                $tipo = 'quadruplo_feminino';   
                
            }
            else
            { //Se o quarto for Par                
                $tipo = 'duplo_feminino';
            }
        }
        else
        {
            if ($quarto == 1)
            { //DUPLO - Quartos Masculinos são Impares 1 e 3
                $quarto = 1; //Na tabela 'quartos' quarto masculino são impares
                $tipo = 'duplo_masculino';
            }
            else
            { //QUADRUPLO                   
                $tipo = 'quadruplo_masculino';                           
            }
        }

        
        $sql = "UPDATE republicas SET $tipo = ($tipo + 1) WHERE id_republica = $id_republica;";//Ao Deletar devolve +1 em vagas
        $sql .= "DELETE FROM moradores WHERE id_morador = $id_morador;";

        $resultado =  mysqli_multi_query($this->conexao->getCon(), $sql);    
    }

    //Atualizar Morador
    public function atualizar_morador($nome, $sexo, $tel, $curso, $quarto, $republica, $id_morador)
    {
        $sql = "UPDATE moradores set nome='$nome', sexo='$sexo', telefone='$tel', curso='$curso', quarto='$quarto',republica='$republica WHERE id_morador='$id_morador'";
        $resultado = mysqli_query($this
            ->conexao
            ->getCon() , $sql);
    }

    //Total de Vagas da Republica
    public function vaga_ocupada($n)
    {
        $sql = "select count(m.moradia) as conte, m.*, q.id_quarto, q.tipo_quarto, q.valor_quarto, r.* from moradores as m join quartos as q on m.quarto = q.id_quarto join republicas as r on m.moradia = r.id_republica where m.moradia = $n";
        $resultado = mysqli_query($this
            ->conexao
            ->getCon() , $sql);

        //Esse paramentro 'mysqli_num_rows' ve quantos resultados obtivemos
        if (mysqli_num_rows($resultado) > 0)
        { //Aqui comparamos se é maior que 0
            return $resultado;
        }
        else
        { //Se nao achar nada a função acaba.
            return false;
        }
    }

    //Total de Vagas Duplas Masculinas
    public function vaga_dupla($n, $sexo)
    {
        //Usei para identificar o sexo e puxar na sql
        $q = '';
        if ($sexo == 'F')
        {
            $q = '2';
        }
        else
        {
            $q = '1';
        }

        $sql = "select count(m.moradia) as dupla, m.*, q.*, r.*, duplo_masculino + duplo_feminino as total from moradores as m join quartos as q on m.quarto = q.id_quarto join republicas as r on m.moradia = r.id_republica where m.moradia = '$n' and sexo='$sexo' and quarto= '$q' and m.moradia is not null;";
        $resultado = mysqli_query($this
            ->conexao
            ->getCon() , $sql);

        //Esse paramentro 'mysqli_num_rows' ve quantos resultados obtivemos
        if (mysqli_num_rows($resultado) > 0)
        { //Aqui comparamos se é maior que 0
            return $resultado;
        }
        else
        { //Se nao achar nada a função acaba.
            return false;
        }
    }

    //Total de Vagas Quadruplas
    public function vaga_quadrupla($n, $sexo)
    {
        $q = '';
        if ($sexo == 'F')
        {
            $q = '4';
        }
        else
        {
            $q = '3';
        }

        $sql = "select count(m.moradia) as quad, m.*, q.*, r.*, quadruplo_masculino + quadruplo_feminino as total from moradores as m join quartos as q on m.quarto = q.id_quarto join republicas as r on m.moradia = r.id_republica where m.moradia = $n and sexo='$sexo' and quarto= '$q' and m.moradia is not null;";
        $resultado = mysqli_query($this
            ->conexao
            ->getCon() , $sql);

        //Esse paramentro 'mysqli_num_rows' ve quantos resultados obtivemos
        if (mysqli_num_rows($resultado) > 0)
        { //Aqui comparamos se é maior que 0
            return $resultado;
        }
        else
        { //Se nao achar nada a função acaba.
            return false;
        }
    }

    //Alterar Vagas
    public function numero_vagas($n, $dm, $df, $qm, $qf)
    {
        $sql = "UPDATE republicas SET duplo_masculino = '$dm', duplo_feminino = '$df', quadruplo_masculino = '$qm', quadruplo_feminino = '$qf' WHERE id_republica = '$n'";
        $resultado = mysqli_query($this
            ->conexao
            ->getCon() , $sql);

        return $resultado = 'sucesso';
    }

    public function total_porcentagem($n)
    {
        $sql = "select r.duplo_masculino + r.duplo_feminino + r.quadruplo_masculino + r.quadruplo_feminino as soma, r.* from republicas as r where r.id_republica=$n";
        $resultado = mysqli_query($this
            ->conexao
            ->getCon() , $sql);

        //Esse paramentro 'mysqli_num_rows' ve quantos resultados obtivemos
        if (mysqli_num_rows($resultado) > 0)
        { //Aqui comparamos se é maior que 0
            return $resultado;
        }
        else
        { //Se nao achar nada a função acaba.
            return false;
        }

    }

    //Salvar link da imagem
    public function imagem_link($link, $descricao, $id_republica)
    {
        $sql = "insert into galeria VALUES (default, 'https://firebasestorage.googleapis.com/v0/b/republica-ecfe3.appspot.com/o/r2%2F$link?alt=media&token=d826d990-dc21-486b-82b3-357cc6f9e85a','$descricao', '$id_republica')";
        $resultado = mysqli_query($this
            ->conexao
            ->getCon() , $sql);

        //Esse paramentro 'mysqli_num_rows' ve quantos resultados obtivemos
        if (mysqli_num_rows($resultado) > 0)
        { //Aqui comparamos se é maior que 0
            return $resultado;
        }
        else
        { //Se nao achar nada a função acaba.
            return false;
        }

    }

    //Listar Todas as fotos pegando o link
    public function imagem_get_link($n)
    {
        $sql = "SELECT g.id_imagem, g.link, g.descricao FROM galeria as g WHERE id_republica='$n'";
        $resultado = mysqli_query($this
            ->conexao
            ->getCon() , $sql);

        //Esse paramentro 'mysqli_num_rows' ve quantos resultados obtivemos
        if (mysqli_num_rows($resultado) > 0)
        { //Aqui comparamos se é maior que 0
            return $resultado;
        }
        else
        { //Se nao achar nada a função acaba.
            return false;
        }

    }

    //Deleta url da Imagem
    public function imagem_delete($n)
    {
        $sql = "delete from galeria where id_imagem='$n'";
        $resultado = mysqli_query($this
            ->conexao
            ->getCon() , $sql); 
    }

    //Atualizar Capa de Entrada
    public function atualizar_capa($link,$idImage)
    {
        $sql = "UPDATE galeria SET link = 'https://firebasestorage.googleapis.com/v0/b/republica-ecfe3.appspot.com/o/r2%2F$link?alt=media&token=d826d990-dc21-486b-82b3-357cc6f9e85a' WHERE id_imagem = '$idImage' and id_republica = 4";
        $resultado = mysqli_query($this
            ->conexao
            ->getCon() , $sql);
    }

    //Conta o total de vagas cadastradas
    public function total_oferecido($n)
    {
        $sql = "SELECT r.*, p.* FROM republicas as r join precos as p on p.id_republica = r.id_republica where r.id_republica = $n ";
        $resultado = mysqli_query($this
            ->conexao
            ->getCon() , $sql);

        //Esse paramentro 'mysqli_num_rows' ve quantos resultados obtivemos
        if (mysqli_num_rows($resultado) > 0)
        { //Aqui comparamos se é maior que 0
            return $resultado;
        }
        else
        { //Se nao achar nada a função acaba.
            return false;
        }

    }

    //Atualiza a mensalidade
    public function atualiza_mensalidade($x, $y, $n)
    {
        $sql = "UPDATE precos SET valor_quarto_duplo=$x, valor_quarto_quadruplo=$y WHERE id_republica = $n ";
        $resultado = mysqli_query($this
            ->conexao
            ->getCon() , $sql);

        //Esse paramentro 'mysqli_num_rows' ve quantos resultados obtivemos
        if (mysqli_num_rows($resultado) > 0)
        { //Aqui comparamos se é maior que 0
            return $resultado;
        }
        else
        { //Se nao achar nada a função acaba.
            return false;
        }

    }

    


} //FIM DA CLASSE

?>