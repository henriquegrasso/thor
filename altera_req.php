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
							$sql = "select * from requisitos WHERE idrequisitos=".$_GET['seq'];
							$rs = mysqli_query($con, $sql);
							if($rs){
								if($req = mysqli_fetch_array($rs)){?>
						
									<form id = "alt_req" action = "update_req.php" method = "POST">
											ID: <input type="text" name="seq_req" size=5 
												value="<?php echo $req['idrequisitos'];?>" class = " id" readonly> <br>
											
											Requisito: <input type = "textarea" name = "text_Conteudo" class = "input_n"
												value="<?php echo $req['conteudo'];?>"> <br>	
									<br>
									<hr/>
									<br>
										<h2> Detalhes Técnicos </h2>
										<br>

										<label name="lb_Relator">Relator</label>
										<input type="text" name="text_Relator" value="<?php echo $req['relator'];?>">

										<label name="lb_Responsavel">Responsável</label>
										<input type="text" name="text_Responsavel" value="<?php echo $req['responsavel'];?>">

										<label name="lb_Sprint">Sprint</label>
										<input type="text" name="text_Sprint" value="<?php echo $req['sprint'];?>">

										<label name="lb_Tipo">Tipo</label>
										<select name="select_Tipo" id="select_Tipo" value="<?php echo $req['tipo'];?>">
											<option>Selecione...</option>
											<option <?php if($req['tipo'] == 'Funcional') { echo ' selected="selected"';} ?> >Funcional</option>
											<option <?php if($req['tipo'] == 'Não-Funcional') { echo ' selected="selected"';} ?> >Não-Funcional</option>
											<option <?php if($req['tipo'] == 'Interface') { echo ' selected="selected"';} ?> >Interface</option>
										</select>

										<br>
										
										<label name="lb_Complexidade">Complexidade</label>
										<select name="select_Complexidade" id="select_Complexidade">
											<option  >Selecione...</option>
											<option <?php if($req['complexidade'] == 'Baixa') { echo ' selected="selected"';} ?> >Baixa</option>
											<option <?php if($req['complexidade'] == 'Média') { echo ' selected="selected"';} ?> >Média</option>
											<option <?php if($req['complexidade'] == 'Alta') { echo ' selected="selected"';} ?> >Alta</option>
										</select>

										<label name="lb_Status">Status</label>
										<select name="select_Status" id="select_Status" value="<?php echo $req['status'];?>">
											<option>Selecione...</option>
											<option <?php if($req['status'] == 'Em Aberto') { echo ' selected="selected"';} ?> >Em Aberto</option>
											<option <?php if($req['status'] == 'Em Progresso') { echo ' selected="selected"';} ?> >Em Progresso</option>
											<option <?php if($req['status'] == 'Sob Aprovação') { echo ' selected="selected"';} ?> >Sob Aprovação</option>
											<option <?php if($req['status'] == 'Finalizado') { echo ' selected="selected"';} ?> >Finalizado</option>
											<option <?php if($req['status'] == 'Cancelado') { echo ' selected="selected"';} ?> >Cancelado</option>
										</select>

										<label name="lb_Prioridade">Prioridade</label>
										<select name="select_Prioridade" id="select_Prioridade" value="<?php echo $req['prioridade'];?>">
											<option>Selecione...</option>
											<option <?php if($req['prioridade'] == 'Baixa') { echo ' selected="selected"';} ?> >Baixa</option>
											<option <?php if($req['prioridade'] == 'Média') { echo ' selected="selected"';} ?> >Média</option>
											<option <?php if($req['prioridade'] == 'Alta') { echo ' selected="selected"';} ?> >Alta</option>
										</select>

									<div id = "btn">								
									<center><input class="btn_monitora" type="submit" value="Salvar">
									<a href="consultar_requisito.php"><input class="btn_monitora" type="button" value="Voltar"></a>								
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

