<!DOCTYPE html>
<html lang="pt-br">

<!--Header-->
<?php include_once('./php/header.php');?>
<!--Header-->

<body class="adminbody">

<div id="main">

	<!-- top bar navigation -->
    <?php 
    session_start();

    if(@$_SESSION['status']){
        $_SESSION['usuario'] = true;    
    }else{
        $_SESSION['usuario'] = false;
    }

    

    if($_SESSION['usuario']){
        include_once('./php/top_side.php');//top
        include_once('./php/left_side.php');//left
    }

    
    ?>
	


    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            <?php 
                if($_SESSION['usuario']){
                    include_once('./php/dashboard.php');//conteudo
                }else{
                    include_once('./login.php');
                }
                
            ?>
			<div class="container-fluid">					
						
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