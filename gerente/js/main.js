$( document ).ready(function() {
  
  //Logar
  $('form').on('submit', function(e){
      e.preventDefault();
      var capturas = $(this).serialize();//Aqui minha função busca e monta um objeto com os dados colidos no FORM 
      $.ajax({
        type: 'POST',
        url: './php/funcoes.php',        
        data: $('form').serialize(),
        success: function(){
          location.reload();
        },
        error: function(){  
         alert("Não foi Possível chamar funcoes.php");
        }
      })      
    });
  
  //Deslogar
  $('#deslogue').click(function(){
    $.ajax({
      type: 'POST',
      url: './php/funcoes.php',
      data: {status: "deslogue"},
      success: function(){
        location.reload();
      },
      error: function(){
        alert('Houve algum erro, Não desloguei.');
      }
    })
  });
    
    
 
    
  });

