<?php
	include "template/topo.php";
	
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}
	$conteudo	= '';
	$ator = '';
	$acao = '';
	$motivo = '';
	if(isset($_POST['bt_Gerar'])){
		$ator = $_POST['select_Ator'];
		$acao = $_POST['text_Acao'];
		$motivo = $_POST['text_Motivo'];
		$conteudo = 'Eu como um usuário ' . $ator . ' , eu quero ' . $acao . ' a fim de ' . $motivo;
		$_SESSION['conteudo'] = $conteudo;	

	}
?>
	<article id = "content_cad">
<?php

	if(isset($_POST['bt_Salvar'])) {
		$idrequisitos = $_POST['select_Requisito'];
		$tipo = $_POST['select_Tipo'];
		$status = $_POST['select_Status'];
		$prioridade = $_POST['select_Prioridade'];
		$conteudo = $_SESSION['conteudo'];
	    

	    //var_dump($_POST);
	    $sql = "insert into story(conteudo, tipo, prioridade, status, idrequisitos) values('$conteudo', '$tipo', '$prioridade', '$status', '$idrequisitos')";
	    $rs = mysqli_query($con, $sql);
		if($rs){
			echo "
			<div class='alert alert-success'>
  				<center><strong>Story cadastrada com sucesso!</strong></center>
			</div>	
			";
		}
		else{
			echo "
			<div class='alert alert-danger'>
  				<center><strong>Erro de inclusão:</strong></center>
			</div>
			 ".mysqli_error($con);
		}
		unset($_SESSION['conteudo']);
	}

?>	

					<h2> Cadastro de Story</h2>											

					<hr>

					<div id="formulario">
						<form id="cad_story" method="post" action="cadastro_story.php" >

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
							<div class="col-md-1">
								<label> a fim de   </label>
							</div>
							<div class="form-group col-md-5">
								<label labelfor="text_Motivo">(descreva o motivo)</label>
								<input type="text" id="text_Motivo" name="text_Motivo" class = "form-control text" <?php echo "value='".$motivo."'"; ?> required>	</input>
							</div>
						</div>

							<div class="form-group col-md-4 offset-md-4">
								<input type="submit" name="bt_Gerar" class="form-control btn btn-primary" value="Gerar Story">							
							</div>
						</form>

					</div>

					<?php if($conteudo !== '') { 
						echo '
						<hr>
						<h4>Story:</h4>';
					} ?>

					<div id="requisitoGerado" class="col-12 text-center"><strong><?php echo  $conteudo;?></strong></div>
											
					<hr>
					
					
					<h4> Detalhes Técnicos </h4>
					<br>
					<form id="form_SalvarReq" name="form_SalvarReq" method="post">

						<div>
							<label>Requisito Associado</label>
								<select name="select_Requisito" class="form-control select" required>

									<option value="">Selecione...</option>									
									<?php if($con): ?>
										<?php
											$sql = "select * from requisitos";
											$rs = mysqli_query($con, $sql);
										?>
										<?php while($linhaRequisito = mysqli_fetch_array($rs)): ?>
											<option <?php echo 'value="'.$linhaRequisito["idrequisitos"].'"'?>><?php echo $linhaRequisito['conteudo']; ?></option>
										<?php endwhile; ?>
									<?php endif; ?>

								</select>
						</div>

						<br>
						<div class="form-row">
							<div class="form-group col-md-2">
								<label name="lb_Tipo">Tipo</label>
								<select name="select_Tipo" id="select_Tipo" class="form-control select" required>
									<option value="">Selecione...</option>
									<option>Funcional</option>
									<option>Não-Funcional</option>
									<option>Interface</option>
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

						</div>

						
						<div class="form-group col-md-4 offset-md-4">
								<input class="form-control btn btn-primary" type="submit" name="bt_Salvar" value="Finalizar Cadastro" >
						</div>

						<!-- <div class="form-group col-md-3">
								<input class="form-control" type="reset" value="Limpar">	
						</div>	 -->
					</form>
					<hr>

			</article><!--/content-->
			
			<div id = "sidebar">							
				 								
			</div><!--/sidebar-->			
<?php
	include "template/rodape.php";
?>

