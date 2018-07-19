<?php 
	session_start();
	include "conexao.php"; 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset = "UTF-8"/>
	<title>DoMaR</title>
	<link rel="shortcut icon" href="figura/domar.png" type="image/x-icon"/>	
	<link rel = "stylesheet" type = "text/css" href = "css/formatacao.css"/>		
	<link rel="stylesheet" type="text/css" href="css/styles.css" />
	<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
	<script src="js/script.js"></script>
</head>
	<body>			
		<div id = "wrapper">
			<header id = "header">	
				<a href='index.php'><img class = "domar" src = "figura/domar.png" /></a>
				<center><img class = "fig_texto" src = "figura/aa.png"/></center>				
			</header><!--/header-->
			<div id='cssmenu'>
				<?php
				/* =======    MENU =====================================   */
				if(!isset($_SESSION['nome']) && (!isset($_SESSION['senha']))){	
						echo "<a href='login.php'class = 'aformat'>Login</a>  <a href = 'cadastro_usuario.php' class = 'aformat'> Cadastre-se </a>			
				  	   
				   ";
				}
			
				else{
					
				echo"<ul>
				   <li><a href='index.php'><span>Início</span></a>
				   <ul>
						 <li><a href='orientacao.php'><span>Orientações</span></a></li>
						 <li><a href='contato.php'><span>Contato</span></a></li>
						 <li><a href='#'><span>Sobre</span></a></li>						 
					  </ul>				   
				   </li>
				   <li class='has-sub'><a href='#'><span>Cadastrar <br> Dados</span></a>
					  <ul>
						 <li><a href='cadastro_origem.php'><span>Origem</span></a></li>
						 <li><a href='cadastro_req.php'><span>Requisito</span></a></li>
					  </ul>
				   </li>				   
				   <li class='has-sub'><a href='#'><span>Alterar <br> Dados</span></a>
						<ul>
						 <li><a href='consulta_usuario.php'><span>Usuário</span></a></li>						 
						 <li><a href='consulta_origem.php'><span>Origem</span></a></li>
						 <li><a href='consulta_req.php'><span>Requisito</span></a></li>
					  </ul>				   
				   </li>
				   <li class='has-sub'><a href='#'><span>Rastrear <br> Requisitos</span></a>
				   		<ul>
							<li><a href='consulta_req_mapeado.php'><span>Mapear</span></a>
							<li><a href='visualizar_tab_req_map.php'><span>Ver Mapeamento</span></a>								
						</ul>			   
				   <li class= 'has-sub'><a href='#'><span>Consultar <br> Requisitos</span></a>				   
						<ul>
							<li class='has-sub'><a href='#'><span>Por Usuários</span></a>
								<ul>
									<li><a href='mo_req_cliente.php'><span>Cliente</span></a></li>
									<li><a href='mo_req_func.php'><span>Funcionário</span></a></li>
								</ul>
									</li>
								<li class='has-sub'><a href='#'><span>Por Categoria</span></a>
									<ul>
											<li><a href='mon_cat_interface.php'><span>Interface</span></a></li>
											<li><a href='mon_cat_desenv.php'><span>Desenvolvimento</span></a></li>
											<li><a href='mon_cat_teste.php'><span>Teste</span></a></li>
										</ul>
									</li>
								
								<li class='has-sub'><a href='#'><span>Por Tipo Requisito</span></a>
									<ul>
										<li><a href='mon_tipo_func.php'><span>Funcional</span></a></li>
										<li><a href='mon_tipo_nfunc.php'><span>Não Funcional</span></a></li>
										<li><a href='mon_tipo_dominio.php'><span>Domínio</span></a></li>
									</ul>
								</li>
								<li class='has-sub'><a href='#'><span>Por Status</span></a>
									<ul>
										<li><a href='mon_estado_incompleto.php'><span>Incompleto</span></a></li>
										<li><a href='mon_estado_completo.php'><span>Completo</span></a></li>
										<li><a href='mon_estado_revisao.php'><span>Revisão</span></a></li>
									</ul>
								</li>												
						 							 
						  <li class='has-sub'><a href='#'><span>Por Prioridade</span></a>
									<ul>
										<li><a href='mon_pri_essencial.php'><span>Essencial</span></a></li>
										<li><a href='mon_pri_importante.php'><span>Importante</span></a></li>
										<li><a href='mon_pri_desejavel.php'><span>Desejável</span></a></li>
									</ul>
							</li>
							<li><a href='mo_req_origem.php'><span>Por Origem</span></a></li>
							<li><a href='mon_ord_crescente.php'><span>Em Ordem crescente</span></a></li>									
							<li><a href='monitoramento.php'><span>Combinar Fatores</span></a></li>	
					  </ul>					  	
					  <li class='has-sub'><a href='historico.php'><span>Histórico <br> Modificações</span></a>	
							<ul>
							<li><a href='historico.php'><span>Geral</span></a></li>
							<li ><a href='historico_por_req.php'><span>Por Requisito</span></a>	</li>						
							<li class='has-sub'><a href = '#'><span>Por Usuário</span></a>
								<ul>
									<li><a href='historico_escolhe_cliente.php'><span>Cliente</span></a></li>
									<li><a href='historico_escolhe_func.php'><span>Funcionário</span></a></li>
								</ul>
							</li>							
						</ul>
					  			  			  
				   </li>
				</ul>";
				echo '<div id = "sessao">
						<p>Olá '.$_SESSION['nome'].'
						<a href = "logout.php" class = "aformat"><b>Sair</b></a></p>
					</div>	';
					
				}
				/* ================ FIM MENU =================================*/
				?>
						
			</div>		
