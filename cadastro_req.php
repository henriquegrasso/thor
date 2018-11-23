<?php
	include "template/topo.php";
	
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}

	$conteudo	= '';
	$ator = '';
	$secao = '';
	$motivo = '';
	$acao = '';

	if(isset($_POST['gerar'])){
		$ator = $_POST['select_Ator'];
		$acao = $_POST['text_Acao'];
		$secao = $_POST['select_Secao'];
		$motivo = $_POST['text_Motivo'];
		$conteudo = 'Eu como um usuário ' . $ator . ' , eu quero ' . $acao . ' na seção de ' . $secao . ' a fim de ' . $motivo;
		$_SESSION['conteudo'] = $conteudo;	

	}

?>
		<article id = "content_cad">

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
								<select id="select_Ator" name="select_Ator" class="form-control select" required>

									<option value="">Selecione...</option>									
									<?php if($con): ?>
										<?php
											$sql = "select * from ator";
											$rs = mysqli_query($con, $sql);
										?>
										<?php while($linhaAtor = mysqli_fetch_array($rs)): ?>
											<option <?php if($linhaAtor['nome'] == $ator) { echo ' selected="selected"';} ?>><?php echo $linhaAtor['nome']; ?></option>
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
								<input type="text" id="text_Acao" name="text_Acao" class = "form-control text" <?php echo "value='".$acao."'"; ?> required>	</input>
							</div>
						</div>

						<div class="form-row">
							<div class="col-md-2">
								<label>na seção de </label>
							</div>
							<div class="form-group col-md-3">
								<label labelfor="select_Secao">(selecione a seção do site)</label>
								<select id="select_secao" name="select_Secao" class="form-control select" required>
									<option value="">Selecione...</option>
									<?php if($con): ?>
										<?php
											$sql = "select * from secao";
											$rs = mysqli_query($con, $sql);
										?>
										<?php while($linhaSecao = mysqli_fetch_array($rs)): ?>
											<option <?php if($linhaSecao['nome'] == $secao) { echo ' selected="selected"';} ?>><?php echo $linhaSecao['nome']; ?></option>
										<?php endwhile; ?>

									<?php endif; ?>

								</select>	
							</div>
							<div class="col-md-1">
								<label> a fim de   </label>
							</div>
							<div class="form-group col-md-5">
								<label labelfor="text_Motivo">(descreva o motivo)</label>
								<input type="text" id="text_Motivo" name="text_Motivo" class="form-control text" required <?php echo "value='".$motivo."'"; ?>></input>
							</div>
						</div>

							<div class="form-group col-md-4 offset-md-4">
								<input type="submit" name="gerar" class="form-control btn btn-primary" value="Gerar Requisito">							
							</div>
						</form>

					</div>
					
					<?php if($conteudo !== '') { 
						echo '
						<hr>
						<h4>Requisito:</h4>';
					} ?>

					<div id="requisitoGerado" class="col-12 text-center"><strong><?php echo  $conteudo;?></strong></div>
											
					<hr>

					<h4> Detalhes Técnicos </h4>
					<br>
					<form id="form_SalvarReq" name="form_SalvarReq" method="post" action="consultar_requisito.php">

						<div class="form-row">
						<div class="form-group col-md-4">	
							<label name="lb_Relator">Relator</label>
							<input type="text" name="text_Relator" class="form-control text" required>
						</div>
						
						<div class="form-group col-md-4">
							<label name="lb_Responsavel">Responsável</label>
							<input type="text" name="text_Responsavel" class="form-control text" required>
						</div>

						<div class="form-group col-md-4">
							<label name="lb_Sprint">Sprint</label>
							<input type="text" name="text_Sprint" class="form-control text" required>
						</div>

						<div class="form-group col-md-2">
							<label name="lb_Tipo">Tipo</label>
							<select name="select_Tipo" id="select_Tipo" class="form-control select" required>
								<option value="">Selecione...</option>
								<option>Funcional</option>
								<option>Não-Funcional</option>
								<option>Interface</option>
							</select>	
						</div>
						
						<div class="form-group col-md-2">
							<label name="lb_Complexidade">Complexidade</label>
							<select name="select_Complexidade" id="select_Complexidade" class="form-control select" required>
								<option value="">Selecione...</option>
								<option>Baixa</option>
								<option>Média</option>
								<option>Alta</option>
							</select>
						</div>
						
						<div class="form-group col-md-4">		
							<label name="lb_Status">Status</label>
							<select name="select_Status" id="select_Status" class="form-control select" required>
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
							<select name="select_Prioridade" id="select_Prioridade" class="form-control select" required>
								<option value="">Selecione...</option>
								<option>Alta</option>
								<option>Média</option>
								<option>Baixa</option>
							</select>
						</div>

						<div class="form-group col-md-3 offset-md-3">
								<input class="form-control btn btn-primary" type="reset" value="Limpar" required>	
						</div>	

						<div class="form-group col-md-3">
								<input class="form-control  btn btn-primary" type="submit" name="bt_FinalizarCadastro" value="Finalizar Cadastro" required>
						</div>
					</form>
					<hr>

			</article><!--/content-->
			
			<div id = "sidebar">							
				 								
			</div><!--/sidebar-->			
<?php
	include "template/rodape.php";
?>

