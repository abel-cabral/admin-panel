<?php
include_once('./DAO/dao.php');
include_once('./conexao.php');
session_start();


//-------------------------------------------------------------------Váriavel de Decisão
@$status = isset($_POST['status'])? $_POST['status'] : $_GET['status'];//Captura tanto por GET quanto por POST
//---------------------------------------------------------------FIM Váriavel de Decisão

//Captura valores do POST de Login
//Login do ADM
if($status == '1'){    
    @$nome = $_POST['nome'];
    @$senha = $_POST['senha'];

    @$hash = crypt($senha,'republica');
    
    $usuarios_index = new UsuarioDAO();
    $buscar = $usuarios_index->login($nome, $hash);//Envia o nome e senha cryptografada do usuário.
    if($buscar){        
        $_SESSION['status'] = true;
        $_SESSION['resultado'] = mysqli_fetch_array($buscar, MYSQL_ASSOC);//Esse Array captura todos os valores no BD            
    }
}

//Deslogar ADM
elseif($status == '2'){  
          
    session_unset();
    session_destroy();
    return true;    
}

//Cadastrar Morador
elseif($status == '3'){
    $usuarios_index = new UsuarioDAO();
    $buscar = $usuarios_index->cadastro(transformar($_POST['nome']), $_POST['sexo'], $_POST['tel'], transformar($_POST['curso']), $_POST['mensalidade'], $_POST['quarto']);     
}

//Listar Todos Moradores
elseif($status == '4'){
    $usuarios_index = new UsuarioDAO();
    $buscar = $usuarios_index->consultarTodosMoradores();    
    
    if($buscar == true){        
        //Aqui usamos um for pra fazer uma repetição baseado no nª de elementos encontrados
        for ($i = 0; $i < mysqli_num_rows($buscar); $i++){
            
            //Puxamos os resultados em forma de array
            $linha = mysqli_fetch_array($buscar, MYSQL_ASSOC);
            
            //Organizando a saida do array do SQL, para nosso Json de resposta.
            $resposta[] = array(
                'id_morador' => $linha['id_morador'],
                'nome' => $linha['nome'],
                'sexo' => $linha['sexo'],
                'telefone' => $linha['telefone'],
                'curso' => $linha['curso'],
                'mensalidade' => $linha['mensalidade'],
                'quarto' => $linha['quarto'],
                'nome_republica' => $linha['nome_republica'],
                'moradia' => $linha['moradia'],
                'tipo_quarto' => $linha['tipo_quarto']
            );        
        }
    }
    //json_encode — Retorna a representação JSON de um valor
    echo json_encode($resposta);  
}

//Deletar Morador
elseif($status == '5'){
    $usuarios_index = new UsuarioDAO();
    $buscar = $usuarios_index->deletar_morador($_POST['id_morador'], $_POST['id_republica'], $_POST['sexo'], $_POST['quarto']);    
}

//Contar Vagas
elseif($status == '6'){    
    $usuarios_index = new UsuarioDAO();//total de republicas, 
    
    for($c=1;$c<=3;$c++){
    
    $buscar = $usuarios_index->vaga_ocupada($c);//contar na tabela, republica, sexo, tipo de quarto
    if($buscar == true){
        
        //Aqui usamos um for pra fazer uma repetição baseado no nª de elementos encontrados
        for ($i = 0; $i < mysqli_num_rows($buscar); $i++){
            
            //Puxamos os resultados em forma de array
            $linha = mysqli_fetch_array($buscar, MYSQL_ASSOC);
            
            //Organizando a saida do array do SQL, para nosso Json de resposta.
            $resposta[$c] = array(
                'id_morador' => $linha['id_morador'],
                'nome' => $linha['nome'],
                'sexo' => $linha['sexo'],
                'telefone' => $linha['telefone'],
                'curso' => $linha['curso'],
                'mensalidade' => $linha['mensalidade'],
                'quarto' => $linha['quarto'],
                'nome_republica' => $linha['nome_republica'],                                
                'valor_quarto' => $linha['valor_quarto'],
                'conte' => $linha['conte'],
                'id_republica' => $linha['id_republica']              
            );                 
        }
        
    }
    }
    echo json_encode($resposta);
}

