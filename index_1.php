
<?php	
	include "template/topo.php";	
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}
	$sessao_user = $_SESSION['nome'];
	$sessao_id = $_SESSION['id'];
	$sessao_senha = 9999;//apagar!
?>
				
			<article id = "content_index">
				<h2>Descrição do Sistema</h2>				
				<!-- definir artigo -->
			  <article>				
				<br><p class = "texto">Este ambiente é destinado ao auxílio de especialistas no registro, organização e monitoramento de requisitos. </p>
				<br><p class = "texto">Os principais recursos para apoio são:</p>
				
				<img src = "figura/check.jpg" />
				<img src = "figura/olho2.jpeg" />	
				
				<ul class = "ul_content">
					<li>Cadastro dos requisitos</li>
					<li>Rastreamento dos requisitos</li>
					<li>Organização dos requisitos</li>
					<li>Monitoramento do estado do requisito</li>					
				</ul>	
						
			  </article>		 
			</article><!--/content-->		
			
<?php
	include "template/rodape.php";
?>
		
