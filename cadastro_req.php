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
		// $epico = $_POST['select_Epico'];
		$sprint = $_POST['text_Sprint'];
		$tipo = $_POST['select_Tipo'];
		$complexidade = $_POST['select_Complexidade'];
		$status = $_POST['select_Status'];
		$prioridade = $_POST['select_Prioridade'];
		$conteudo = $_SESSION['conteudo'];
	    

	    //var_dump($_POST);
	    $sql = "insert into requisitos(relator, responsavel, sprint, complexidade, status, prioridade, tipo, conteudo, idepico) values('$relator', '$responsavel', '$sprint', '$complexidade', '$status', '$prioridade', '$tipo', '$conteudo', $epico)";
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
						<div class="form-row">
						<div class="col-md-2">	
							<label>Eu como um usuário </label>
						</div>
							<div class="form-group col-md-3"> 
								<label labelfor="select_Ator">(Selecione o ator)</label>
								<br>
								<select id="select_Ator" name="select_Ator" class="form-control">

									<option value="">Selecione...</option>									
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
							<div class="col-md-1.5">
								<label>, eu quero</label>
							</div>
							<div class="form-group col-md-5">
								<label labelfor="text_Acao">(escreva a ação)</label>
								<br>
								<input type="text" id="text_Acao" name="text_Acao" class = "form-control">	</input>
							</div>
						</div>

						<div class="form-row">
							<div class="col-md-2">
								<label>na seção de </label>
							</div>
							<div class="form-group col-md-3">
								<label labelfor="select_Secao">(selecione a seção do site)</label>
								<select id="select_secao" name="select_Secao" class="form-control">
									<option value="">Selecione...</option>
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
							<div class="col-md-1">
								<label> a fim de   </label>
							</div>
							<div class="form-group col-md-5">
								<label labelfor="text_Motivo">(descreva o motivo)</label>
								<input type="text" id="text_Motivo" name="text_Motivo" class = "form-control">	</input>
							</div>
						</div>

						<input type="submit" name="submeter" class="form-control col-md-4" value="Gerar Requisito">
						</form>

					</div>

					<hr>
					<hr>
					<hr>
					
					<div id="requisitoGerado"><?php echo  $conteudo;?></div>
					<button id="bt_Copiar" name="bt_Copiar" class="form-control" onClick="copiarTexto()">Copiar Texto</button>
					
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

						<div class="form-row">
							<div class="form-group col-md-4">	
							<label name="lb_Relator">Relator</label>
							<input type="text" name="text_Relator" class="form-control">
						</div>
						
						<div class="form-group col-md-4">
							<label name="lb_Responsavel">Responsável</label>
							<input type="text" name="text_Responsavel" class="form-control">
						</div>

						<div class="form-group col-md-4">
							<label name="lb_Sprint">Sprint</label>
							<input type="text" name="text_Sprint" class="form-control">
						</div>

						<div class="form-group col-md-2">
							<label name="lb_Tipo">Tipo</label>
							<select name="select_Tipo" id="select_Tipo" class="form-control">
								<option value="">Selecione...</option>
								<option>Funcional</option>
								<option>Não-Funcional</option>
								<option>Interface</option>
							</select>	
						</div>
						
						<div class="form-group col-md-2">
							<label name="lb_Complexidade">Complexidade</label>
							<select name="select_Complexidade" id="select_Complexidade" class="form-control">
								<option value="">Selecione...</option>
								<option>Baixa</option>
								<option>Média</option>
								<option>Alta</option>
							</select>
						</div>
						
						<div class="form-group col-md-4">		
							<label name="lb_Status">Status</label>
							<select name="select_Status" id="select_Status" class="form-control">
								<option value="">Selecione...</option>
								<option>Em Aberto</option>
								<option>Em Progresso</option>
								<option>Sob Aprovação</option>
								<option>Finalizado</option>
								<option>Cancelado</option>
							</select>
						</div>

						<div class="form-group col-md-2">
							<label name="lb_Prioridade">Prioridade</label>
							<select name="select_Prioridade" id="select_Prioridade" class="form-control">
								<option value="">Selecione...</option>
								<option>Alta</option>
								<option>Média</option>
								<option>Baixa</option>
							</select>
						</div>

						<div class="form-group col-md-3">
								<input class="form-control" type="submit" name="bt_Salvar" value="Finalizar Cadastro" >
						</div>

						<div class="form-group col-md-3">
								<input class="form-control" type="reset" value="Limpar">	
						</div>	
					</form>
					<hr>

			</article><!--/content-->
			
			<div id = "sidebar">							
				 								
			</div><!--/sidebar-->			
<?php
	include "template/rodape.php";
?>

