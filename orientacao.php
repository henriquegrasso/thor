
<?php	
	include "template/topo.php";	
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}
?>
				
			<article id = "content_index">
				<h2>Orientações Gerais</h2>				
				
			  <article>				
				<br><p class = "texto">Nesta página você encontra orientações sobre diversos assuntos relacionados a escrita adequada de requisitos.</p>
				<br><p class = "texto">Artigos:</p><br>
							
				<ul class = "ul_content">
					<li><a href = 'artigo_req.php' class = "cor_link" target="_blank">Qual a diferença entre Requisitos e Restrições?</a></li>
					<li><a href = '#' class = "cor_link" target="_blank">Características desejáveis a uma declaração de requisitos</a></li>
					<li><a href = 'http://www.macoratti.net/07/12/net_fer.htm' class = "cor_link" target="_blank">Formato adequado para especificação formal de requisitos</a></li>									
				</ul>	
						
			  </article>		 
			</article><!--/content-->		
			
<?php
	include "template/rodape.php";
?>
		
