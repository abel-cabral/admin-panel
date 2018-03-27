<?php
include_once ('./php/verifica_sessao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
  <!--Header-->
  <?php include_once ('./php/header.php'); ?>
  <!--Header-->
  <!--Folha de Estilo da Galeria-->
  <style>
    
  </style>
  <body class="adminbody" onload="listar_fotos('4');"><!--Aqui chamamos a função e passamos o id da republica que ela deve buscar as fotos-->
    <div id="main">
      <div class="content-page">
        <!-- Start content -->
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-xl-12">
                <div class="breadcrumb-holder">
                  <h1 class="main-title float-left">Galeria
                  </h1>
                  <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item">Início
                    </li>
                    <li class="breadcrumb-item active">Galeria
                    </li>
                  </ol>
                  <div class="clearfix">
                  </div>
                </div>
              </div>
            </div>
            <!-- end row -->
            <!-- Início da Galeria -->
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card mb-3">
                  <div class="card-header">
                    <h3>
                      <i class="fa fa-image">
                      </i> Galeria de Imagens <strong>Tela Inicial</strong>
                    </h3>
                    As imagens alteradas aqui são espelhadas no site
                  </div>
                  <div class="card-body">
                    <div class="row fotos_republicas col d-flex justify-content-center" data-galeria="4" id='fotos_republicas'>
                       
                    
                      <!--Loop com as imagens no banco de dados-->
                      <script id="loop_fotos" type="x-tmpl-mustache">
                      
                      <div class="card img-fluid remover_todas_fotos" style="width:750px;height:458.5px;">
                        <img class="card-img-top" src="{{link}}" alt="Card image" style="width:100%;height:100%;">
                        <div class="card-img-overlay ">                                                  
                         
                        <div class="file btn btn-dark botao_upload" >
                              Trocar Imagem
                              <input type="file" class='atualizar_capa' data-id_imagem="{{id_imagem}}" accept="image/*"/>
                        </div>
                        <div class="btn btn-light" >
                              {{descricao}}
                              
                        </div>
                        </div>
                      </div>   
                      
                     
                      </script>
                      <!--Fim do Looping-->                      
                    </div>
                  </div>
                </div>
              </div>
              <!-- Fim da galeria-->
            </div>
          </div> 
          <div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-labelledby="modal-galeria" aria-hidden="true" id="modal-galeria">
            <div class="modal-dialog">
              <div class="modal-content">
                <!--FORM para atualizar imagens-->
                <form action="#" id='form_republica_imagens' method="POST")>
                  <!--Chama o MODAL-->    
                  <div class="modal-header">
                    <h5 class="modal-title">Atualizar Dados de Vagas
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                      <span aria-hidden="true">&times;
                      </span>
                      <span class="sr-only">Fechar
                      </span>
                    </button>
                  </div>
                  <!--MODAL-->
                  <div class="modal-body">
                    <label for="genero">
                      <strong>INFORME ATENTAMENTE OS DADOS ABAIXO:
                      </strong>
                    </label>
                    
                    <br>
                    <!--Descrição da Foto-->                                                                
                    <label for="genero">Detalhes da
                      <strong>Imagem
                      </strong>
                    </label>
                    <div class="row col-lg-12">                                                                
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" required>Descrição
                          </span>
                        </div>
                        <input class="form-control" type='text' id="descricao" aria-label="descrição" required>
                        </textarea>
                      </div>
                      <!--Fim da Descrição-->
                      <!--Selecionar Foto Local-->
                      <label for="genero">Carregar Imagem 
                      <strong>Local
                      </strong>
                    </label>
                    <div class="input-group">                                                                
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Upload
                          </span>
                        </div>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" value='upload' id='fileButton' required>
                          <label class="custom-file-label" for="inputGroupFile01">Procurar Arquivo
                          </label>
                        </div>    
                      </div>
                    </div>
                      <!--Fim da Seleção-->
                      <!--Barra de Progresso-->                      
                      <h4 class="text-center hidden">Salvando a Imagem</h4>
                            <div class="container hidden">
                                <div class="progress">
                                <div class="progress-bar progress-bar-success progress-bar-striped" style='width:0%' id='uploader' role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                    <span class="sr-only"></span>
                                </div>
                                </div>
                            </div>
                        <!--Fim da Barra de Progresso-->
                        <!--Button para salvar e deletar-->
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="save_foto">Salvar Alterações  </button>
                      </div>
                      </form>
                  </div>
                <div>
                  
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--Fim da Galeria-->
    <!-- top bar navigation -->
    <?php
include_once ('./php/top_side.php'); //top
include_once ('./php/left_side.php'); //left

?>
    <!--Footer-->
    <?php
include_once ('./html/footer.html');
?>
    </div>
  <!-- JAVA SCRIPTS -->
  <?php
include_once ('./scripts.html');
?>
  <!-- END Java Script  -->
  </body>
</html>
