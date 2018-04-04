<?php    
    include_once('./php/verifica_sessao.php');    
?>
<!DOCTYPE html>
<html lang="pt-br">
<!--Header-->
<?php include_once('./php/header.php');?>
<!--Header-->

<body class="adminbody" onload="todos_Moradores()">
	<div id="main">
		<!-- top bar navigation -->
		<?php 
        include_once('./php/top_side.php');//top
        include_once('./php/left_side.php');//left    
    ?>
		<div class="content-page">
			<!-- Start content -->
			<div class="content">
				<div class="container-fluid" id="conteudo">
					<!-- Descrição Curta-->
					<div class="row">
						<div class="col-xl-12">
							<div class="breadcrumb-holder">
								<h1 class="main-title float-left">Moradores</h1>
								<ol class="breadcrumb float-right">
									<li class="breadcrumb-item">Início</li>
									<li class="breadcrumb-item active">Moradores</li>
								</ol>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					<!-- Row principal -->
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
							<div class="card mb-3">
								<div class="card-header">
									<span class="pull-right">
										<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_add_user">
											<i class="fa fa-user-plus" aria-hidden="true"></i> Add Novo Morador

										</button>
									</span>
									<div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-labelledby="modal_add_user" aria-hidden="true" id="modal_add_user">
										<div class="modal-dialog">
											<div class="modal-content">
												<!--Formulário de Cadastro de Novos Moradores-->
												<form action="" id='form_morador' method="POST">
													<div class="modal-header">
														<h5 class="modal-title">Cadastro de Morador</h5>
														<button type="button" class="close" data-dismiss="modal">
															<span aria-hidden="true">&times;</span>
															<span class="sr-only">Fechar</span>
														</button>
													</div>
													<div class="modal-body">
														<div class="row">
															<div class="col-lg-12">
																<div class="form-group">
																	<label>Nome Completo (obrigatório)</label>
																	<input class="form-control" name="nome" placeholder="Nome Completo" type="text" maxlength="119" min="10" required />
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-lg-12">
																<div class="form-group">
																	<div class="form-group">
																		<label for="genero">Informe o Sexo do Morador (obrigatório)</label>
																		<br/>
																		<div class='row'>
																			<div class='col-md-6'>
																				<input type="radio" name="sexo" value="M" required> Masculino


																				<br/>
																			</div>
																			<div class='col-md-6'>
																				<input type="radio" name="sexo" value="F" required> Feminino

																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-lg-6">
																<div class="form-group">
																	<label>Curso (obrigatório)</label>
																	<select name="curso" class="form-control" required>
																		<option value="">- Buscar Curso -</option>
																		<optgroup label="Universidade Federal Fluminense">
																			<option value="Administração">Administração</option>
																			<option value="Administração Pública">Administração Pública</option>
																			<option value="Antropologia">Antropologia</option>
																			<option value="Arquitetura e Urbanismo">Arquitetura e Urbanismo</option>
																			<option value="Arquivologia">Arquivologia</option>
																			<option value="Artes">Artes</option>
																			<option value="Biblioteconomia e Documentação">Biblioteconomia e Documentação</option>
																			<option value="Biomedicina">Biomedicina</option>
																			<option value="Ciência Ambiental">Ciência Ambiental</option>
																			<option value="Ciência da Computação">Ciência da Computação</option>
																			<option value="Ciências Atuariais">Ciências Atuariais</option>
																			<option value="Ciências Biológicas">Ciências Biológicas</option>
																			<option value="Ciências Contábeis">Ciências Contábeis</option>
																			<option value="Ciências Econômicas">Ciências Econômicas</option>
																			<option value="Ciências Naturais">Ciências Naturais</option>
																			<option value="Ciências Sociais">Ciências Sociais</option>
																			<option value="Cinema e Audiovisual">Cinema e Audiovisual</option>
																			<option value="Computação">Computação</option>
																			<option value="Comunicação Social - Jornalismo">Comunicação Social - Jornalismo</option>
																			<option value="Comunicação Social - Publicidade e Propaganda">Comunicação Social - Publicidade e Propaganda</option>
																			<option value="Desenho Industrial">Desenho Industrial</option>
																			<option value="Direito">Direito</option>
																			<option value="Educação Física">Educação Física</option>
																			<option value="Enfermagem">Enfermagem</option>
																			<option value="Engenharia Agrícola e Ambiental">Engenharia Agrícola e Ambiental</option>
																			<option value="Engenharia Civil">Engenharia Civil</option>
																			<option value="Engenharia de Agronegócios">Engenharia de Agronegócios</option>
																			<option value="Engenharia de Petróleo">Engenharia de Petróleo</option>
																			<option value="Engenharia de Produção">Engenharia de Produção</option>
																			<option value="Engenharia de Recursos Hídricos e do Meio Ambiente">Engenharia de Recursos Hídricos e do Meio Ambiente</option>
																			<option value="Engenharia de Telecomunicações">Engenharia de Telecomunicações</option>
																			<option value="Engenharia Elétrica">Engenharia Elétrica</option>
																			<option value="Engenharia Mecânica">Engenharia Mecânica</option>
																			<option value="Engenharia Metalúrgica">Engenharia Metalúrgica</option>
																			<option value="Engenharia Química">Engenharia Química</option>
																			<option value="Estatística">Estatística</option>
																			<option value="Estudos de Mídia">Estudos de Mídia</option>
																			<option value="Farmácia">Farmácia</option>
																			<option value="Filosofia">Filosofia</option>
																			<option value="Física">Física</option>
																			<option value="Física com ênfase em Física Computacional">Física com ênfase em Física Computacional</option>
																			<option value="Fonoaudiologia">Fonoaudiologia</option>
																			<option value="Geofísica">Geofísica</option>
																			<option value="Geografia">Geografia</option>
																			<option value="História">História</option>
																			<option value="Hotelaria">Hotelaria</option>
																			<option value="Interdisciplinar em Educação do Campo">Interdisciplinar em Educação do Campo</option>
																			<option value="Jornalismo">Jornalismo</option>
																			<option value="Letras - Alemão">Letras - Alemão</option>
																			<option value="Letras - Espanhol">Letras - Espanhol</option>
																			<option value="Letras - Francês">Letras - Francês</option>
																			<option value="Letras - Grego">Letras - Grego</option>
																			<option value="Letras - Inglês">Letras - Inglês</option>
																			<option value="Letras - Italiano">Letras - Italiano</option>
																			<option value="Letras - Latim">Letras - Latim</option>
																			<option value="Letras - Português">Letras - Português</option>
																			<option value="Letras- Francês">Letras- Francês</option>
																			<option value="Matemática">Matemática</option>
																			<option value="Matemática com ênfase em Matemática Computacional">Matemática com ênfase em Matemática Computacional</option>
																			<option value="Medicina">Medicina</option>
																			<option value="Medicina Veterinária">Medicina Veterinária</option>
																			<option value="Nutrição">Nutrição</option>
																			<option value="Odontologia">Odontologia</option>
																			<option value="Pedagogia">Pedagogia</option>
																			<option value="Políticas Públicas">Políticas Públicas</option>
																			<option value="Processos Gerenciais">Processos Gerenciais</option>
																			<option value="Produção Cultural">Produção Cultural</option>
																			<option value="Psicologia">Psicologia</option>
																			<option value="Química">Química</option>
																			<option value="Química Industrial">Química Industrial</option>
																			<option value="Relações Internacionais">Relações Internacionais</option>
																			<option value="Segurança Pública">Segurança Pública</option>
																			<option value="Serviço Social">Serviço Social</option>
																			<option value="Sistemas de Informação">Sistemas de Informação</option>
																			<option value="Sociologia">Sociologia</option>
																			<option value="Turismo">Turismo</option>
																		</optgroup>
																		<optgroup label="Faculdade Privada">
																			<option value="Outros">Outros Cursos</option>
																		</optgroup>
																	</select>
																</div>
															</div>
															<div class="col-lg-6">
																<div class="form-group">
																	<label>Telefone (obrigatório)</label>
																	<input class="form-control" name="tel" type="text" pattern=".{10,13}" data-mask="## 00000-0000" placeholder="Mínimo 9 dígitos"
																	    data-mask-reverse="true" maxlength="13" required/>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-lg-12">
																<div class="form-group">
																	<label>Situação de Moradia (obrigatório)</label>
																	<select name="quarto" class="form-control" required>
																		<option value="">-- Local e Quarto --</option>
																		<optgroup label="República do Centro">
																			<option value="02">Quarto Duplo</option>
																			<option value="01">Quarto Quadruplo</option>
																		</optgroup>
																		<optgroup label="República do Ingá">
																			<option value="04">Quarto Duplo</option>
																			<option value="03">Quarto Quadruplo</option>
																		</optgroup>
																		<optgroup label="República da Praia Vermelha">
																			<option value="06">Quarto Duplo</option>
																			<option value="05">Quarto Quadruplo</option>
																		</optgroup>
																	</select>
																</div>
															</div>
														</div>
														<input name='status' value='3' type='hidden'>
													</div>
													<div class="modal-footer">
														<button type="submit" class="btn btn-danger">Incluir Morador</button>
													</div>
												</form>
											</div>
										</div>
									</div>


									<!-- Search form -->

									<form class="form-inline">
										<i class="fa fa-search" aria-hidden="true"></i>
										<input id="minhaEntrada" onkeyup="filtrarMorador()" title="Type in a name" class="form-control form-control-sm ml-3 w-75"
										    type="text" placeholder="Buscar Moradores" aria-label="Buscar Moradores">
									</form>

								</div>
								<!-- end card-header -->
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered" id="target">
											<!-- O ID DO MUSTACHE NA TAG PAI QUE QUERO LANÇAR-->
											<thead>
												<tr>
													<th>Nome Completo do Morador</th>
													<th class="text-center" style="width:130px">República</th>
													<th class="text-center" style="width:160px">Tipo de Quarto</th>
													<th class="text-center" style="width:50px">Ações</th>
												</tr>
											</thead>

											<script id="template" type="x-tmpl-mustache">
												<tr>
													<td>
														<span style="float: left; margin-right:10px;">
															<img alt="image" style="max-width:40px; height:auto;" src="./assets/images/avatars/{{sexo}}{{random_foto}}.png" />
														</span>
														<strong>{{nome}}</strong>
														<br />
														<small>{{telefone}} - {{curso}}</small>
													</td>
													<td class="text-center">{{republica}}</td>
													<td class="text-center">{{quarto}}{{sexo_completo}}</td>
													<td class="text-center">														
														<a href="#" data-id_morador='{{id}}' data-id_republica='{{moradia}}' data-id_quarto='{{id_quarto}}' data-sexo='{{sexo}}'
														    class="btn btn-danger btn-sm id_morador">
															<i class="fa fa-trash-o" aria-hidden="true"></i>
														</a>
													</td>
												</tr>
											</script>
										</table>

										<!--Início Efeito Carregando-->

										<!--Fim efeito Carregar-->

									</div>
								</div>
								<!-- end card-body -->
							</div>
							<!-- end card -->
						</div>
						<!-- end col -->
					</div>
				</div>
				<!-- END container-fluid -->
			</div>
			<!-- END content -->
		</div>
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
		<!-- END Java Script  -->
</body>

</html>