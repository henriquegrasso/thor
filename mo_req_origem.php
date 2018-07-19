<?php
	include "template/topo.php";
	
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}
?>	
			<article id = "content_index">
				<!-- definir cabeçalho do artigo -->
					<h2> Consultar Requisitos por Origem</h2>				
								
					<div id = "form">
						<form id = "rel_origem" action = "rel_origem.php" method = "POST">							
							<div id = "resp">																		
								Selecione o documento desejado: 
									<select name = "cmbOrigem">
										<?php
										   if($con){
												$sql = "select * from origem";
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

