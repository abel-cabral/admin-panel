<?php
  header('Content-Type: text/html; charset=utf-8');
  session_start();  
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Autênticação de Acesso</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">   
   
</head>

<body>

    <div class="container">
        <form class="form-horizontal jumbotron" method='POST' action='' id="form1">

            <!-- Form Name -->
            <legend>
                <h2>Tela de Autenticação</h2></legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Login</label>
                <div class="col-md-4">
                    <input id="idnome" name="nome" type="text" placeholder="Sua identificação" class="form-control input-md" required="">

                </div>
            </div>

            <!-- Password input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="passwordinput">Senha</label>
                <div class="col-md-4">
                    <input id="idsenha" name="senha" type="password" placeholder="Chave de Acesso" class="form-control input-md" required="">

                </div>
            </div>

            <input type='hidden' value='1' name='status'>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for=""></label>
                <div class="col-md-4">
                    <button id="logar" type="submit" class="btn btn-lg btn-success">Entrar</button>
                </div>
            </div>

            </fieldset>
        </form>
    </div>
    <!-- MEUS SCRIPTS -->   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="./js/main.js"></script>
    <!-- FIM -->
</body>
</html>

