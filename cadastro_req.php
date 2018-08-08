<?php
	include "template/topo.php";
	
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}

	$conteudo	= '';
	if(isset($_POST['select_Ator'])){
		$ator = $_POST['select_Ator'];
		$acao = $_POST['text_Acao'];
		$secao = $_POST['select_Secao'];
		$motivo = $_POST['text_Motivo'];
		$conteudo = 'Eu como um usuário ' . $ator . ' , eu quero ' . $acao . ' na seção de ' . $secao . ' a fim de ' . $motivo;
		$_SESSION['conteudo'] = $conteudo;	

	}

	if(isset($_POST['text_Relator'])) {
		$relator = $_POST['text_Relator'];
		$responsavel = $_POST['text_Responsavel'];
		$sprint = $_POST['text_Sprint'];
		$tipo = $_POST['select_Tipo'];
		$complexidade = $_POST['select_Complexidade'];
		$status = $_POST['select_Status'];
		$prioridade = $_POST['select_Prioridade'];
		$conteudo = $_SESSION['conteudo'];
	    

	    //var_dump($_POST);
	    $sql = "insert into requisitos(relator, responsavel, sprint, complexidade, status, prioridade, tipo, conteudo) values('$relator', '$responsavel', '$sprint', '$complexidade', '$status', '$prioridade', '$tipo', '$conteudo')";
	    $rs = mysqli_query($con, $sql);
		if($rs){
			echo "<center><h3>Requisito cadastrada com sucesso!!</h3></center>";
		}
		else{
			echo "<center><h3>Erro de inclusão: </h3></center> ".mysqli_error($con);
		}
		unset($_SESSION['conteudo']);
	}

?>	
			<article id = "content_cad">
				<!-- definir cabeçalho do artigo -->
					<h2> Cadastro de Requisitos</h2>				
								

					<hr>

					<div id="formulario">
						<form id="cad_requisito" method="post" action="cadastro_req.php" >
						<div>	
							<label>Eu como um usuário </label>
							<div> 
								<label>(Selecione o ator)</label>
								<br>
								<select id="select_Ator" name="select_Ator">

									<option>Selecione...</option>									
									<?php if($con): ?>
										<?php
											$sql = "select * from ator";
											$rs = mysqli_query($con, $sql);
										?>
										<?php while($linhaAtor = mysqli_fetch_array($rs)): ?>
											<option><?php echo $linhaAtor['nome']; ?></option>
										<?php endwhile; ?>
									<?php endif; ?>

								</select>
							</div>
							<label>, eu quero </label>
							<div>
								<label>(escreva a ação)</label>
								<br>
								<input type="text" id="text_Acao" name="text_Acao" class = "input_n">	</input>
							</div>
						</div>

						<div>
							<label>na seção de </label>
							<div>
								<label>(selecione a seção do site)</label>
								<select id="select_secao" name="select_Secao">
									<option>Selecione...</option>
									<?php if($con): ?>
										<?php
											$sql = "select * from secao";
											$rs = mysqli_query($con, $sql);
										?>
										<?php while($linhaSecao = mysqli_fetch_array($rs)): ?>
											<option><?php echo $linhaSecao['nome']; ?></option>
										<?php endwhile; ?>

									<?php endif; ?>

								</select>	
							</div>
							<label> a fim de </label>
							<div>
								<label>(descreva o motivo)</label>
								<input type="text" id="text_Motivo" name="text_Motivo" class = "input_n">	</input>
							</div>
						</div>

						<input type="submit" name="submeter" value="Gerar Requisito">
						</form>

					</div>

					<hr>
					<hr>
					<hr>
					
					<div id="requisitoGerado"><?php echo  $conteudo;?></div>
					<button id="bt_Copiar" name="bt_Copiar" onClick="copiarTexto()">Copiar Texto</button>
					
					<script type="text/javascript">
					  function copiarTexto() {
					    var textoCopiado = document.getElementById("requisitoGerado");
					    textoCopiado.select();
					    document.execCommand("Copy");
					    alert("Texto Copiado: " + textoCopiado.value);
					  }
					</script>

				
					<hr>
					<hr>
					
					<h2> Detalhes Técnicos </h2>

					<form id="form_SalvarReq" name="form_SalvarReq" method="post">

						<label name="lb_Relator">Relator</label>
						<input type="text" name="text_Relator">

						<label name="lb_Responsavel">Responsável</label>
						<input type="text" name="text_Responsavel">

						<label name="lb_Sprint">Sprint</label>
						<input type="text" name="text_Sprint">

						<label name="lb_Tipo">Tipo</label>
						<select name="select_Tipo" id="select_Tipo">
							<option>Selecione...</option>
							<option>Funcional</option>
							<option>Não-Funcional</option>
							<option>Interface</option>
						</select>

						<br>
						
						<label name="lb_Complexidade">Complexidade</label>
						<select name="select_Complexidade" id="select_Complexidade">
							<option>Selecione...</option>
							<option>Baixa</option>
							<option>Média</option>
							<option>Alta</option>
						</select>

						<label name="lb_Status">Status</label>
						<select name="select_Status" id="select_Status">
							<option>Selecione...</option>
							<option>Em Aberto</option>
							<option>Em Progresso</option>
							<option>Sob Aprovação</option>
							<option>Finalizado</option>
							<option>Cancelado</option>
						</select>

						<label name="lb_Prioridade">Prioridade</label>
						<select name="select_Prioridade" id="select_Prioridade">
							<option>Selecione...</option>
							<option>Alta</option>
							<option>Média</option>
							<option>Baixa</option>
						</select>


						<input type="submit" name="bt_Salvar" value="Salvar">
					</form>
					<hr>







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

