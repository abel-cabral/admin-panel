$(document).ready(function() {

    //Logar
    $("#form1").submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: './php/funcoes.php',
            data: $('#form1').serialize(),
            success: function(data) {                
                window.location = "./index.php";
            }
        });
    });

    //Deslogar
    $('#deslogue').click(function() {
        $.ajax({
            type: 'POST',
            url: './php/funcoes.php',
            data: "status=2",
            cache: false,
            success: function() {
                location.reload();
            },
            error: function() {
                alert('Houve algum erro, Não desloguei.');
            }
        })
    });

    //Cadastrar Moradores  
    $('#form_morador').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: './php/funcoes.php',
            data: $('#form_morador').serialize(), //Captura todos os valores no FORM e faz um OBJ. 
            cache: false,
            success: function() {
                location.reload();
            }
        })
    });

    //Atualizar Vagas --Capta o id da republica clicada      
        
        $(document).on ("click", ".nome_republica", function () {//Obs nem sempre o jquery capta o id, entao precisamos indicar um cmainho mais lógico
        var id_republica = $(this).data('republica');//Capta o id clicado e atribui a variavel     
        
        //Chama a função que faz a atualização
        $('#form_republica_vaga').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: './php/funcoes.php',
                data: $('#form_republica_vaga').serialize()+'&status=9&id_republica='+id_republica, //Captura todos os valores no FORM e faz um OBJ. 
                cache: false,
                success: function() {
                    alert($('#form_republica_vaga').serialize()+'&status=9&id_republica='+id_republica);
                }
            })
        });     
    });
    
    
    

     
        
    

    //FIM DO 'JQUERY'  
});

//OBS - Funções apenas Javascript devem ficar fora da estrutura JQuery

//Listar Moradores 
function todos_Moradores() {
    $.ajax({
        type: 'GET',
        url: './php/funcoes.php',
        data: {
            'status': '4'
        },
        cache: false,
        dataType: 'JSON',
        success: function(data) {
            $.each(data, function(contador) { //TEM QUE USAR O $.EACH PARA CONTAR O ARRAY, SE NAO IMPOSSÍVEL ESCREVER            
                var template = $('#template').html(); //Onde irá escrever
                Mustache.parse(template); // Opcional
                var rendered = Mustache.render(template, {
                    id: data[contador]['id_morador'],
                    nome: data[contador]['nome'],
                    sexo: data[contador]['sexo'],
                    telefone: data[contador]['telefone'],
                    mensalidade: data[contador]['mensalidade'],
                    quarto: data[contador]['quarto'],
                    curso: data[contador]['curso'],
                    republica: data[contador]['nome_republica']
                }); //O que irei escrever {chave: valor}
                $('#target').append(rendered); //SE USAR O .HTML O RESULTADO VAI SOBREESCREVER AE SÓ TEREMOS O ULTIMO
            });

            //Aqui Vou contar o total de moradores encontrados
            $('#total_de_moradores').html(data.length); //E Coloca-lo na tela
        }
    })
}

vagas_total();





//TODAS AS VAGAS
function vagas_total() {
    $.ajax({
        type: 'GET',
        url: './php/funcoes.php',
        data: {
            'status': '6'
        },
        cache: false,
        dataType: 'JSON',
        success: function(data) {
            
        }        
    })
    vagas_tipo('F', 'duplaF', '7');
    vagas_tipo('M', 'duplaM', '7');
    vagas_tipo('F', 'quadF', '8');
    vagas_tipo('M', 'quadM', '8');
}

//Número de Vagas disponíveis por tipo de quarto
function vagas_tipo(sexo, tipo, disparo) {

    $.ajax({
        type: 'GET',
        url: './php/funcoes.php',
        data: {
            'status': disparo,
            'sexo': sexo,
            'tipo_vaga': tipo
        },
        cache: false,
        dataType: 'JSON',
        success: function(data) {
            
        }
    })

}