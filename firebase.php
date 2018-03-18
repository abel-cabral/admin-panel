<?php
include_once('./php/verifica_sessao.php');    
?>
<!DOCTYPE html>
<html lang="pt-br">
  <!--Header-->
  <?php include_once('./php/header.php');?>
  <!--Header-->
  <!--Folha de Estilo da Galeria-->
  <style>
      #uploader{
          -webkit-appearance: none;
          appearance: none;
          width: 50%;
          margin-bottom: 10px;

      }

      .jks{
          display: flex;
          min-height: 100vh;
          width: 100%;
          padding: 0;
          margin: 0;
          align-items: center;
          justify-content: center;
          flex-direction: column;
      }
  </style>
  <body class="adminbody" onload="todos_Moradores();">
    <div id="main">
      <div class="content-page">
        <!-- Start content -->
        <div class="content">
          <div class="container jks">
            
          <div class="col-lg-12 progress">
            <div class="progress progress-bar" role="progressbar" style="width: 0%" id="uploader" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">teste</div>          
          </div>
          <input class='row col-lg-12' type='file' value='upload' id='fileButton'/>

             


















        </div>
      </div>
    </div>
    <!--Fim da Galeria-->
    <!-- top bar navigation -->
    <?php 
include_once('./php/top_side.php');//top
include_once('./php/left_side.php');//left    
?>
    <!--Footer-->
    <?php
include_once('./html/footer.html');
?>
    </div>
  <!-- JAVA SCRIPTS -->
  <?php
include_once('./scripts.html');
?>

  <!-- END Java Script  -->
  </body>
</html>
