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
											
											Requisito: <input type = "text" name = "nome_req" class = "input_n"
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
											<option>Funcional</option>
											<option>Não-Funcional</option>
											<option>Interface</option>
										</select>

										<br>
										
										<label name="lb_Complexidade">Complexidade</label>
										<select name="select_Complexidade" id="select_Complexidade" value="<?php echo $req['complexidade'];?>">
											<option>Selecione...</option>
											<option>Baixa</option>
											<option>Média</option>
											<option>Alta</option>
										</select>

										<label name="lb_Status">Status</label>
										<select name="select_Status" id="select_Status" value="<?php echo $req['status'];?>">
											<option>Selecione...</option>
											<option>Em Aberto</option>
											<option>Em Progresso</option>
											<option>Sob Aprovação</option>
											<option>Finalizado</option>
											<option>Cancelado</option>
										</select>

										<label name="lb_Prioridade">Prioridade</label>
										<select name="select_Prioridade" id="select_Prioridade" value="<?php echo $req['prioridade'];?>">
											<option>Selecione...</option>
											<option>Alta</option>
											<option>Média</option>
											<option>Baixa</option>
										</select>

					 	</form>									
					</div><!--/form-->				
			</article><!--/content-->
			
<?php
	}
}
}
	include "template/rodape.php";
?>

