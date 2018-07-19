<?php
	include "template/topo.php";
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}
?>
	<div id = "content">
		<header>
			<h2>Alteração de Dados do Documento</h2>				
		</header>
		<div id = "form">
			<?php
				if($con){
					$sql = "select * from origem WHERE id=".$_GET['seq'];
					$rs = mysqli_query($con, $sql);
					if($rs){
						if($valor = mysqli_fetch_array($rs)){?>
							<form id = "alt_origem" action = "update_origem.php" method = "POST">
								ID: <input type="text" name="seq_origem" size=5 
						             value="<?php echo $valor['id'];?>" class = " id" readonly> <br>
								Nome: <input type = "text" name = "nome_origem" class = "input_n"
									value="<?php echo $valor['nome'];?>">  
								Tipo: <input type = "text" name = "tipo_origem"class = "input_cpf"
									value="<?php echo $valor['tipo'];?>"> <br> 
								<label>Descrição:</label> <textarea name = "desc_origem" cols = 90 rows = 3><?php echo $valor['descricao'];?></textarea> 
								
							
							<div id = "btn">								
								<center><input class="btn_monitora" type="submit" value="Finalizar">
								<a href="consulta_origem.php"><input class="btn_monitora" type="button" value="Voltar"></a>								
						   </div><!--/btn-->
					</form>
							<?php
							}
							else{
								echo "Documento não cadastrado";
							}		
							mysqli_free_result($rs);				
						}
						else{
							echo "Erro de Consulta de documento: ".mysqli_error($con);
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
