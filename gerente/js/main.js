$(document).ready(function() {
  //Logar
  $("#form1").submit(function(e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "./php/funcoes.php",
      data: $("#form1").serialize(),
      success: function(data) {
        window.location = "./index.php";
      }
    });
  });

  //Deslogar
  $("#deslogue").click(function() {
    $.ajax({
      type: "POST",
      url: "./php/funcoes.php",
      data: "status=2",
      cache: false,
      success: function() {
        location.reload();
      },
      error: function() {
        alert("Houve algum erro, Não desloguei.");
      }
    });
  });

  //Cadastrar Moradores
  $("#form_morador").submit(function(e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "./php/funcoes.php",
      data: $("#form_morador").serialize(), //Captura todos os valores no FORM e faz um OBJ.
      cache: false,
      success: function() {
        location.reload();
      }
    });
  });

  //Deletar Morador
  $(document).on("click", ".id_morador", function() {
    swal({
      //Animação para escolha
      title: "Atenção!",
      text: "Deseja Remover Esse Morador?",
      icon: "warning",
      buttons: true,
      dangerMode: true
    }).then(willDelete => {
      if (willDelete) {
        //Confirmação de Descisão
        //Ajax para excluir
        $.ajax({
          type: "POST",
          url: "./php/funcoes.php",
          data: { status: "5", id_morador: $(this).data("id_morador") }, //Captura todos os valores no FORM e faz um OBJ.
          cache: false,
          success: function() {
            location.reload();
          }
        });
      } else {
        //se não só exibe a mensagem
        swal("Morador Mantido.");
        $("#form_republica_vaga").trigger("reset"); //Isso Reseta nossos campos do formulario
      }
    });
  });

  //Atualizar Vagas --Capta o id da republica clicada
  $(document).on("click", ".nome_republica", function() {
    //Obs nem sempre o jquery capta o id, entao precisamos indicar um cmainho mais lógico
    var id_republica = $(this).data("republica"); //Capta o id clicado e atribui a variavel

    //Chama a função que faz a atualização
    $("#form_republica_vaga").submit(function(e) {
      e.preventDefault(); //Impede o formulario de ignorar os demais comandos

      swal({
        //Animação para escolha
        title: "Confirme Sua Escolha?",
        text:
          "Deseja gravas as seguintes alterações no banco de dados?",
        icon: "warning",
        buttons: true,
        dangerMode: true
      }).then(willDelete => {
        if (willDelete) {
          //Se sim executa o ajax de gravar
          $.ajax({
            type: "POST",
            url: "./php/funcoes.php",
            data:
              $("#form_republica_vaga").serialize() +
              "&status=9&id_republica=" +
              id_republica, //Captura todos os valores no FORM e faz um OBJ.
            cache: false,
            success: function() {
              swal("Suas informações foram salvar com sucesso.", {
                icon: "success"
              });
              $("#form_republica_vaga").trigger("reset"); //Isso Reseta nossos campos do formulario
              location.reload();
            }
          });
        } else {
          //se não só exibe a mensagem
          swal("Não alteramos os dados.");
          $("#form_republica_vaga").trigger("reset"); //Isso Reseta nossos campos do formulario
        }
      });
      $("#modal-republica").modal("toggle"); //E caso o modal bootstrap nao feche isso o força
    });
  });

  //Chamando Funções externas ao Jquery
  vagas_total();

  //FIM DO 'JQUERY'
});

//OBS - Funções apenas Javascript devem ficar fora da estrutura JQuery

//Listar Moradores
function todos_Moradores() {
  $.ajax({
    type: "GET",
    url: "./php/funcoes.php",
    data: {
      status: "4"
    },
    cache: false,
    dataType: "JSON",
    success: function(data) {
      $.each(data, function(contador) {
        //TEM QUE USAR O $.EACH PARA CONTAR O ARRAY, SE NAO IMPOSSÍVEL ESCREVER
        var template = $("#template").html(); //Onde irá escrever
        Mustache.parse(template); // Opcional
        var rendered = Mustache.render(template, {
          id: data[contador]["id_morador"],
          nome: data[contador]["nome"],
          sexo: data[contador]["sexo"],
          telefone: data[contador]["telefone"],
          mensalidade: data[contador]["mensalidade"],
          quarto: data[contador]["tipo_quarto"],
          curso: data[contador]["curso"],
          republica: data[contador]["nome_republica"],
        }); //O que irei escrever {chave: valor}
        $("#target").append(rendered); //SE USAR O .HTML O RESULTADO VAI SOBREESCREVER AE SÓ TEREMOS O ULTIMO
      });

      //Aqui Vou contar o total de moradores encontrados
      $("#total_de_moradores").html(data.length); //E Coloca-lo na tela
    }
  });
}

//TODAS AS VAGAS + Todas as Funções de dados
function vagas_total() {
  $.ajax({
    type: "GET",
    url: "./php/funcoes.php",
    data: {
      status: "6"
    },
    cache: false,
    dataType: "JSON",
    success: function(data) {
      alert("Cheguei");
    }
  });
}

vagas_tipo("F", "duplaF", "7");
vagas_tipo("M", "duplaM", "7");
vagas_tipo("F", "quadF", "8");
vagas_tipo("M", "quadM", "8");
for (i = 1; i <= 3; i++) {
  vagas_porcento(i);
}

//Número de Vagas disponíveis por tipo de quarto
function vagas_tipo(sexo, tipo, disparo) {
  $.ajax({
    type: "GET",
    url: "./php/funcoes.php",
    data: {
      status: disparo,
      sexo: sexo,
      tipo_vaga: tipo
    },
    cache: false,
    dataType: "JSON",
    success: function(data) {}
  });
}

//Porcentagem de vagas Ocupadas
function vagas_porcento(contador) {
  //Conta o total de vagas suportado
  $.ajax({
    type: "GET",
    url: "./php/funcoes.php",
    data: {
      status: "10",
      id_republica: contador
    },
    cache: false,
    dataType: "JSON",
    success: function(data) {
      var votevalue =
        parseInt($("#r" + contador).text()) / parseInt(data) * 100;
      $("#rvagas" + contador).html(parseInt(votevalue) + "% Ocupada"); //Calcula a Porcentagem de Ocupação
      $($("#r" + contador + "total")).html(data);
    }
  });
}
