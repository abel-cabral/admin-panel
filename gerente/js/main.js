$(document).ready(function() {
  
  //Logar
  $("#form1").submit( function(e) {
    e.preventDefault();
    $.ajax({
      type: 'POST',
      url: './php/funcoes.php',
      data: $('#form1').serialize(),
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
  
  
   //Cadastrar Moradores  
  $('#form_morador').submit(function(e){      
    e.preventDefault();       
      $.ajax({
      type: 'POST',       
      url: './php/funcoes.php',              
      data: $('#form_morador').serialize(),//Captura todos os valores no FORM e faz um OBJ. 
      cache: false,                  
      success: function(){         
        location.reload();
      }      
    })      
  });
   
   //FIM DO 'JQUERY'  
});

//OBS - Funções apenas Javascript devem ficar fora da estrutura JQuery

  //Listar Moradores 
  function todos_Moradores(){
    $.ajax({
      type: 'GET',       
      url: './php/funcoes.php',        
      data: {'status':'4'},
      cache: false,
      dataType: 'JSON',      
      success: function(data){                   
        $.each (data, function (contador) {//TEM QUE USAR O $.EACH PARA CONTAR O ARRAY, SE NAO IMPOSSÍVEL ESCREVER            
            var template = $('#template').html();//Onde irá escrever
            Mustache.parse(template);   // Opcional
            var rendered = Mustache.render(template, {id: data[contador]['id_morador'], nome: data[contador]['nome'], sexo: data[contador]['sexo'], telefone: data[contador]['telefone'], 
            mensalidade: data[contador]['mensalidade'], quarto: data[contador]['quarto'], curso: data[contador]['curso'], republica: data[contador]['nome_republica']});//O que irei escrever {chave: valor}
            $('#target').append(rendered);//SE USAR O .HTML O RESULTADO VAI SOBREESCREVER AE SÓ TEREMOS O ULTIMO
         });

         //Aqui Vou contar o total de moradores encontrados
         $('#total_de_moradores').html(data.length);//E Coloca-lo na tela
      }      
    })   
 }


 vagas('m.moradia=1');//Todos Moradores
 vagas("m.moradia=1 and m.sexo='M' and m.quarto=1");//Moradores Masculinos Duplo
 vagas("m.moradia=1 and m.sexo='M' and m.quarto=3");//Moradores Masculinos Quadruplo
 vagas("m.moradia=1 and m.sexo='F' and m.quarto=2");//Moradoras Duplo
 vagas("m.moradia=1 and m.sexo='F' and m.quarto=4");//Moradoras Quadruplo

var localizae = '#r1';
function vagas(moradia, sexo, quarto){
  $.ajax({
    type: 'GET',       
    url: './php/funcoes.php',        
    data: {'status':'6','moradia':moradia, 'sexo':sexo, 'quarto':quarto},
    cache: false,
    dataType: 'JSON',      
    success: function(data){                   
      $.each (data, function (contador) {
       $('#'+localizae).html(data[contador]['conte']);     
       
        
     });     
           
      
       
    }      
  })   
}

