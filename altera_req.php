<?php
	include "template/topo.php";
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}
?>	
			<article id = "content_alt">
				<!-- definir cabeçalho do artigo -->
				<header>
					<h2>Alteração de Requisitos</h2>				
				</header>				
					<div id = "form">
					<?php
						if($con){
							$sql = "select * from requisito WHERE id=".$_GET['seq'];
							$rs = mysqli_query($con, $sql);
							if($rs){
								if($req = mysqli_fetch_array($rs)){?>
						
									<form id = "alt_req" action = "update_req.php" method = "POST">
											ID: <input type="text" name="seq_req" size=5 
												value="<?php echo $req['id'];?>" class = " id" readonly> <br>
											
											Título do Requisito: <input type = "text" name = "nome_req" class = "input_n"
												value="<?php echo $req['titulo_req'];?>"> <br>	
												
											<label>Requisito:</label><textarea name = "tx_req" cols = 80 rows = 3 ><?php echo $req['texto_req'];?></textarea><br>
										
											<label>Descrição:</label><textarea name = "tx_desc" cols = 79 rows = 3 ><?php echo $req['descricao'];?></textarea>					
									<br>
									<hr/>
									<br>
										<h2> Detalhes Técnicos </h2>
										<br>
										<div id = "resp">									
											Responsável: 
												<select name = "cmbEquipe">
													<?php
													   if($con){
															$sql = "select * from usuario where tipo = 'funcionario'";
															$rs = mysqli_query($con, $sql);
															while ($cmb = mysqli_fetch_array($rs)){
																if($req['usuario_id_funcionario'] == $cmb['id']){
																	echo "<option value= ".$cmb['id']." selected >" .$cmb['nome']." </option>";
																}else{																	
																	echo "<option value= ".$cmb['id'].">" .$cmb['nome']." </option>";
																	
																}
															}
														}
													?>		
																															
												</select> <br>	<br>										
											Cliente responsável: 
												<select name = "cmbCliente">
													<?php
													   if($con){
															$sql = "select * from usuario where tipo = 'cliente'";
															$rs = mysqli_query($con, $sql);
															while ($cmb = mysqli_fetch_array($rs)){
																if($req['usuario_id_cliente'] == $cmb['id']){
																	echo "<option value= ".$cmb['id']." selected >" .$cmb['nome']." </option>";
																}else{																	
																	echo "<option value= ".$cmb['id'].">" .$cmb['nome']." </option>";
																	
																}
															}
														}
													?>	
												</select>
										</div><!--/resp-->
										<div id = "cat">			
												Origem:
												<select name = "cmbOrigem">
													<?php
													   if($con){
															$sql = "select * from origem";
															$rs = mysqli_query($con, $sql);
															while ($cmb = mysqli_fetch_array($rs)){
																if($req['origem_id'] == $cmb['id']){
																	echo "<option value= ".$cmb['id']." selected >" .$cmb['nome']." </option>";
																}else{																	
																	echo "<option value= ".$cmb['id'].">" .$cmb['nome']." </option>";
																	
																}
															}
														}
													?>		
												</select>	<br><br>											
											Categoria do requisito: 
												<select name = "cmbCategoria">
													<option <?php echo ($req['categoria']== "Interface"?"selected":"");?>> Interface</option>
													<option <?php echo ($req['categoria']== "Desenvolvimento"?"selected":"");?>>Desenvolvimento</option>
													<option <?php echo ($req['categoria']== "Teste"?"selected":"");?>>Teste</option>
												</select>	
										</div><!--/cat-->
																
											<div id = "tp_req">
												Tipo do Requisito:<br>				
												<input type="radio" name="tipo" value="funcional" <?php echo ($req['tipo']== "funcional"?"checked":"");?>>Funcional<br>
												<input type="radio" name="tipo" value="nfuncional" <?php echo ($req['tipo']== "nfuncional"? "checked":"");?> >Não Funcional<br>	
												<input type="radio" name="tipo" value="dominio" <?php echo ($req['tipo']== "dominio"? "checked":"");?>>Domínio			
											</div><!--/tp_req-->									
											<div id = "status">
												Estado:<br>					
												<input type="radio" name ="status" value="incompleto" <?php echo ($req['estado']== "incompleto"?"checked":"");?>> Incompleto <br>
												<input type="radio" name ="status" value="completo" <?php echo ($req['estado']== "completo"?"checked":"");?>> Completo<br>
												<input type="radio" name ="status" value="revisao" <?php echo ($req['estado']== "revisao"?"checked":"");?>> Revisão					
											</div><!--/status-->
											<div id = "prior">
												Prioridade:<br>					
												<input type="radio" name ="pri" value="essencial" <?php echo ($req['prioridade']== "essencial"?"checked":"");?>> Essencial<br>
												<input type="radio"  name ="pri" value="importante" <?php echo ($req['prioridade']== "importante"?"checked":"");?>> Importante<br>
												<input type="radio"  name ="pri" value="desejavel" <?php echo ($req['prioridade']== "desejavel"?"checked":"");?>> Desejável<br> 						
											</div><!--/prior-->									
										<div id = "btn">								
											<center><input class="btn_monitora" type="submit" value="Finalizar">
											<a href="consulta_req.php"><input class="btn_monitora" type="button" value="Voltar"></a>								
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

