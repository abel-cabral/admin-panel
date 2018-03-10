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
            mensalidade: data[contador]['mensalidade'], quarto: data[contador]['quarto'], curso: data[contador]['curso'], republica: data[contador]['republica']});//O que irei escrever {chave: valor}
            $('#target').append(rendered);//SE USAR O .HTML O RESULTADO VAI SOBREESCREVER AE SÓ TEREMOS O ULTIMO
         });

         //Aqui Vou contar o total de moradores encontrados
         $('#total_de_moradores').html(data.length);//E Coloca-lo na tela
      }      
    })   
 }
