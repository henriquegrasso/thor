<?php
	include "template/topo.php";
	
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}
?>	
			<article id = "content_cad">
				<!-- definir cabeçalho do artigo -->
					<h2> Cadastro de Requisitos</h2>				
								
					<div id = "form">
						<form id = "cad_req" action = "insere_req.php" method = "POST">
								Título do Requisito: <input type = "text" name = "nome_req" class = "input_n" placeholder="Escreva um título para o requisito"> <br>
													
								<label>Requisito:</label><textarea name = "tx_req" cols = 80 rows = 3 placeholder="Escreva seu requisito"></textarea><br>
							
								<label>Descrição:</label><textarea name = "tx_desc" cols = 79 rows = 3 placeholder="Opcional - Descrição do requisito"></textarea>					
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
												while ($valor = mysqli_fetch_array($rs)){
													echo "<option value= ".$valor['id'].">" .$valor['nome']." </option>";
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
												while ($valor = mysqli_fetch_array($rs)){
													echo "<option value= ".$valor['id'].">" .$valor['nome']." </option>";
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
												while ($valor = mysqli_fetch_array($rs)){
													echo "<option value= ".$valor['id'].">" .$valor['nome']." </option>";
												}
											}
										?>	
									</select>	<br><br>											
								Categoria do requisito: 
									<select name = "cmbCategoria">
										<option>Interface</option>
										<option>Desenvolvimento</option>
										<option>Teste</option>
									</select>	
							</div><!--/cat-->
													
								<div id = "tp_req">
									Tipo do Requisito:<br>					
									<input type="radio" name="tipo" value="funcional" >Funcional<br>
									<input type="radio" name="tipo" value="nfuncional">Não Funcional	<br>	
									<input type="radio" name="tipo" value="dominio">Domínio			
								</div><!--/tp_req-->									
								<div id = "status">
									Estado:<br>					
									<input type="radio" name ="status" value="incompleto"> Incompleto <br>
									<input type="radio" name ="status" value="completo"> Completo<br>
									<input type="radio" name ="status" value="revisao"> Revisão				
								</div><!--/status-->
								<div id = "prior">
									Prioridade:<br>					
									<input type="radio" name ="pri" value="essencial"> Essencial<br>
									<input type="radio"  name ="pri" value="importante"> Importante<br>
									<input type="radio"  name ="pri" value="desejavel"> Desejável<br> 						
								</div><!--/prior-->									
							<div id = "btn">								
								<center><input class="btn_monitora" type="submit" value="Finalizar Cadastro">
								<input class="btn_monitora" type="reset" value="Limpar">								
						   </div><!--/btn-->
					 	</form>									
					</div><!--/form-->				
			</article><!--/content-->
			
			<div id = "sidebar">							
				 								
			</div><!--/sidebar-->			
<?php
	include "template/rodape.php";
?>

