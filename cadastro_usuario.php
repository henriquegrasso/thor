<?php
	include "template/topo.php";
	
?>
	<div id = "content_cad_user">
		<header>
			<h2>Cadastro de Usuário</h2>		
			<hr>		
		</header>
			<form id = "cad_cliente" action = "insere_usuario.php" method = "POST">
				<br>
				<h4>Informações de Acesso</h4>
			  <div class="form-row">
				<div class="form-group col-md-4">
					<label>* Usuário:</label>
					<input type = "text" name = "user" class="form-control text" class="form-control text" required>
				</div>

				<div class="form-group col-md-4" > 
					 <label>* Senha:</label>
					 <input type="password" name="senha" size=40 maxlenght=80 class="form-control text" required>
				</div>
			  </div>

				<br>
				<hr/>
				<br>

				<h4>Informações do Usuário</h4>
			  <div class="form-row">
				<div class="form-group col-md-5" >
					<label>* Nome:</label> 
					<input type = "text" name = "nome_usuario" " class="form-control text" required> 
				</div>

				<div class="form-group col-md-5" >
					<label>* E-Mail:</label> 
					<input type = "email" name = "email_usuario" class="form-control text" required> <br>
				</div>
			  </div>

			  <div class="form-row">
				<div class="form-group col-md-5" >
					<label>* Área de Atuação Profissional:</label> 
					<input type = "text" name = "area_usuario" class="form-control text" required>
				</div>

				<div class="form-group col-md-5" >						
					<label>* Telefone contato:</label>
					<input type = "text" name = "tel_usuario" class="form-control text cel-sp-mask" placeholder="(00) 00000-0000" required> 
				</div>						
			  </div>

			<br>
			<div class="form-row">
				<div class="form-group col-md-3 offset-md-3">
					<input class="form-control btn btn-primary" type="reset" value="Limpar">		
				</div>	
				
				<div class="form-group col-md-3">
					<input type="submit" value="Finalizar Cadastro" class="form-control btn btn-primary">
				</div>
			</div>

		</form>
	
	</div><!--/content_index-->






<?php
	include "template/rodape.php";
?>
