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



	<div class="content-page"><div class="content"><div class="container-fluid" id="conteudo"><div class="row"><div class="col-xl-12"><div class="breadcrumb-holder"><h1 class="main-title float-left">Dashboard</h1><ol class="breadcrumb float-right"><li class="breadcrumb-item">Início</li><li class="breadcrumb-item active">Dashboard</li></ol><div class="clearfix"></div></div></div></div><div class="row"><div class="col-xs-12 col-md-6 col-lg-6 col-xl-3"><div class="card-box noradius noborder bg-default"> <i class="fa fa-file-text-o float-right text-white"></i><h6 class="text-white text-uppercase m-b-20">Cadastros</h6><h1 class="m-b-20 text-white counter">1,587</h1> <span class="text-white">15 Novos Hoje</span></div></div><div class="col-xs-12 col-md-6 col-lg-6 col-xl-3"><div class="card-box noradius noborder bg-warning"> <i class="fa fa-bar-chart float-right text-white"></i><h6 class="text-white text-uppercase m-b-20">Visitantes</h6><h1 class="m-b-20 text-white counter">41</h1> <span class="text-white">25% Que em Fevereiro</span></div></div><div class="col-xs-12 col-md-6 col-lg-6 col-xl-3"><div class="card-box noradius noborder bg-info"> <i class="fa fa-user-o float-right text-white"></i><h6 class="text-white text-uppercase m-b-20">Moradores</h6><h1 class="m-b-20 text-white counter">60</h1> <span class="text-white">Moradores Ativos</span></div></div><div class="col-xs-12 col-md-6 col-lg-6 col-xl-3"><div class="card-box noradius noborder bg-danger"> <i class="fa fa-bell-o float-right text-white"></i><h6 class="text-white text-uppercase m-b-20">Remoções</h6><h1 class="m-b-20 text-white counter">58</h1> <span class="text-white">Moradores Saíram</span></div></div></div><div class="container-fluid"><div class="embed-responsive embed-responsive-16by9"> <iframe scrolling="yes" style="overflow: hidden;" class="embed-responsive-item" src="http://www.republicadoclaudinho.com/" allowfullscreen></iframe></div></div></div></div></div>
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



	</body>

</html>