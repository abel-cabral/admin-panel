<?php
include_once('./DAO/dao.php');
include_once('./conexao.php');

$usuarios_index = new UsuarioDAO();

//Captura valores do POST
$nome = $_POST['nome'];
$senha = $_POST['senha'];
$status = $_POST['status'];

//DECISÕES DO SISTEMA

switch ($status) {
    case "logue":
        //Função que Autentica
        $buscar = $usuarios_index->login($nome, $senha);
        //Cria a Sessão
        if($buscar){
            session_start();
            $_SESSION['status'] = true;
            $_SESSION['resultado'] = mysqli_fetch_array($buscar, MYSQL_ASSOC);
        }
        break;
    case "deslogue":
        session_start();
        session_destroy();
    default:
        echo "Informe um status";    
}




//Vê se a consulta ao banco retornou algum resultado
if($buscar == true){
    //Aqui usamos um for pra fazer uma repetição baseado no nª de elementos encontrados
    for ($i = 0; $i < mysqli_num_rows($buscar); $i++){
        //Puxamos os resultados em forma de array
        $linha = mysqli_fetch_array($buscar, MYSQL_ASSOC);
        
        //Organizando a saida do array do SQL, para nosso Json de resposta.
        $resposta[] = array(
            'id' => $linha['id'],
            'nome' => $linha['nome'],
            'senha' => $linha['senha'],
            
        );        
    }
}
//json_encode — Retorna a representação JSON de um valor
echo json_encode($resposta);



?>