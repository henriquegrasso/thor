<?php
	include "template/topo.php";
	
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}
?>
	<div id = "content_index">
		<header>
			<h2>Cadastro de Origem</h2>				
		</header>
		<div id = "form">
			<form id = "cad_origem" action = "insere_origem.php" method = "POST">
				Nome: <input type = "text" name = "nome_origem" class = "input_n"> 
				Tipo: <input type = "text" name = "tipo_origem"class = "input_cpf"> <br>
				<label>Descrição:</label><textarea name = "desc_origem" cols = 90 rows = 3 placeholder="Escreva a descrição do documento aqui"></textarea>							
			
			
			<div id = "btn">
				<center><input class="btn_monitora" type="submit" value="Finalizar Cadastro">
				<input class="btn_monitora" type="reset" value="Limpar">				
			</div><!--/btn-->
		</form>
		</div><!--/form-->
	
	</div><!--/content_index-->
<?php
	include "template/rodape.php";
?>
