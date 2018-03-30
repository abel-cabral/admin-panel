<<<<<<< HEAD
<?php
    include_once('./php/verifica_sessao.php');    
?>
	<!DOCTYPE html>
	<html lang="pt-br">

	<!--Header-->
	<?php include_once('./php/header.php');?>
	<!--Header-->

	<body class="adminbody">

		<div id="main">

			<!-- top bar navigation -->
			<?php  
        include_once('./php/top_side.php');//topo
        include_once('./php/left_side.php');//Barra Esquerda    
    ?>



			<div class="content-page">
				<!-- Start content -->
				<div class="content">
					<div class="container-fluid" id="conteudo">
						<div class="row">
							<div class="col-xl-12">
								<div class="breadcrumb-holder">
									<h1 class="main-title float-left">Dashboard</h1>
									<ol class="breadcrumb float-right">
										<li class="breadcrumb-item">Início</li>
										<li class="breadcrumb-item active">Dashboard</li>
									</ol>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
						<!-- end row -->

						<div class="row">
							<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
								<div class="card-box noradius noborder bg-default">
									<i class="fa fa-file-text-o float-right text-white"></i>
									<h6 class="text-white text-uppercase m-b-20">Cadastros</h6>
									<h1 class="m-b-20 text-white counter">1,587</h1>
									<span class="text-white">15 Novos Hoje</span>
								</div>
							</div>

							<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
								<div class="card-box noradius noborder bg-warning">
									<i class="fa fa-bar-chart float-right text-white"></i>
									<h6 class="text-white text-uppercase m-b-20">Visitantes</h6>
									<h1 class="m-b-20 text-white counter">41</h1>
									<span class="text-white">25% Que em Fevereiro</span>
=======
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml" lang="pt-br">

<head>
	<!-- COMMON TAGS -->
	<meta charset="utf-8">
	<title>República do Claudinho</title>
	<!-- Search Engine -->
	<meta name="description" content="Quartos femininos e masculinos para estudantes. Quartos quádruplos, triplos e duplos com frigobar, todas as despesas inclusas. A 10 minutos andando do Campus Gragoatá, BusUFF, Anhanguera e Universo.">
	<meta name="image" content="https://cdn.pbrd.co/images/8sKBaUWVb.jpg">
	<!-- Schema.org for Google -->
	<meta itemprop="name" content="República do Claudinho">
	<meta itemprop="description" content="Quartos femininos e masculinos para estudantes. Quartos quádruplos, triplos e duplos com frigobar, todas as despesas inclusas. A 10 minutos andando do Campus Gragoatá, BusUFF, Anhanguera e Universo.">
	<meta itemprop="image" content="https://cdn.pbrd.co/images/8sKBaUWVb.jpg">
	<!-- Open Graph general (Facebook, Pinterest & Google+) -->
	<meta name="og:title" content="República do Claudinho">
	<meta name="og:description" content="Quartos femininos e masculinos para estudantes. Quartos quádruplos, triplos e duplos com frigobar, todas as despesas inclusas. A 10 minutos andando do Campus Gragoatá, BusUFF, Anhanguera e Universo.">
	<meta name="og:image" content="https://cdn.pbrd.co/images/8B8KUlHaV.png">
	<meta name="og:url" content="http://www.republicadoclaudinho.com">
	<meta name="og:site_name" content="Republica do Claudinho">
	<meta name="og:locale" content="pt_BR">
	<meta property="fb:app_id" content="294161640996451">
	<meta name="og:type" content="website">
	<!-- Icones -->
	<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/imagens/icones/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/imagens/icones/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/imagens/icones/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/imagens/icones/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/imagens/icones/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/imagens/icones/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/imagens/icones/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/imagens/icones/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192" href="/imagens/icones/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/imagens/icones/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/imagens/icones/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/imagens/icones/favicon-16x16.png">
	<link rel="manifest" href="/imagens/icones/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

	<link rel='stylesheet prefetch' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel='stylesheet prefetch' href='http://startbootstrap.com/templates/agency/font-awesome-4.1.0/css/font-awesome.min.css'>
	<link rel="stylesheet" href="./css/index.css">

	<!-- Script do Google !-->
	<script>
		(function (i, s, o, g, r, a, m) {
			i['GoogleAnalyticsObject'] = r;
			i[r] = i[r] || function () {
				(i[r].q = i[r].q || []).push(arguments)
			}, i[r].l = 1 * new Date();
			a = s.createElement(o),
				m = s.getElementsByTagName(o)[0];
			a.async = 1;
			a.src = g;
			m.parentNode.insertBefore(a, m)
		})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
		ga('create', 'UA-91129237-2', 'auto');
		ga('send', 'pageview');
	</script>
