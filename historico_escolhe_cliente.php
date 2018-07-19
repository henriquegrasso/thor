<?php
	include "template/topo.php";
	
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}
?>	
			<article id = "content_index">
				<!-- definir cabeçalho do artigo -->
					<h2> Consultar Histórico dos Requisitos por Cliente</h2>				
								
					<div id = "form">
						<form id = "rel_cliente" action = "historico_log_cliente.php" method = "POST">							
							<div id = "resp">																		
								Selecione o Cliente desejado: 
									<select name = "cmbCliente">
										<?php
										   if($con){
												$sql = "select * from usuario where tipo = 'cliente'";
												$rs = mysqli_query($con, $sql);
												while ($valor = mysqli_fetch_array($rs)){
													echo "<option value= ".$valor['id'].">" .$valor['nome']." </option>";
												}												
											}
										?>	
										
									</select>
							</div><!--/resp-->
															
							<div id = "btn">								
								<center><input class="btn_monitora" type="submit" value="Enviar"></center>															
						   </div><!--/btn-->
					 	</form>									
					</div><!--/form-->				
			</article><!--/content-->						
<?php
	include "template/rodape.php";
?>

