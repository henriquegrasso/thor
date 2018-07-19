<?php
	include "template/topo.php";
	
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}
?>
	<div id = "content">
		<header>
			<h2>Alteração de Dados do Usuário</h2>				
		</header>
		<div id = "form">
			<?php
				if($con){
					$sql = "select * from usuario WHERE id=".$_GET['seq'];
					$rs = mysqli_query($con, $sql);
					if($rs){
						if($valor = mysqli_fetch_array($rs)){?>
							<form id = "alt_cliente" action = "update_usuario.php" method = "POST">
								ID: <input type="text" name="seq_user" size=5 
						             value="<?php echo $valor['id'];?>" class = " id" readonly> <br>
								Nome: <input type = "text" name = "nome_user" class = "input_n"
									value="<?php echo $valor['nome'];?>"> 
								CPF: <input type = "text" name = "cpf_user"class = "input_cpf"
									value="<?php echo $valor['cpf'];?>"> <br> 
								Área Atuação: <input type = "text" name = "area_user" class = "input"
									value="<?php echo $valor['area'];?>"> 
								E-Mail: <input type = "text" name = "email_user" class = "input"
									value="<?php echo $valor['email'];?>"> <br> 
								Telefone fixo: <input type = "text" name = "tel_user" class = "input"
									value="<?php echo $valor['telefone_fixo'];?>"> 
								Celular: <input type = "text" name = "cel_user" class = "input"
									value="<?php echo $valor['telefone_cel'];?>"> 	
								Tipo: <input type = "text" name = "tipo_user" class = "input"
									value="<?php echo $valor['tipo'];?>"> 	
								
								<div id = "btn">								
								<center><input class="btn_monitora1" type="submit" value="Finalizar">
								<a href="consulta_usuario.php"><input class="btn_monitora1" type="button" value="Voltar"></a>								
						   </div><!--/btn-->					
							
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
		
   </div><!--/form-->
</div><!--/content-->

<?php
	include "template/rodape.php";
?>
