//Lista Varoiaveis Globais
var file, nome_img, vagas_ocupadas;
$(document).ready(function () {

  //Logar
  $("#form1").submit(function (e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "./php/funcoes.php",
      data: $("#form1").serialize(),
      success: function (data) {
        window.location = "./index.php";
      }
    });
  });

  //Deslogar
  $(document).on("click", "#deslogue", function () {
    $.ajax({
      type: "GET",
      url: "./php/funcoes.php",
      data: {
        status: '2'
      },
      cache: false,
      success: function () {
        window.location = "./login.php";
      },
      error: function () {
        alert("Houve algum erro, Não desloguei.");
      }
    });
  });

  //-----------------------------------------------------------------------------------------------CADASTRO DE MORADORES
  $("#form_morador").submit(function (e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "./php/funcoes.php",
      data: $("#form_morador").serialize(), //Captura todos os valores no FORM e faz um OBJ.
      cache: false,
      success: function (data) {
        //Agora testamos o retono e decidimos
        if (data == 'sucesso') {
          swal("Sucesso!", 'Novo Morador Cadastrado.', "success");
        } else {
          swal("Erro!", 'Limite deste tipo de vaga atingido, exclua um morador ou aumente o número de vagas.', "error");
        }

        $(".swal-button--confirm").on("click", function () { //Só após clicar em OK que a página recarrega          
          location.reload();
        });
      },
      //Mensagem de error Relacionada a consulta/requisição
      error: function () {
        alert('Erro ao consultar o banco de dados');
      }
    });
  });
  //-----------------------------------------------------------------------------------------------FIM DO CADASTRO DE MORADORES

  //Deletar Morador
  $(document).on("click", ".id_morador", function () {
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
          data: {
            status: "5",
            id_morador: $(this).data("id_morador"), //Número de Identificação do Morador
            id_republica: $(this).data("id_republica"), //Número da Sua Republica 1, 2 ou 3
            sexo: $(this).data("sexo"), // Seu sexo 'M' ou 'F'
            quarto: $(this).data("id_quarto") //Seu tipo de quarto
          }, //Captura todos os valores no FORM e faz um OBJ.
          cache: false,
          success: function () {
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

  //------------------------------------------------------------------------------------------- INÍCIO DA ATUALIZAÇÃO DE VAGAS OFERECIDAS
  //Atualizar Vagas --Capta o id da republica clicada
  $(document).on("click", ".nome_republica", function () {
    var dm, df, qm, qf, id_republica; //declaração variaveis

    //Captura de valores
    id = $(this).data("republica"); //id da república capturado
    dm = parseInt($('#r' + id + 'M2').text());
    df = parseInt($('#r' + id + 'F2').text());
    qm = parseInt($('#r' + id + 'M4').text());
    qf = parseInt($('#r' + id + 'F4').text());


    //Chama a função que faz a atualização
    $("#form_republica_vaga").submit(function (e) {
      e.preventDefault(); //Impede o formulario de ignorar os demais comandos

      swal({
        //Animação para escolha
        title: "Confirme Sua Escolha?",
        text: "Deseja gravas as seguintes alterações no banco de dados?",
        icon: "warning",
        buttons: true,
        dangerMode: true
      }).then(willDelete => {
        if (willDelete) {
          //Se sim executa o ajax de gravar
          $.ajax({
            type: "POST",
            url: "./php/funcoes.php",
            data: $("#form_republica_vaga").serialize() +
              "&status=9&id_republica=" + id + "&dm=" + dm + "&df=" + df + "&qm=" + qm + "&qf=" + qf, //Captura todos os valores no FORM e faz um OBJ.
            cache: false,
            success: function (data) {
              if (data[0] == 's') {                
                swal("Sucesso!", 'Quantidade de vagas e preço atualizados.', "success");
              } else {
                swal("Atenção!", 'PREÇO ATUALIZADO. Mas houve erro ao atualizar suas vagas, é necessário oferecer mais vagas do que o nº de residentes atual.', "warning");
              }
              $(".swal-button--confirm").on("click", function () {
                location.reload();
              })
            }
          });
        } 
      });      
    });
  });
  //------------------------------------------------------------------------------------------- FIM DA ATUALIZAÇÃO DE VAGAS OFERECIDAS

  //Função salva imagem firebase
  $("#fileButton").on(
    "change",
    ($.fn.captura_file = function (e) {
      //Ao selecionar um arquivo inicia o evento
      $("#save_foto").css("visibility", "visible"); //Botão Gravar Aparece
      file = this.files[0];
    })
  );

  //------------------------------------------------------------------------------------------- INÍCIO DELETAR FOTO GALERIA
  $(document).on("click", ".remover_imagem", function () {
    var id_imagem = $(this).data("id_imagem"); //Pega o id pela data

    swal({
      //Animação para escolha
      title: "Confirme Sua Escolha?",
      text: "Deseja excluir essa imagem?",
      icon: "warning",
      buttons: true,
      dangerMode: true
    }).then(willDelete => {
      if (willDelete) {
        $.ajax({
          type: "POST",
          url: "./php/funcoes.php",
          data: {
            status: "13",
            id_imagem: id_imagem
          },
          cache: false,
          dataType: "JSON",
          success: function (data) {
            swal("Deletada com sucesso.", {
              icon: "success"
            });
            $(".swal-button--confirm").on("click", function () {
              //Só após clicar em OK que a página recarrega
              location.reload();
            });
          },
          error: function () {
            swal(
              "Não consegui deletar a imagem!",
              "Consulte o Desenvolvedor!",
              "error"
            );
          }
        });
      } else {
        //se não só exibe a mensagem
        swal("Não alteramos os dados.");
      }
    });
  });
  //------------------------------------------------------------------------------------------- FIM DELETAR FOTO GALERIA

  //------------------------------------------------------------------------------------------- INÍCIO SALVA IMG NO FIREBASE
  //Gravar no Firebase
  $("#save_foto").click(
    ($.fn.gravar_imagem = function (e, teste_sql) {

      //Variavel recebe nome aleatório
      nome_img = guid() + file.name;      

      //Create a Storage ref
      var storageRef = firebase.storage().ref("r2/" + nome_img);


      // Upload a File
      var task = storageRef.put(file);

      //Update Progress Bar
      task.on(
        "state_changed",
        function progress(snapshot) {
          $(".hidden").css("visibility", "visible");
          $(uploader).css(
            "width",
            snapshot.bytesTransferred / snapshot.totalBytes * 100 + "%"
          );
          $(uploader).html(
            parseInt(snapshot.bytesTransferred / snapshot.totalBytes * 100) +
            "%"
          );
        },
        function error(err) {
          swal(
            "Erro ao conectar na Firebase!",
            "Consulte o Desenvolvedo!",
            "error"
          );
        },
        function complete() {
          if (teste_sql == "atualizar_capa") {

          } else {
            $.fn.gravanosql();
            e.preventDefault();
          }
        }
      );
    })
  );
  //------------------------------------------------------------------------------------------- FIM SALVA IMG NO FIREBASE

  //------------------------------------------------------------------------------------------- INÍCIO LINK DA IMG PARA O SQL
  //GRAVA O LINK NO SQL
  $.fn.gravanosql = function () {
    //Variaveis da Função
    var id_republica = $(".fotos_republicas").data("galeria"); //Com isso eu consigo atualizar 3 páginas com uma unica função;

    //Se sim executa o ajax de gravar
    $.ajax({
      type: "POST",
      url: "./php/funcoes.php",
      data: {
        status: "11",
        link: nome_img,
        id_republica: id_republica,
        descricao: $("#descricao").val()
      },
      cache: false,
      success: function () {
        swal("Imagem e Legenda Salvas com Sucesso.", {
          icon: "success"
        });
        $(".swal-button--confirm").on("click", function () {
          //Só após clicar em OK que a página recarrega
          location.reload();
        });
      },
      error: function () {
        //se não só exibe a mensagem
        swal("Não consegui gravar sua foto e legenda.");
      }
    });
  };
  //------------------------------------------------------------------------------------------- FIM LINK DA IMG PARA O SQL

  //------------------------------------------------------------------------------------------- INÍCIO UPDATE FOTOS CAPAS
  $(document).on("change", ".atualizar_capa", function () {
    //Ao selecionar nova capa roda a função e atualiza
    id_capa = $(this).data("id_imagem");
    file = this.files[0];

    //Grava no Banco
    //Variavel recebe nome aleatório
    nome_img = guid() + file.name;

    //Create a Storage ref
    var storageRef = firebase.storage().ref("r2/" + nome_img);


    // Upload a File
    var task = storageRef.put(file);

    //Update Progress Bar
    task.on(
      "state_changed",
      function progress(snapshot) {
        //Seria o Status       
      },
      function error(err) {
        swal(
          "Erro ao conectar na Firebase!",
          "Consulte o Desenvolvedo!",
          "error"
        );
      },
      function complete() {

      }
    );

    //Atualiza a capa
    $.ajax({
      type: "POST",
      url: "./php/funcoes.php",
      data: {
        status: "14",
        link: nome_img,
        id_republica: id_capa
      },
      cache: true,
      success: function () {
        swal("Capa do site atualizada.", {
          icon: "success"
        });
        $(".swal-button--confirm").on("click", function () {
          location.reload();
        });
      },
      error: function () {
        swal("Não consegui salvar sua capa.");
      }
    });
  });
  //------------------------------------------------------------------------------------------- FIM UPDATE FOTOS CAPAS

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
    success: function (data) {
      $.each(data, function (contador) {
        //TEM QUE USAR O $.EACH PARA CONTAR O ARRAY, SE NAO IMPOSSÍVEL ESCREVER
        var template = $("#template").html(); //Onde irá escrever
        Mustache.parse(template); // Opcional
        var rendered = Mustache.render(template, {
          id: data[contador]["id_morador"],
          nome: data[contador]["nome"],
          sexo: data[contador]["sexo"].toLowerCase(),
          telefone: data[contador]["telefone"],
          mensalidade: data[contador]["mensalidade"],
          quarto: data[contador]["tipo_quarto"],
          curso: data[contador]["curso"],
          republica: data[contador]["nome_republica"],
          moradia: data[contador]["moradia"],
          id_quarto: data[contador]["quarto"],
          random_foto: parseInt(Math.random() * 4 + 1) //Joga um numero aleatório pra puxar os avatares ex: m1,m2,m3
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
    success: function (data) {
      //Pego o Json e transformo em objeto javascript
      var vagas = Array();
      $.each(data, function (contador) {
        //Escrevendo nas DIV
        $("#r" + contador).html(data[contador]["conte"]);
      });
    }
  });
}

//Não Alterar a Ordem de Chamada, ou as decisões se perdem
vagas_tipo("M", "7");
vagas_tipo("F", "7");
vagas_tipo("M", "8");
vagas_tipo("F", "8");


for (i = 1; i <= 3; i++) {
  vagas_porcento(i);
}

//Número de Vagas disponíveis por tipo de quarto
function vagas_tipo(sexo, disparo) {
  $.ajax({
    type: "GET",
    url: "./php/funcoes.php",
    data: {
      status: disparo,
      sexo: sexo
      // tipo_vaga: tipo
    },
    cache: false,
    dataType: "JSON",
    success: function (data) {
      //Como estamos usando 1 ajax pra receber a mesma função 4 vezes com parametros diferente, fiz uso de testes para identificar a ordem de execução

      //Vagas Duplas
      if (data[1]["quarto"] == "Duplo") {   
        $.each(data, function (contador) {
          //Isso aqui é basicamente um IF em linha, assim economizo linhas
          data[contador]["sexo"] == "M" ?
            $("#r" + contador + "M2").html(data[contador]["dupla"]) :
            $("#r" + contador + "F2").html(data[contador]["dupla"]);
        });      
      //Vagas Quadruplas  
      } else {
        $.each(data, function (contador) {
          data[contador]["sexo"] == "M" ?
            $("#r" + contador + "M4").html(data[contador]["quad"]) :
            $("#r" + contador + "F4").html(data[contador]["quad"]);
        });
      }
    }
  });
}

//Porcentagem de vagas Ocupadas
function vagas_porcento(lancar) {
  //Conta o total de vagas suportado
  $.ajax({
    type: "GET",
    url: "./php/funcoes.php",
    data: {
      status: "10",
      id_republica: lancar
    },
    cache: false,
    dataType: "JSON",
    success: function (data) {
          
        $("#r" + lancar + "total").html(data["soma"]);//Lança o Valor das vagas ainda restantes no banco de dados.
             
        $("#rvagas" + lancar).html(parseInt(solucao_2) + "% Ocupada");
      
    }
  });
}

//Lista Fotos do Banco de Dados
function listar_fotos(id_republica) {
  $.ajax({
    type: "GET",
    url: "./php/funcoes.php",
    data: {
      status: "12",
      id_republica: id_republica
    },
    cache: true,
    dataType: "JSON", //OBS só usar se o php estiver devolvendo um Json ex: echo json_encode();
    success: function (data) {
      $.each(data, function (contador) {
        var template = $("#loop_fotos").html();
        Mustache.parse(template);
        var rendered = Mustache.render(template, {
          link: data[contador]["link"],
          descricao: data[contador]["descricao"],
          id_imagem: data[contador]["id_imagem"],
          capa_principal: data[1]["link"]
        });
        $("#fotos_republicas").append(rendered);
      });
    },
    error: function () {
      swal(
        "Não há fotos, ou há um problema com o Banco de Dados!",
        "Consulte o Desenvolvedor!",
        "error"
      ); //Um aviso de erro
    }
  });
}

//Função para dar nome aleatório as imagens
function guid() {
  function s4() {
    return Math.floor((1 + Math.random()) * 0x10000)
      .toString(16)
      .substring(1);
  }
  return s4() + s4();
}

