$( document ).ready(function() {
  
  //Logar
  $("form").submit( function(e) {
    e.preventDefault();
    $.ajax({
      type: 'POST',
      url: './php/funcoes.php',
      data: $('form').serialize(),
      success: function (data) {
        console.log(data);
        window.location = "./index.php";
      }
    });
});
  
  //Deslogar
  $('#deslogue').click(function(){
    $.ajax({
      type: 'POST',
      url: './php/funcoes.php',
      data: "status=2",
      cache: false,
      success: function(){
        location.reload();
      },
      error: function(){
        alert('Houve algum erro, Não desloguei.');
      }
    })
  });
  
  /*
   //Cadastrar Moradores  
  $('#form_morador').submit(function(){    
      $.ajax({
      type: 'POST',       
      url: './php/funcoes.php',        
      data: $('#form_morador').serialize(),
      cache: false,
      dataType: 'JSON',
      success: function(){          
        console.log('Gravado');
        location.reload();        
      }      
    })      
  });
 */
    
  });

