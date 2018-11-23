<?php
	include "template/topo.php";
	if(!isset($_SESSION['id'])){	
		header('Location: login.php?msg=0');
	}
?>	
			<article id = "content_alt">
				<!-- definir cabeçalho do artigo -->
				<header>
					<h2>Alterar Requisito</h2>	
					<hr>			
				</header>				
					<div id = "form">
					<?php
						if($con){
							$sql = "select * from requisitos WHERE idrequisitos=".$_GET['id'];
							$rs = mysqli_query($con, $sql);
							if($rs){
								if($req = mysqli_fetch_array($rs)){
									$_SESSION['id_req'] = $req['idrequisitos'];
									$_SESSION['texto_req_old'] = $req['conteudo'];
									?>
									<form id = "alt_req" action = "update_req.php" method = "POST">
										<?php echo "ID do Requisito: <strong>" . $req['idrequisitos']."</strong>" ;?><br><br>
										<label>Requisito:</label> 
										<input type = "textarea" name = "text_Conteudo" class = "form-control text"
											value="<?php echo $req['conteudo'];?>" required> <br>	
									<br>
									<div class="form-row">
									  <div class="form-group col-md-3">	
										<label name="lb_Relator">Relator</label>
										<input type="text" name="text_Relator" value="<?php echo $req['relator'];?>" class="form-control text" required>
									  </div>
									  <div class="form-group col-md-3">
										<label name="lb_Responsavel">Responsável</label>
										<input type="text" name="text_Responsavel" value="<?php echo $req['responsavel'];?>" class="form-control text" required>
									  </div>
									  <div class="form-group col-md-3">
										<label name="lb_Sprint">Sprint</label>
										<input type="text" name="text_Sprint" value="<?php echo $req['sprint'];?>" class="form-control text" required>
									  	</div>
									  <div class="form-group col-md-3">
									  	<label name="lb_Tipo">Tipo</label>
										<select name="select_Tipo" id="select_Tipo" value="<?php echo $req['tipo'];?>" class="form-control select" required>
											<option>Selecione...</option>
											<option <?php if($req['tipo'] == 'Funcional') { echo ' selected="selected"';} ?> >Funcional</option>
											<option <?php if($req['tipo'] == 'Não-Funcional') { echo ' selected="selected"';} ?> >Não-Funcional</option>
											<option <?php if($req['tipo'] == 'Interface') { echo ' selected="selected"';} ?> >Interface</option>
										</select>

									  </div>
									</div>
									<div class="form-row">	
									  <div class="form-group col-md-3">
										<label name="lb_Complexidade">Complexidade</label>
										<select name="select_Complexidade" id="select_Complexidade" class="form-control select" required>
											<option  >Selecione...</option>
											<option <?php if($req['complexidade'] == 'Baixa') { echo ' selected="selected"';} ?> >Baixa</option>
											<option <?php if($req['complexidade'] == 'Média') { echo ' selected="selected"';} ?> >Média</option>
											<option <?php if($req['complexidade'] == 'Alta') { echo ' selected="selected"';} ?> >Alta</option>
										</select>
									  </div>
									  <div class="form-group col-md-3">
										<label name="lb_Status">Status</label>
										<select name="select_Status" id="select_Status" class="form-control select" required>
											<option>Selecione...</option>
											<option <?php if($req['status'] == 'Em Aberto') { echo ' selected="selected"';} ?> >Em Aberto</option>
											<option <?php if($req['status'] == 'Em Progresso') { echo ' selected="selected"';} ?> >Em Progresso</option>
											<option <?php if($req['status'] == 'Sob Aprovação') { echo ' selected="selected"';} ?> >Sob Aprovação</option>
											<option <?php if($req['status'] == 'Finalizado') { echo ' selected="selected"';} ?> >Finalizado</option>
											<option <?php if($req['status'] == 'Cancelado') { echo ' selected="selected"';} ?> >Cancelado</option>
										</select>
									  </div>

									  <div class="form-group col-md-3">
										<label name="lb_Prioridade">Prioridade</label>
										<select name="select_Prioridade" id="select_Prioridade" class="form-control select" required>
											<option>Selecione...</option>
											<option <?php if($req['prioridade'] == 'Baixa') { echo ' selected="selected"';} ?> >Baixa</option>
											<option <?php if($req['prioridade'] == 'Média') { echo ' selected="selected"';} ?> >Média</option>
											<option <?php if($req['prioridade'] == 'Alta') { echo ' selected="selected"';} ?> >Alta</option>
										</select>
									  </div>
									</div>

									<br>
									<div class="form-row">
									<div class="form-group col-md-3 offset-md-3">						
										<a href="consultar_requisito.php" ><input class="form-control btn btn-primary" type="button" value="Voltar"></a>	
									</div>

									<div class="form-group col-md-3">
										<input class="form-control btn btn-primary" type="submit" value="Salvar">
							  		</div><!--/btn-->
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

