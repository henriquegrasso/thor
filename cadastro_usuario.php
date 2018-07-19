<?php
	include "template/topo.php";
	
?>
	<div id = "content_cad_user">
		<header>
			<h2>Cadastro de Usuário</h2>				
		</header>
		<div id = "form">
			<form id = "cad_cliente" action = "insere_usuario.php" method = "POST">
				Tipo: <input type="radio" name="tipo" value="funcionario" > Funcionário 
					  <input type="radio" name="tipo" value="cliente"> Cliente <br><br>
				UserName: <input type = "text" name = "user"class = "input_username" placeholder="Nome para login"> 
				Senha:    <input type="password" name="senha" size=40 maxlenght=80 class = "log_form1"><br><br>
				<hr/><br><br>
				Nome: <input type = "text" name = "nome_usuario" class = "input_n" placeholder="Primeiro e último nome"> 
				CPF: <input type = "text" name = "cpf_usuario"class = "input_cpf"> <br>
				Área Atuação: <input type = "text" name = "area_usuario" class = "input">
				E-Mail: <input type = "text" name = "email_usuario" class = "input"> <br>							
				Telefone fixo: <input type = "text" name = "tel_usuario" class = "input"> 
				Celular: <input type = "text" name = "cel_usuario" class = "input">	
							
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
