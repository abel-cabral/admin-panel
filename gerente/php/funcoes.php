<?php
session_start();
include_once('./DAO/dao.php');
include_once('./conexao.php');



@$nome = $_POST['nome'];
@$senha = $_POST['senha'];

//Váriavel de Decisão
$status = isset($_POST['status'])? $_POST['status'] : $_GET['status'];//Se não houver um POST, status receberá um GET se houver




//Captura valores do POST de Login




if($status == '1'){
    $usuarios_index = new UsuarioDAO();
    $buscar = $usuarios_index->login($nome, $senha);
    if($buscar){        
        $_SESSION['status'] = true;
        $_SESSION['resultado'] = mysqli_fetch_array($buscar, MYSQL_ASSOC);            
    }
}elseif($status == '2'){    
    session_destroy();
}elseif($status == '3'){
    $usuarios_index = new UsuarioDAO();
    $buscar = $usuarios_index->cadastro(ucwords($_POST['nome']), $_POST['sexo'], $_POST['tel'], ucwords($_POST['curso']), $_POST['mensalidade'],$_POST['quarto']);
}elseif($status == '4'){
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
                'quarto' => $linha['quarto']                
            );        
        }
    }
    //json_encode — Retorna a representação JSON de um valor
    echo json_encode($resposta);    
}else{    
    $_SESSION['diag'] = $status;
}

?>

