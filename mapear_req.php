<?php
	include "template/topo.php";
	
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}
?>	
<article id = "content_alt">
	<!-- definir cabeçalho do artigo -->
	<header>
		<h2>Mapear Requisito</h2>				
	</header>				
		<div id = "form">
		<?php
			if($con){
				$sql = "select * from requisito WHERE id=".$_GET['seq'];
				$rs = mysqli_query($sql, $con);
				if($rs){
					if($req = mysqli_fetch_array($rs)){?>
			
						<form id = "alt_req" action = "insere_req_map.php" method = "POST">
								ID: <input type="text" name="seq_req" size=5 
									value="<?php echo $req['id'];?>" class = " id" readonly> <br>
								
								Título do Requisito: <input type = "text" name = "nome_req" class = "input_n"
									value="<?php echo $req['titulo_req'];?>" readonly> <br>	
									
								<label>Requisito:</label><textarea name = "tx_req" cols = 80 rows = 3 readonly ><?php echo $req['texto_req'];?></textarea><br>
														
						<hr/>
						<br>
							
							<div id = "req">													
									<?php		
										if($con){
										$sql = "select * from requisito where id !=".$_GET['seq'];
										$rs = mysqli_query($con, $sql);
										if($rs){?>
											<h2> Selecione a(s) dependência(s) do requisito </h2><center>
											<table  align = "center">
												<tr align = "center">
													<th>X</th>
													<th>ID</th>
													<th>Título</th>
													<th class = "nm">Requisito</th>																
												</tr>
											<?php
												while ($valor = mysqli_fetch_array($rs)){ // nome entre[] igual ao do BD
													echo "<tr align = 'center'> 														
															<td> <input type = 'checkbox' name = 'check[]' value = '".$valor["id"]."'> </td>".
														"
															<td> ".$valor["id"]."</td>  
															<td> ".$valor["titulo_req"]."</td>
															<td class = 'nm'> ".$valor["texto_req"]."</td>														
														</tr>";					
												}
												mysqli_free_result($rs);
												echo "</table></center>";
										}
										else{
											echo "Erro de Consulta de requisito: ".mysqli_error($con);
										}
										}
										else{
										echo "Erro de conexão: ".mysqli_error($con);
										}
										?>											
								</div><!--/prior--> 
								<div id = "btn"> 
									<center><input class="btn_monitora" type= "submit" value= "Finalizar"> <a href= "consulta_req.php">
										<input class="btn_monitora" type="button" value= "Voltar"></a> 
								</div><!--/btn--> 
								</form> 
								</div><!--/form--> 
								</article><!--/content-->
	<?php
					}
				}
			}
	include "template/rodape.php";
	?>