//Contar Vagas Duplas
elseif($status == '7'){
   
    $usuarios_index = new UsuarioDAO();
    for($c=1;$c<=3;$c++){
    
        $buscar = $usuarios_index->vaga_dupla($c, $_GET['sexo']);//contar na tabela, republica, sexo, tipo de quarto
    
        if($buscar == true){
            
            //Aqui usamos um for pra fazer uma repetição baseado no nª de elementos encontrados
            for ($i = 0; $i < mysqli_num_rows($buscar); $i++){
                
                //Puxamos os resultados em forma de array
                $linha = mysqli_fetch_array($buscar, MYSQL_ASSOC);
                
                //Organizando a saida do array do SQL, para nosso Json de resposta.
                $resposta[$c] = array(
                    'id_morador' => $linha['id_morador'],
                    'nome' => $linha['nome'],
                    'sexo' => $linha['sexo'],
                    'telefone' => $linha['telefone'],
                    'curso' => $linha['curso'],                      
                    'mensalidade' => $linha['mensalidade'],
                    'quarto' => $linha['tipo_quarto'],
                    'nome_republica' => $linha['nome_republica'],                                
                    'valor_quarto' => $linha['valor_quarto'],
                    'dupla' => $linha['dupla'],
                    'id_republica' => $linha['id_republica']                  
                );        
            }
        }
        }        
       echo json_encode($resposta); //Resposta AJAX
}
//Conta vagas Quadruplas
elseif($status == '8'){
    
    $usuarios_index = new UsuarioDAO();
    for($c=1;$c<=3;$c++){
    
        $buscar = $usuarios_index->vaga_quadrupla($c, $_GET['sexo']);//contar na tabela, republica, sexo, tipo de quarto
    
        if($buscar == true){
            
            //Aqui usamos um for pra fazer uma repetição baseado no nª de elementos encontrados
            for ($i = 0; $i < mysqli_num_rows($buscar); $i++){
                
                //Puxamos os resultados em forma de array
                $linha = mysqli_fetch_array($buscar, MYSQL_ASSOC);
                
                //Organizando a saida do array do SQL, para nosso Json de resposta.
                $resposta[$c] = array(
                    'id_morador' => $linha['id_morador'],
                    'nome' => $linha['nome'],
                    'sexo' => $linha['sexo'],
                    'telefone' => $linha['telefone'],
                    'curso' => $linha['curso'],
                    'mensalidade' => $linha['mensalidade'],
                    'quarto' => $linha['tipo_quarto'],                                                    
                    'nome_republica' => $linha['nome_republica'],                                
                    'valor_quarto' => $linha['valor_quarto'],
                    'quad' => $linha['quad'],
                    'id_republica' => $linha['id_republica']                
                );        
            }
        }
        }                
        echo json_encode($resposta);//Resposta AJAX         
}
//-------------------------------------------------------------------
//QUANTIDADE DE VAGAS OFERECIDAS + VALOR DE CADA QUARTO POR REPUBLICA
elseif($status == '9'){
    $usuarios_index = new UsuarioDAO();
    //variaveis locais
    $dM=$_POST['dM'] - $_POST['dm'];                   $dF=$_POST['dF'] - $_POST['df'];
    $qM=$_POST['qM'] - $_POST['qm'];                   $qF=$_POST['qF'] - $_POST['qf']; 
    $aprovacao = true;

    if($dM <= 0){//Testa se o valor da vaga é maior que o das vagas ocupadas, se for ele grava no banco.
        $aprovacao = false;
    }if($dF <= 0){
        $aprovacao = false;
    }if($qM <= 0){
        $aprovacao = false;
    }if($qF <= 0){
        $aprovacao = false;
    }if($aprovacao == true){
        $buscar = $usuarios_index->numero_vagas($_POST['id_republica'], $dM, $dF, $qM, $qF);//contar na tabela, republica, sexo, tipo de quarto        
    }
    $buscar = $usuarios_index->atualiza_mensalidade($_POST['mendupla'], $_POST['menquad'], $_POST['id_republica']);
}
//Procentagem de Ocupação
elseif($status == '10'){
    $usuarios_index = new UsuarioDAO();
    $buscar = $usuarios_index->total_porcentagem($_GET['id_republica']);//Conta o total de vagas abertas pra aluguel 

    if($buscar == true){
        $linha = mysqli_fetch_array($buscar, MYSQL_ASSOC);
        $resposta = $linha;                
    }
    echo json_encode($resposta);//Resposta AJAX 
}
//Envia o link da imagem upada no firebase para o sql
elseif($status == '11'){
    $usuarios_index = new UsuarioDAO();
    $buscar = $usuarios_index->imagem_link($_POST['link'],$_POST['descricao'], $_POST['id_republica']); 
}
//Pega uma lista de Fotos
elseif($status == '12'){
    $usuarios_index = new UsuarioDAO();
    $buscar = $usuarios_index->imagem_get_link($_GET['id_republica']);
    if($buscar == true){
            
        //Aqui usamos um for pra fazer uma repetição baseado no nª de elementos encontrados
        for ($i = 0; $i < mysqli_num_rows($buscar); $i++){
            
            //Puxamos os resultados em forma de array
            $linha = mysqli_fetch_array($buscar, MYSQL_ASSOC);
            
            //Organizando a saida do array do SQL, para nosso Json de resposta.
            $resposta[] = array(
                'id_imagem' => $linha['id_imagem'],
                'link' => $linha['link'],
                'descricao' => $linha['descricao']
            );                        
        }
        echo json_encode($resposta);
    }
    
}
//Deletar Foto
elseif($status == '13'){
    $usuarios_index = new UsuarioDAO();
    $buscar = $usuarios_index->imagem_delete($_POST['id_imagem']);

    echo true;
        
}
//Atualizar Capas
elseif($status == '14'){
    $usuarios_index = new UsuarioDAO();
    $buscar = $usuarios_index->atualizar_capa($_POST['link'], $_POST['id_republica']);
    echo true;        
}
//Vê o restante de vagas disponivel no banco de dados e informa pro visitante
elseif($status == '15'){
    $usuarios_index = new UsuarioDAO();
    $buscar = $usuarios_index->total_oferecido($_GET['id_republica']);

    if($buscar == true){            
        
        for ($i = 0; $i < mysqli_num_rows($buscar); $i++){            
        
            $linha = mysqli_fetch_array($buscar, MYSQL_ASSOC);            
        
            $resposta[] = array(
                'id_republica' => $linha['id_republica'],
                'dm' => $linha['duplo_masculino'],
                'df' => $linha['duplo_feminino'],
                'qm' => $linha['quadruplo_masculino'],
                'qf' => $linha['quadruplo_feminino'],
                'vd' => $linha['valor_quarto_duplo'],
                'vq' => $linha['valor_quarto_quadruplo']
            );                        
        }
        echo json_encode($resposta);        
    }
    
}

//Em Caso de Erro do Nº do Status
else{    
    echo('Não recebi o Númerador do Status!');
}
//---------------------------------------------------------------------------- DEMAIS FUNÇÕES COMPLEMENTARES ----------------------------------------------------------------//
//Passa pra utf-8 e 1 letras das palavras em maiúscula
function transformar($texto){
    return ucwords($texto);
}
