<?php
    include_once('./php/verifica_sessao.php');    
?>
<?php
    include_once('./php/verifica_sessao.php');    
?>
    <!DOCTYPE html>
    <html lang="pt-br">
 
    <!--Header-->
    <?php include_once('./php/header.php');?>
        <!--Header-->

        <body class="adminbody" onload="">
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

                                <style>
                                    @import url("http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css");
                                    .panel-pricing {
                                        -moz-transition: all .3s ease;
                                        -o-transition: all .3s ease;
                                        -webkit-transition: all .3s ease;
                                    }
                                    
                                    .panel-pricing:hover {
                                        box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.2);
                                    }
                                    
                                    .panel-pricing .panel-heading {
                                        padding: 20px 10px;
                                    }
                                    
                                    .panel-pricing .panel-heading .fa {
                                        margin-top: 10px;
                                        font-size: 58px;
                                    }
                                    
                                    .panel-pricing .list-group-item {
                                        color: #777777;
                                        border-bottom: 1px solid rgba(250, 250, 250, 0.5);
                                    }
                                    
                                    .panel-pricing .list-group-item:last-child {
                                        border-bottom-right-radius: 0px;
                                        border-bottom-left-radius: 0px;
                                    }
                                    
                                    .panel-pricing .list-group-item:first-child {
                                        border-top-right-radius: 0px;
                                        border-top-left-radius: 0px;
                                    }
                                    
                                    .panel-pricing .panel-body {
                                        background-color: #f0f0f0;
                                        font-size: 40px;
                                        color: #777777;
                                        padding: 20px;
                                        margin: 0px;
                                    }
                                </style>

                                <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
                                <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
                                <!-- Include the above in your HEAD tag -->

                                <br/>
                                <br/>
                                <br/>

                                <!-- Plans -->
                                <section id="plans">
                                    <div class="container">
                                        <div class="row">
                                            <!-- item -->                                                                                     
                                            <div class="col-lg-4 text-center text-success">
                                                <div class="panel panel-danger panel-pricing">
                                                    <div class="panel-heading">
                                                        <i class="fa fa-fort-awesome"></i>
                                                        <h3>República Centro</h3>
                                                    </div>
                                                    <div class="panel-body text-center">                                                    
                                                        <p><strong id='rvagas1'>Carregado</strong></p>                                                    
                                                    </div>
                                                    <ul class="list-group text-justify">
                                                        
                                                    
                                                        <li class="list-group-item text-danger"><i class="fa fa-fort-awesome"></i> Vagas Restantes: <strong id='r1total'>0</strong > Vagas</li>
                                                        <li class="list-group-item text-primary"><i class="fa fa-graduation-cap"></i> Total de Residentes: <strong id='r1'>0</strong> Vagas Ocupadas</li>
                                                        <li class="list-group-item"> Residente em Masculino Duplo: <strong id='r1M2'>0</strong></li>
                                                        <li class="list-group-item"> Residente em Feminino Duplo: <strong id='r1F2'>0</strong></li>
                                                        <li class="list-group-item"> Residente em Masculino Quádruplo: <strong id='r1M4'>0</strong></li>
                                                        <li class="list-group-item"> Residente em Feminino Quádruplo: <strong id='r1F4'>0</strong></li>

                                                        
                                                    </ul>                                                    
                                                    <div class="panel-footer" data-toggle="modal" data-target="#modal-republica">
                                                        <a class="btn btn-lg btn-block btn-success nome_republica" href="#" data-republica="1">Alterar Dados</a>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- /item -->


                                            <!-- item -->
                                            <div class="col-lg-4 text-center text-warning">
                                                <div class="panel panel-warning panel-pricing">
                                                    <div class="panel-heading">
                                                        <i class="fa fa-fort-awesome"></i>
                                                        <h3>República Ingá</h3>
                                                    </div>
                                                    <div class="panel-body text-center">
                                                        <p><strong id='rvagas2' class="">Carregado</strong></p>
                                                    </div>
                                                    <ul class="list-group text-justify">
                                                    <li class="list-group-item text-danger"><i class="fa fa-fort-awesome"></i> Vagas Restantes: <strong id='r2total'>0</strong > Vagas</li>
                                                        <li class="list-group-item text-primary"><i class="fa fa-graduation-cap"></i> Total de Residentes: <strong id='r2'>0</strong > Vagas Ocupadas</li>
                                                        <li class="list-group-item"> Residente em Masculino Duplo: <strong id='r2M2'>0</strong></li>
                                                        <li class="list-group-item"> Residente em Feminino Duplo: <strong id='r2F2'>0</strong></li>
                                                        <li class="list-group-item"> Residente em Masculino Quádruplo: <strong id='r2M4'>0</strong></li>
                                                        <li class="list-group-item"> Residente em Feminino Quádruplo: <strong id='r2F4'>0</strong></li>
                                                    </ul>
                                                    <div class="panel-footer" data-toggle="modal" data-target="#modal-republica">
                                                        <a class="btn btn-lg btn-block btn-warning nome_republica" href="#" data-republica="2">Alterar Dados</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /item -->

                                            <!-- item -->
                                            <div class="col-lg-4 text-center text-danger">
                                                <div class="panel panel-success panel-pricing">
                                                    <div class="panel-heading">
                                                        <i class="fa fa-fort-awesome"></i>
                                                        <h3>Praia Vermelha</h3>
                                                    </div>
                                                    <div class="panel-body text-center">
                                                        <p><strong id='rvagas3'>Carregado</strong></p>
                                                    </div>
                                                    <ul class="list-group text-justify">
                                                        <li class="list-group-item text-danger"><i class="fa fa-fort-awesome"></i> Vagas Restantes: <strong id='r3total'>0</strong > Vagas</li>
                                                        <li class="list-group-item text-primary"><i class="fa fa-graduation-cap"></i> Total de Residentes: <strong id='r3'></strong > Vagas Ocupadas</li>
                                                        <li class="list-group-item"> Residente em Masculino Duplo: <strong id='r3M2'>0</strong></li>
                                                        <li class="list-group-item"> Residente em Feminino Duplo: <strong id='r3F2'>0</strong></li>
                                                        <li class="list-group-item"> Residente em Masculino Quádruplo: <strong id='r3M4'>0</strong></li>
                                                        <li class="list-group-item"> Residente em Feminino Quádruplo: <strong id='r3F4'>0</strong></li>
                                                    </ul>
                                                    <div class="panel-footer" data-toggle="modal" data-target="#modal-republica">
                                                        <a class="btn btn-lg btn-block btn-danger nome_republica" href="#" data-republica="3">Alterar Dados</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /item -->
                                            
                                            <div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-labelledby="modal-republica" aria-hidden="true" id="modal-republica">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <!--Quartos Duplos-->
                                                        <form action="" id='form_republica_vaga' method="POST">
                                                        <!--Chama o MODAL-->    
                                                        <div class="modal-header">
                                                                <h5 class="modal-title">Atualizar Dados de Vagas</h5>
                                                                <button type="button" class="close" data-dismiss="modal">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    <span class="sr-only">Fechar</span>
                                                                </button>
                                                            </div>
                                                            <!--MODAL-->
                                                            <div class="modal-body">
                                                            <label for="genero"><strong>INFORME ATENTAMENTE OS DADOS ABAIXO:</strong></label><br>
                                                            <label for="genero">Total de vagas <strong>duplas</strong>?</label>
                                                                <div class="row col-lg-12">                                                                
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text" id="basic-addon1">Masculino</span>
                                                                                </div>
                                                                                <input type="text" class="form-control" name='dM' aria-label="Username" aria-describedby="basic-addon1" required>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text" id="basic-addon1">Feminino</span>
                                                                                </div>
                                                                                <input type="text" class="form-control" name='dF' aria-label="Username" aria-describedby="basic-addon1" required>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    
                                                                </div>

                                                                <!--Ofertas de Quartos Quadruplos-->                                                                
                                                                <label for="genero">Total de Vagas <strong>quádruplas</strong>?</label>
                                                                <div class="row col-lg-12">                                                                
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text" id="basic-addon1">Masculino</span>
                                                                                </div>
                                                                                <input type="text" class="form-control" name='qM' aria-label="Username" aria-describedby="basic-addon1" required>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text" id="basic-addon1">Feminino</span>
                                                                                </div>
                                                                                <input type="text" class="form-control" name='qF' aria-label="Username" aria-describedby="basic-addon1" required>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>                                                                    
                                                                    <label for="genero"><strong>PREÇO QUE DEVO EXIBIR NO SITE PARA OS QUARTOS:</strong></label>
                                                                    <div class="row col-lg-12">                                                                
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text" id="basic-addon1">Duplo</span>
                                                                                </div>
                                                                                <input class="form-control" name="mendupla" type="text" data-mask="###.00" data-mask-reverse="true" placeholder='R$' maxlength="7" required/>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="form-group">
                                                                            <div class="input-group mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text" id="basic-addon1">Quádruplo</span>
                                                                                </div>
                                                                                <input class="form-control" name="menquad" type="text" data-mask="###.00" data-mask-reverse="true" placeholder='R$' maxlength="7" required/>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>                     
                                                                
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </section>
                                <!-- /Plans -->

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