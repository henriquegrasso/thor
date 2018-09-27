<?php
	include "template/topo.php";
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}
?>	
			<article id = "content_alt">
				<!-- definir cabeçalho do artigo -->
				<header>
					<h2>Alteração de Story</h2>				
				</header>				
				<div id = "form">
				<?php
				$_SESSION['id_Story'] = $_GET['id'];
				
					if($con){
						$sql = "select * from story WHERE idstory=".$_GET['id'];
						$rs = mysqli_query($con, $sql);
						if($rs){
							if($story = mysqli_fetch_array($rs)){
				?>
								<form id = "alt_req" action = "update_story.php" method = "POST">
									<?php echo "ID da Story: <strong>" . $story['idstory']."</strong>" ;?><br><br>									
									<label>Requisito</label>
									<select name="select_Requisito" class="form-control col-md-12 select" required>
										<option value="">Selecione...</option>									
										<?php if($con): ?>
											<?php
												$sql = "select * from requisitos";
												$rs = mysqli_query($con, $sql);
											?>
											<?php while($linhaRequisito = mysqli_fetch_array($rs)): ?>
												<option <?php echo 'value="'.$linhaRequisito["idrequisitos"].'"'?> <?php if($linhaRequisito['idrequisitos'] == $story['idrequisitos']) { echo ' selected="selected"';}?>><?php echo $linhaRequisito['conteudo']; ?></option>
											<?php endwhile; ?>
										<?php endif; ?>

									</select>

									<br>
									<label>Story</label>
									<input type="textarea" name="text_Conteudo" value="<?php echo $story['conteudo'];?>" class = "form-control text" required>
									

									<hr>
								 <div class="form-row">	
								  <div class="form-group col-md-4">	
									<label name="lb_Tipo">Tipo</label>
									<select name="select_Tipo" id="select_Tipo" value="<?php echo $story['tipo'];?>" class="form-control select" required>
										<option>Selecione...</option>
										<option <?php if($story['tipo'] == 'Funcional') { echo ' selected="selected"';} ?> >Funcional</option>
										<option <?php if($story['tipo'] == 'Não-Funcional') { echo ' selected="selected"';} ?> >Não-Funcional</option>
										<option <?php if($story['tipo'] == 'Interface') { echo ' selected="selected"';} ?> >Interface</option>
									</select>
								  </div>

								  <div class="form-group col-md-4">
									<label name="lb_Status">Status</label>
									<select name="select_Status" id="select_Status" value="<?php echo $story['status'];?>" class="form-control select" required>
										<option>Selecione...</option>
										<option <?php if($story['status'] == 'Em Aberto') { echo ' selected="selected"';} ?> >Em Aberto</option>
										<option <?php if($story['status'] == 'Em Progresso') { echo ' selected="selected"';} ?> >Em Progresso</option>
										<option <?php if($story['status'] == 'Sob Aprovação') { echo ' selected="selected"';} ?> >Sob Aprovação</option>
										<option <?php if($story['status'] == 'Finalizado') { echo ' selected="selected"';} ?> >Finalizado</option>
										<option <?php if($story['status'] == 'Cancelado') { echo ' selected="selected"';} ?> >Cancelado</option>
									</select>
								 </div>
								  
								  <div class="form-group col-md-4">	
									<label name="lb_Prioridade">Prioridade</label>
									<select name="select_Prioridade" id="select_Prioridade" value="<?php echo $req['prioridade'];?>" class="form-control select" required>
										<option>Selecione...</option>
										<option <?php if($story['prioridade'] == 'Baixa') { echo ' selected="selected"';} ?> >Baixa</option>
										<option <?php if($story['prioridade'] == 'Média') { echo ' selected="selected"';} ?> >Média</option>
										<option <?php if($story['prioridade'] == 'Alta') { echo ' selected="selected"';} ?> >Alta</option>
									</select>
								  </div>

								 </div>

								<div class="form-row">
								  <div class="form-group col-md-3 offset-md-3">	
									<a href="selecionar_req_alt_story.php"><input class="form-control btn btn-primary" type="button" value="Voltar"></a>
								  </div>

								  <div class="form-group col-md-3">
									<input class="form-control btn btn-primary" type="submit" value="Salvar">			
								  </div>
								</div>


					 			</form>									
				</div><!--/form-->				
			</article><!--/content-->
			
				<?php
							}
						}	
					}
					include "template/rodape.php";
				?>