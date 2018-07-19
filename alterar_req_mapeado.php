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
			
						<form id = "alt_req" action = "update_req_mapeado.php" method = "POST">
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
										$sql = "select * from requisito where id !=".$_GET['seq']. " order by id";
										$rs = mysqli_query($sql, $con);
										if($rs){?>
											<h2> Altere a(s) dependência(s) do requisito </h2><center>
											<table  align = "center">
												<tr align = "center">
													<th>X</th>
													<th>ID</th>
													<th>Título</th>
													<th class = "nm">Requisito</th>																
												</tr>
											<?php
													$sql_dep = "select * from requisito_has_requisito where requisito_id =".$_GET['seq']." order by depende_de";
																									                                             
													$rs_dep_r = mysqli_query($sql_dep, $con);
													if($dep_checked =  mysqli_fetch_array($rs_dep_r)){}
													
												while ($valor = mysqli_fetch_array($rs)){ // nome entre[] igual ao do BD
													echo "<tr align = 'center'> ".													  
														
															"<td> <input type = 'checkbox' name = 'check[]' value = '".$valor["id"]."' ";
															if($valor["id"] == $dep_checked["depende_de"]){
																echo 'checked';
																if($dep_checked = mysqli_fetch_array($rs_dep_r)){} // pegar o proximo registro no depende_de
															}
															echo "> </td>".
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
											echo "Erro de Consulta de requisito: ".mysqli_error();
										}
										}
										else{
										echo "Erro de conexão: ".mysqli_error();
										}
										?>											
								</div><!--/prior--> 
								<div id = "btn"> 
									<center><input class="btn_monitora" type= "submit" value= "Alterar"> 
										<a href="consulta_req_mapeado.php"><input class="btn_monitora" type="button" value="Voltar"></a>
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

