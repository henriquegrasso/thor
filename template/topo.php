<?php 
	session_start();
	include "conexao.php"; 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset = "UTF-8"/>
	<title>DoMaR</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="shortcut icon" href="figura/domar.png" type="image/x-icon"/>	
	<link rel = "stylesheet" type = "text/css" href = "css/formatacao.css"/>		
	<link rel="stylesheet" type="text/css" href="css/styles.css" />
	<!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Compiled and minified CSS -->
	
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    
    <script type="text/javascript" src="js/src/tests.js"></script>
    
    <!-- Initializations -->
    <script type="text/javascript">
        // Animations initialization
        new WOW().init();
    </script>
	<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
	<script src="js/script.js"></script>


</head>
	<body>			
		<div id = "wrapper">
			<!-- <header id = "header">	
				<a href='index.php'><img class = "domar" src = "figura/domar.png" /></a>
				<center><img class = "fig_texto" src = "figura/aa.png"/></center>				
			</header><!--/header-->
			<header>
				<nav class="navbar navbar-light bg-light">
				  <a class="navbar-brand" href="#">PaDoRe - Padronização e Documentação de Requisitos</a>
				</nav>
			</header>
			<div id='cssmenu'>
				<?php
				/* =======    MENU =====================================   */
				if(!isset($_SESSION['nome']) && (!isset($_SESSION['senha']))){	
						echo "
						<ul>
							<li><a href='login.php'><span>Login</span></a></li>
							<li><a href='cadastro_usuario.php'><span>Cadastre-se</span></a></li>
						</ul>			
				   ";
				}
			
				else{
					
				echo"<ul>
				   <li class='has-sub'><a href='index.php'><span>Início</span></a>
				   <ul>
						 <li><a href='orientacao.php'><span>Orientações</span></a></li>
						 <li><a href='contato.php'><span>Contato</span></a></li>
						 <li><a href='#'><span>Sobre</span></a></li>						 
					  </ul>				   
				   </li>
				   <li class='has-sub'><a href='#'><span>Cadastrar <br> Dados</span></a>
					  <ul>
						 <li><a href='cadastro_req.php'><span>Requisito</span></a></li>
						 <li><a href='cadastro_story.php'><span>Story</span></a></li>
					  </ul>
				   </li>				   
				   <li class='has-sub'><a href='#'><span>Alterar <br> Dados</span></a>
						<ul>
						 <li><a href='consulta_usuario.php'><span>Usuário</span></a></li>						 
						 <li><a href='consultar_requisito.php'><span>Requisito</span></a></li>
						 <li><a href='selecionar_req_alt_story.php'><span>Story</span></a></li>
					  	 <li><a href='config_ator.php'><span>Ator</span></a></li>
						 <li><a href='config_secao.php'><span>Seção do site</span></a></li>
					  </ul>				   
				   </li>
				   <li class= 'has-sub'><a href='#'><span>Consultar <br> Requisitos</span></a>				   
						<ul>
								<li class='has-sub'><a href='#'><span>Por Complexidade</span></a>
									<ul>
											<li><a href='con_com_alta.php'><span>Alta</span></a></li>
											<li><a href='con_com_media.php'><span>Média</span></a></li>
											<li><a href='con_com_baixa.php'><span>Baixa</span></a></li>
										</ul>
									</li>
								
								<li class='has-sub'><a href='#'><span>Por Tipo Requisito</span></a>
									<ul>
										<li><a href='con_tipo_funcional.php'><span>Funcional</span></a></li>
										<li><a href='con_tipo_nfuncional.php'><span>Não Funcional</span></a></li>
										<li><a href='con_tipo_interface.php'><span>Interface</span></a></li>
									</ul>
								</li>
								<li class='has-sub'><a href='#'><span>Por Status</span></a>
									<ul>
										<li><a href='con_status_aberto.php'><span>Em Aberto</span></a></li>
										<li><a href='con_status_progresso.php'><span>Em Progresso</span></a></li>
										<li><a href='con_status_sobaprovacao.php'><span>Sob Aprovação</span></a></li>
										<li><a href='con_status_finalizado.php'><span>Finalizado</span></a></li>
										<li><a href='con_status_cancelado.php'><span>Cancelado</span></a></li>
									</ul>
								</li>												
						 							 
						  <li class='has-sub'><a href='#'><span>Por Prioridade</span></a>
									<ul>
										<li><a href='con_pri_alta.php'><span>Alta</span></a></li>
										<li><a href='con_pri_media.php'><span>Média</span></a></li>
										<li><a href='con_pri_baixa.php'><span>Baixa</span></a></li>
									</ul>
							</li>						
							<li><a href='consulta_avancada.php'><span>Combinar Fatores</span></a></li>	
					  </ul>					  	
					  <li class='has-sub'><a href='historico.php'><span>Histórico <br> Modificações</span></a>	
							<ul>
							<li><a href='historico.php'><span>Geral</span></a></li>
							<li ><a href='historico_por_req.php'><span>Por Requisito</span></a>	</li>					
						</ul>
						<li><a href='logout.php'><span>Sair</span></a></li>
					  			  			  
				   </li>
				</ul>";
				echo '<div id = "sessao">
						<p>Olá '.$_SESSION['nome'].'
						
					</div>	';
					
				}
				/* ================ FIM MENU =================================*/
				?>
						
			</div>		
