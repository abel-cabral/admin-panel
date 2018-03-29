$(function () {
  $('a.page-scroll').bind('click', function (event) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: $($anchor.attr('href')).offset().top
    }, 1500, 'easeInOutExpo');
    event.preventDefault();
  });
});

// Highlight the top nav as scrolling occurs
$('body').scrollspy({
  target: '.navbar-fixed-top'
})

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function () {
  $('.navbar-toggle:visible').click();
});

//Função Ajax pra puxar as fotos de capa
function listar_fotos_capa(onde, n) {

  $.ajax({
    type: "GET",
    url: "./gerente/php/funcoes.php",
    data: {
      'status': "12",
      'id_republica': '4'
    },
    cache: true,    
    dataType: "JSON",
    success: function (data) {      
      $(onde).css('background-image', "url('" + data[n]['link'] + "')");      
    }
  });
}

//Função Contar Vagas
$('.consultar').on('click', function () {


});


//Lista Fotos do Banco de Dados
function listar_fotos(id_republica) {
  $.ajax({
    type: "GET",
    url: "./gerente/php/funcoes.php",
    data: {
      'status': "12",
      'id_republica': id_republica
    },
    cache: true,
    dataType: "JSON", //OBS só usar se o php estiver devolvendo um Json ex: echo json_encode();  
    success: function (data) {
      //Conta e manda pro img html as imagens
      $.each(data, function (contador) {
        var template = $("#loop_fotos").html();
        Mustache.parse(template);
        var rendered = Mustache.render(template, {
          link: data[contador]["link"],
          descricao: data[contador]["descricao"],
          id_imagem: data[contador]["id_imagem"],
          capa_principal: data[1]['link']
        });
        $("#fotos_republicas").append(rendered);
      });

      //Manda pro Modal Bootstrap as Imagens
      $.each(data, function (contador) {
        var template = $("#loop_fotos_modal").html();
        Mustache.parse(template);
        var rendered = Mustache.render(template, {
          link: data[contador]["link"],
          descricao: data[contador]["descricao"],
          id_imagem: data[contador]["id_imagem"],
          capa_principal: data[1]['link']
        });
        $("#fotos_republicas_modal").append(rendered);
      });
    },
    error: function () {
      swal("Não há fotos, ou há um problema com o Banco de Dados!", "Consulte o Desenvolvedor!", "error"); //Um aviso de erro  
    }
  });
}

//Número de Vagas Oferecidas por sexo
function vagas_ocupadas(republica) {
  $.ajax({
    type: "GET",
    url: "./gerente/php/funcoes.php",
    data: {
      'status': '15',
      'id_republica': republica
    },
    cache: false,
    dataType: "JSON",
    success: function (data) {
      var vagas = Array();
      $.each(data, function (contador) {
        vagas.push(data[contador]);
      });

      //Caso o valor seja maior que 0 dou true a variavel se não eu coloco false
      var dm = ((vagas[0]['dm'] > 0) ? $('.vm1').show() : $('.vm2').show());//OK
      var df = ((vagas[0]['df'] > 0) ? $('.vm3').show() : $('.vm4').show());
      var qm = ((vagas[0]['qm'] > 0) ? $('.vm5').show() : $('.vm6').show());
      var qf = ((vagas[0]['qf'] > 0) ? $('.vm7').show() : $('.vm8').show());      
      var republica = vagas[0]['id_republica'];//Escreve o nome da republica
      
      //Saída de Mensalidade
      $('.vm9').html(vagas[0]['vd']); 
      $('.vm10').html(vagas[0]['vq']);
    }

  });
}

