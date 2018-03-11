<?php
    include_once('./php/verifica_sessao.php');    
?>
<!DOCTYPE html>
<html lang="pt-br">
  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
  <!--Header-->
  <?php include_once('./php/header.php');?>
  <!--Header-->
  
      <div class='container'>
        <form><br>
          <input class="form-control" name="tel" type="text" data-mask="## 00000-0000" data-mask-reverse="true" maxlength="13" required/> <br>
          <button class='btn btn-primary' type='button' id='testando'>Clique</button>
        </form>
        <div id='obg'></div>
      <div>

      
    







              <!-- END content-page -->
              <!--Footer-->
              <?php
        include_once('./html/footer.html');
    ?>
            </div>
            <!-- JAVA SCRIPTS -->
            <?php
        include_once('./scripts.html');
    ?>
    <script>
        $('#testando').click(function(){
          caport = $('form').serialize();
          caport = caport.replace(/[`~!@#$%^&*()_|+\-?;:'",.<>\{\}\[\]\\\/]/gi,'');
          $('#obg').html(caport);
        })
      </script>
            <!-- END Java Script  -->
          </body>
        </html>