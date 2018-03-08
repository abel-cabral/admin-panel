<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<form class="form-horizontal jumbotron" method='POST' action='#'>


<!-- Form Name -->
<legend><h2>Tela de Autenticação</h2></legend>

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

<!-- Chama função no PHP -->
<input name='status' value='logue' type='hidden'>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
    <button id="logar" class="btn btn-lg btn-success">Entrar</button>
  </div>
</div>

</fieldset>
</form>

<div id="escreva">
        
</div>