</head>

<body>
	<!-- SDK Javascript do Facebook !-->
	<div id="fb-root"></div>
	<script>
		(function (d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s);
			js.id = id;
			js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.10&appId=294161640996451";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>

	<!------------------------------------!-->
	<div id="fb-root"></div>
	<script>
		(function (d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s);
			js.id = id;
			js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.10&appId=294161640996451";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>

	<!----------------Fim do SKD--------------------!-->


	<body id="page-top" class="index" data-pinterest-extension-installed="cr1.3.4" onload="listar_fotos_capa('.bga',1);//tela Principal">
		<!--Aqui entra o fundo, como adtributo css-->
		<div class="bga"></div>

		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-fixed-top navbar-shrink">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header page-scroll">

					<div class="fb-like" data-href="https://www.facebook.com/republicadoclaudinho/" data-layout="standard" data-action="recommend"
					    data-size="small" data-show-faces="true" data-share="true"></div>
				</div>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->

			</div>
			<!-- /.container-fluid -->
		</nav>

		<!-- Header -->
		<header>
			<div class="container-fluid">
				<div class="intro-text">
					<div class="intro-lead-in">Olá!</div>
					<div class="intro-heading">Conheça as Repúblicas do Claudinho!</div>
					<div class="row">
						<div class="container">
							<div class="col-sm-4">
								<div class="col-md-12 text-center">
									<div class="nome_republica" onclick="location.href='./centro.html';">
										<div class="panel-heading">
											<div style="font-size:11em; color:#72a8ff">
												<i class="fa fa-fort-awesome castelo"></i>
											</div>
											<h3>República do
												<br> Centro</h3>
										</div>

										<a class="btn btn-lg btn-block btn-success">Conhecer</a>

									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="col-md-12 text-center">
									<div class="nome_republica" onclick="location.href='./inga.html';">
										<div class="panel-heading">
											<div style="font-size:11em; color:#feea56">
												<i class="fa fa-fort-awesome castelo"></i>
											</div>
											<h3>República do
												<br>Ingá</h3>
										</div>

										<a class="btn btn-lg btn-block btn-success">Conhecer</a>

									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="col-md-12 text-center">
									<div class="nome_republica" onclick="location.href='./vermelha.html';">
										<div class="panel-heading">
											<div style="font-size:11em; color:#9e0c22">
												<i class="fa fa-fort-awesome castelo"></i>
											</div>
											<h3>República
												<br>Praia Vermelha</br>
											</h3>
										</div>

										<a class="btn btn-lg btn-block btn-success">Conhecer</a>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- Sobre a Cidade -->
		<section id="about">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<h3 class="section-subheading text-muted">
							Estamos em pontos estratégicos da cidade, assim você facilmente chega a qualquer parte dela seja
							a pé, de bike ou por ônibus.
						</h3>
						<h2 class="section-heading">Nossas Repúblicas possuem</h2>
					</div>
				</div>
				<div class="row">
					<!-- Services Section -->
					
						<div class="container">
							<div class="row">

								<div class="col-sm-6">
									<span class="fa-stack fa-4x">
										<i class="fa fa-circle fa-stack-2x text-primary"></i>
										<i class="glyphicon glyphicon-signal"></i>
									</span>
									<h4 class="service-heading">Wi-Fi</h4>
									<p class="text-muted">240 MB de Intenet.</p>
								</div>
								<div class="col-sm-6">
									<span class="fa-stack fa-4x">
										<i class="fa fa-circle fa-stack-2x text-primary"></i>
										<i class="glyphicon glyphicon-home"></i>
									</span>
									<h4 class="service-heading">Ambiente</h4>
									<p class="text-muted"> Repúblicas com ambiente amplo e espaço de convívio.</p>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-6">
									<span class="fa-stack fa-4x">
										<i class="fa fa-circle fa-stack-2x text-primary"></i>
										<i class="glyphicon glyphicon-bed"></i>
									</span>
									<h4 class="service-heading">Quartos</h4>
									<p class="text-muted">Quartos femininos e masculinos confortáveis com frigobar e armário individual com chave.</p>
<<<<<<< HEAD
>>>>>>> 47e577bbe73d048fb73fff6fc9320357718f0696
=======
>>>>>>> 47e577bbe73d048fb73fff6fc9320357718f0696
								</div>
							</div>

<<<<<<< HEAD
							<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
								<div class="card-box noradius noborder bg-info">
									<i class="fa fa-user-o float-right text-white"></i>
									<h6 class="text-white text-uppercase m-b-20">Moradores</h6>
									<h1 class="m-b-20 text-white counter">60</h1>
									<span class="text-white">Moradores Ativos</span>
								</div>
							</div>

							<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
								<div class="card-box noradius noborder bg-danger">
									<i class="fa fa-bell-o float-right text-white"></i>
									<h6 class="text-white text-uppercase m-b-20">Remoções</h6>
									<h1 class="m-b-20 text-white counter">58</h1>
									<span class="text-white">Moradores Saíram</span>
								</div>
							</div>
						</div>
						<!-- end row -->
=======
								<div class="col-sm-6">
									<span class="fa-stack fa-4x">
										<i class="fa fa-circle fa-stack-2x text-primary"></i>
										<i class="glyphicon glyphicon-education"></i>
									</span>
									<h4 class="service-heading">Sala de Estudos</h4>
									<p class="text-muted">Sala de estudos ampla, arejada e com espaço para notebook.</p>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<span class="fa-stack fa-4x">
										<i class="fa fa-circle fa-stack-2x text-primary"></i>
										<i class="glyphicon glyphicon-cutlery"></i>
									</span>
									<h4 class="service-heading">Cozinha</h4>
									<p class="text-muted">Cozinha toda equipada.</p>
								</div>

								<div class="col-sm-6">
									<span class="fa-stack fa-4x">
										<i class="fa fa-circle fa-stack-2x text-primary"></i>
										<i class="glyphicon glyphicon-tint"></i>
									</span>
									<h4 class="service-heading">Limpeza</h4>
									<p class="text-muted">Semanal e maquina de lavar de livre utilização.</p>
								</div>
							</div>
						</div>
					
				</div>
			</div>
			<hr>
>>>>>>> 47e577bbe73d048fb73fff6fc9320357718f0696



						<div class="container-fluid">
							<div class="embed-responsive embed-responsive-16by9">
								<iframe scrolling="yes" style="overflow: hidden;"  class="embed-responsive-item" src="http://www.republicadoclaudinho.com/" allowfullscreen></iframe>
							</div>


						</div>
						<!-- end row -->




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
		<script src="https://www.gstatic.com/firebasejs/4.12.0/firebase.js"></script>
		<script>
			// Initialize Firebase
			var config = {
				apiKey: "AIzaSyBC5a9iykOq-HHF3wxTgfiqCQUvAALJRfI",
				authDomain: "republica-ecfe3.firebaseapp.com",
				databaseURL: "https://republica-ecfe3.firebaseio.com",
				projectId: "republica-ecfe3",
				storageBucket: "republica-ecfe3.appspot.com",
				messagingSenderId: "165737039148"
			};
			firebase.initializeApp(config);
		</script>

		<?php
        include_once('./scripts.html');
    ?>
			<!-- END Java Script  -->



<<<<<<< HEAD
	</body>

=======
>>>>>>> 47e577bbe73d048fb73fff6fc9320357718f0696
</html>
