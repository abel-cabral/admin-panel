<?php
session_start();
include_once('./DAO/dao.php');
include_once('./conexao.php');



$nome = $_POST['nome'];
$senha = $_POST['senha'];

//Decisão
$status = $_POST['status'];



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
}else{    
    $_SESSION['diag'] = $status;
}

echo $nome;
echo $senha;
echo $status;

print_r($_POST);
?>
