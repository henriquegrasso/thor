<?php
	include "template/topo.php";
	
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}
?>	
			<article id = "content">
				<!-- definir cabeçalho do artigo -->
				<header>
					<h2>Monitoramento de Requisitos</h2><br>				
				</header>				
					<div id = "form">
						<form id = "cad_req" action = "mon_combinacao.php" method = "POST">							
							<div id = "resp">								
								Responsável: 
									<select name = "cmbEquipe">
										<?php
										   if($con){
												$sql = "select * from usuario where tipo = 'funcionario'";
												$rs = mysqli_query($con, $sql);
												echo "<option value= -1> Todos </option>";
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
												echo "<option value= -1 > Todos </option>";
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
												echo "<option value= -1> Todos </option>";
												while ($valor = mysqli_fetch_array($rs)){
													echo "<option value= ".$valor['id'].">" .$valor['nome']." </option>";
												}
											}
										?>	
									</select>	<br><br>											
								Categoria do requisito: 
									<select name = "cmbCategoria">
										<option  value= -1 > Todos </option>
										<option value = "Interface">Interface</option>
										<option value = "Desenvolvimento">Desenvolvimento</option>
										<option value = "Teste">Teste</option>
									</select>	
							</div><!--/cat-->
													
								<div id = "tp_req">
									Tipo do Requisito:<br>	
									<input type="radio" name="tipo" checked value= -1 >Todos<br>				
									<input type="radio" name="tipo" value="funcional" >Funcional<br>
									<input type="radio" name="tipo" value="naofuncional">Não Funcional	<br>	
									<input type="radio" name="tipo" value="dominio">Domínio			
								</div><!--/tp_req-->									
								<div id = "status">
									Estado:<br>	
									<input type="radio" name="status" checked value= -1 >Todos<br>				
									<input type="radio" name ="status" value="incompleto"> Incompleto <br>
									<input type="radio" name ="status" value="completo"> Completo<br>
									<input type="radio" name ="status" value="revisao"> Revisão				
								</div><!--/status-->
								<div id = "prior">
									Prioridade:<br>	
									<input type="radio" name="pri" checked value= -1  >Todos<br>				
									<input type="radio" name ="pri" value="essencial"> Essencial<br>
									<input type="radio"  name ="pri" value="importante"> Importante<br>
									<input type="radio"  name ="pri" value="desejavel"> Desejável<br> 						
								</div><!--/prior-->									
							<div id = "btn">								
								<center><input class="btn_monitora" type="submit" value="Finalizar">
								<input class="btn_monitora" type="reset" value="Limpar">								
						   </div><!--/btn-->
					 	</form>									
					</div><!--/form-->				
			</article><!--/content-->				
<?php
	include "template/rodape.php";
?>
