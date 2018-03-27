<div class="headerbar">

		<!-- LOGO -->
        <div class="headerbar-left">
			<a href="index.html" class="logo"><img alt="Logo" src="assets/images/logo.png" /> <span>Administração</span></a>
        </div>

        <nav class="navbar-custom">

                    <ul class="list-inline float-right mb-0">						
                        <li class="list-inline-item dropdown notif">
                            <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="<?php echo @$_SESSION['resultado']['foto'] ?>" alt="Sua Foto" class="avatar-rounded" >
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    
                                    <!-- ADICIONA NOME DO USUARIO E CONVERTE PARA MAIÚSCULO -->
                                    
                                    <h5 class="text-overflow"><small>Olá, <?php echo  ucfirst($_SESSION['resultado']['nome']); ?></small> </h5>
                                </div>

                                <!-- item-->
                                <a href="pro-profile.html" class="dropdown-item notify-item">
                                    <i class="fa fa-user"></i> <span>Conta</span>
                                </a>

                                <!-- item-->
                                <a href="#" class="dropdown-item notify-item" id='deslogue'>
                                    <i class="fa fa-power-off"></i> <span>Sair</span>
                                </a>
																
                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left">
								<i class="fa fa-fw fa-bars"></i>
                            </button>
                        </li>                        
                    </ul>

        </nav>

	</div>