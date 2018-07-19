<?php
	include "template/topo.php";
	
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}
?>
			
			<article id = "content_index">
				<header>
					<h2>Contato </h2>
				</header>
				<!-- definir artigo -->
			  <article>				
				<br><p class = "texto"> Entre em contato com a equipe técnica do sistema para: </p><br>
				<ul class = "ul_content">
					<li>Relatar falha no sistema</li>
					<li>Dar sugestões de melhorias</li>
					<li>Necessitar de suporte</li>														
				</ul>
				<br><p class = "texto">  O contato deve ser pelo email: milenerigolin@gmail.com </p>
			 </article>		 
			</article><!--/content-->		
			
<?php
	include "template/rodape.php";
?>
