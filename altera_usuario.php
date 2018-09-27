<?php
	include "template/topo.php";
	
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}
?>
	<div id = "content">
		<header>
			<h2>Alteração de Dados do Usuário</h2>	
			<hr>			
		</header>
			<?php
				if($con){
					$sql = "select * from usuario WHERE id=".$_GET['seq'];
					$rs = mysqli_query($con, $sql);
					if($rs){
						if($valor = mysqli_fetch_array($rs)){?>
							<form id = "alt_cliente" action = "update_usuario.php" method = "POST">
							<br>
			
							<h4>Informações do Usuário</h4>
							<br>
						  <div class="form-row">
							
							<div class="form-group col-md-1">
								<label>ID:</label>
								<input type = "text" name = "iduser" class="form-control text" placeholder="Nome para login" class="form-control text" <?php echo 'value="'.$valor['id'].'"' ?> readonly required>
							</div>


							<div class="form-group col-md-5" >
								<label>Nome:</label> 
								<input type = "text" name = "nome" class="form-control text" <?php echo 'value="'.$valor['nome'].'"' ?> required> 
							</div>

							<div class="form-group col-md-5" >
								<label>E-Mail:</label> 
								<input type = "email" name = "email" class="form-control text" <?php echo 'value="'.$valor['email'].'"' ?> required> <br>
							</div>
						  </div>

						  <div class="form-row">
							<div class="form-group col-md-5" >
								<label>Área Atuação:</label> 
								<input type = "text" name = "area" class="form-control text" <?php echo 'value="'.$valor['area'].'"' ?> required>
							</div>

							<div class="form-group col-md-5" >						
								<label>Telefone contato:</label>
								<input type = "text" name = "telefone" class="form-control text" <?php echo 'value="'.$valor['telefone'].'"' ?>  required> 
							</div>						
						  </div>

						<br>
						<div class="form-row">
							<div class="form-group col-md-3 offset-md-3">
								<a href="consulta_usuario.php"><input class="form-control btn btn-primary" type="reset" value="Voltar"></a>
							</div>	
							
							<div class="form-group col-md-3">
								<input type="submit" value="Atualizar Cadastro" class="form-control btn btn-primary">
							</div>
						</div>				
							
					</form>
							<?php
							}
							else{
								echo "Usuário não cadastrado";
							}		
							mysqli_free_result($rs);				
						}
						else{
							echo "Erro de Consulta de clientes: ".mysqli_error($con);
						}
					}
					else{
						echo "Erro de conexão: ".mysqli_error($con);
					}
				?>			
		</div><!--/content-->

<?php
	include "template/rodape.php";
?>
